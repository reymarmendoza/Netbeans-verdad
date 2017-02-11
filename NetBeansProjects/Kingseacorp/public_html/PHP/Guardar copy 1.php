<?php        
    //sources: http://jquery-manual.blogspot.com/2013/09/consultas-select-con-mysqli.html
    //reiniciar TODA LA TABLA truncate nombreTabla;
    $cn=new mysqli("mysql.hostinger.es","u854307015_reyma","Kingseadata","u854307015_guido")or die("Error de conexion");        
    //asigno la variable del formulario a la variable local    
    $CampoNombre=$_POST['CampoNombre'];//captura de datos
    $CampoContraseña=$_POST['CampoContraseña'];
    $CampoCorreo=$_POST['CampoCorreo'];
    
    //si cumple la condicion de no estar repetido
    $NumFilasDoble="SELECT COUNT(Correo)as doubletotal FROM Usuarios WHERE Correo='$CampoCorreo'";
    $ResNumFilasDoble=$cn->query($NumFilasDoble);// WHERE Correo='$CampoCorreo'    
    $FilaResNumFilasDoble=$ResNumFilasDoble->fetch_array();
    $Repetidos=$FilaResNumFilasDoble["dobletotal"];   
    echo 'filas dobles:  ',$Repetidos;
    if($Repetidos==0){
        /*function Guardar(){*/
        //Actualizo la BD
        $in="INSERT INTO Usuarios(Nombre,ContraseÃ±a,Correo)VALUES('$CampoNombre','$CampoContraseÃ±a','$CampoCorreo')";
        $exe=mysqli_query($cn,$in);

        //contar el numero de filas    
        $NumFilas="SELECT COUNT(Correo)as total FROM Usuarios";
        $ResNumFilas=$cn->query($NumFilas);
        $Filas=$ResNumFilas->fetch_array();
        $Total=$Filas["total"];
        //echo "<span style='color: blue;'>Total de filas:$Total</span>";

        //Extraer una determinada fila
        $UltimoCorreo="SELECT Correo as mail FROM Usuarios WHERE id='$Total'";
        $ResUltimoCorreo=$cn->query($UltimoCorreo);
        $Correo=$ResUltimoCorreo->fetch_array();
        $Email=$Correo["mail"];
        //echo "<span style='color: blue;'>Correo:" . $Correo["mail"] . "</span>";

        //enviar correo
        $subject="Bienvenido a mi WEB";
        $message="Por favor no responder a este correo";
        mail($Email,$subject,$message);
        
    }else{
        echo "<span style='color: blue;'>Esta Repetido el dato ingresado</span>";
    }
    mysqli_close($cn);
    //Location('Guardar.php');
?>