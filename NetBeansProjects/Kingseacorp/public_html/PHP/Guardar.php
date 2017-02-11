<?php        
    //sources: http://jquery-manual.blogspot.com/2013/09/consultas-select-con-mysqli.html
    $cn=new mysqli("mysql.hostinger.es","usuario u512033466_Edin","YVMhg3QxY9","usuario u512033466_reg")or die("Error de conexion");        
    $result = mysqli_query($cn, "SELECT Correo FROM Usuarios");
    while ($fila = mysqli_fetch_array($result)){
        mostrarDatos($fila);
    }
    mysqli_free_result($result);    
    
    function mostrarDatos($resultados){//las funciones solo permiten 20 lineas                       
        global $CampoNombre;
        global $CampoContrasena;
        global $CampoCorreo;
        global $Repetido;
        //captura de datos  
        $CampoNombre=$_POST['Camponombre'];
        $CampoContrasena=$_POST['Campocedula'];
        $CampoCorreo=$_POST['Campocorreo'];
        //echo '$CampoNombre  ','$CampoContrasena  ','$CampoCorreo';        
        //este if recorre todo e array que se creo con la columna correo de la bd
        if($resultados !=NULL) {//en vez de imprimir los comparo con el ingresado en formulario
            if($CampoCorreo==$resultados['Correo']){
                $Repetido=$Repetido+1;
                echo 'El correo esta repetido :( <br>';                
            }            
        }//echo 'reps: ',$Repetido,"<br>";         
    }//si despues de recorrer todo el array no hay repetidos entonces guarde
    if($Repetido==0){
        //echo 'guardar ',"<br>";
        $in="INSERT INTO Usuarios(Nombre,Contrasena,Correo)VALUES('$Camponombre','$Campocontrasena','$Campocorreo')";
        $exe=mysqli_query($cn,$in);

        //enviar correo
        $subject="Bienvenido a mi WEB";
        $message="Por favor no responder a este correo";
        echo "Correo: ",$CampoCorreo,"<br>";
        mail($CampoCorreo,$subject,$message);
    }
    mysqli_close($cn);
?>
