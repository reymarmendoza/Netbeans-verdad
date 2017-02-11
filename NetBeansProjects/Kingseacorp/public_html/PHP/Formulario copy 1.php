<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
            $con=new mysqli("mysql.hostinger.es","u854307015_king","Q7kwGxh|D51=","u854307015_ask")or die("Error de conexion");        
    
            $NumFilas="SELECT COUNT(Pregunta)as total FROM Formulario";
            $ResNumFilas=$con->query($NumFilas);
            $Filas=$ResNumFilas->fetch_array();
            $Total=$Filas["total"];

            //genero la pregunta aleatoria
            $Rdm=rand(1,$Total);   

            //genero la pregunta
            $PreguntaRdm="SELECT Pregunta as preg FROM Formulario WHERE id=$Rdm";
            $QueryPreguntaRdm=$con->query($PreguntaRdm);
            $ColumnaPreguntas=$QueryPreguntaRdm->fetch_array();
            $Pregunta=$ColumnaPreguntas["preg"];
            echo "Pregunta:   $Pregunta <br>";

            //capturar la respuesta correcta   
            $RespuestaRdm="SELECT R1 as resp FROM Formulario WHERE id=$Rdm";
            $QueryRespuestaRdm=$con->query($RespuestaRdm);
            $ColumnaRespuestas=$QueryRespuestaRdm->fetch_array();
            $Respuestas=$ColumnaRespuestas["resp"];

            //desordenar las respuestas
            $OpcionesRdm="SELECT R1,R2,R3,R4 FROM Formulario WHERE id=$Rdm";
            $QueryOpcionesRdm=$con->query($OpcionesRdm);
            
            while($ColumnaOpciones=$QueryOpcionesRdm->fetch_array()){
                $Res[0]=$ColumnaOpciones["R1"];
                $Res[1]=$ColumnaOpciones["R2"];
                $Res[2]=$ColumnaOpciones["R3"];
                $Res[3]=$ColumnaOpciones["R4"];
            }
            shuffle($Res);
            //conexion a la BD
            $con=new mysqli("mysql.hostinger.es","u854307015_king","Q7kwGxh|D51=","u854307015_ask")or die("Error de conexion");        
            //asigno la variable del formulario a la variable local    
            $CampoRespuesta=$_POST['CampoRespuesta'];
            //comparar la repuesta con la correcta
            $RespuestaCorrecta="SELECT R1 FROM Formulario WHERE id='$Rdm'";
            if($CampoRespuesta==$RespuestaCorrecta){
                echo 'Ha seleccionado la opcion correcta';
            }else{
                echo 'Respuesta incorrecta';
            }
        ?>   
        
        <script>           
            function check(Grupo) {
                Select=document.getElementById("Select").value=Grupo;
                <?php $Selec ?> = "document.write(Select)";
                <?php echo $Selec ?>
            }                       
        </script>
        
        <form>
            <input type="Radio" name="Grupo" onclick="check(this.value)" value="<?php echo $Res[0]?>"> <?php echo $Res[0]?><br>
            <input type="Radio" name="Grupo" onclick="check(this.value)" value="<?php echo $Res[1]?>"> <?php echo $Res[1]?><br>
            <input type="Radio" name="Grupo" onclick="check(this.value)" value="<?php echo $Res[2]?>"> <?php echo $Res[2]?><br>
            <input type="Radio" name="Grupo" onclick="check(this.value)" value="<?php echo $Res[3]?>"> <?php echo $Res[3]?><br>
            La seleccion es: <input type="text" id="Select" size="20"><br>
            
            <input name="button2" type="button" onclick="window.location.href='Validar.php'" value="Aceptar"/>            
            
        </form>
        
        
    </body>
</html>