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
        ?>   
        <!--enlazar desde el form al archivo js ../JavaScript/Validar.js-->       
        <form name="Formulario"><!--name="Respuesta" id="Respuesta" action="../JavaScript/jquery-2.1.4.min.js" method="POST"-->
            <input type="radio" name="Grupo" id="Grupo1" value="<?php echo $Res[0]?>"> <?php echo $Res[0]?><br>
            <input type="radio" name="Grupo" id="Grupo2" value="<?php echo $Res[1]?>"> <?php echo $Res[1]?><br>
            <input type="radio" name="Grupo" id="Grupo3" value="<?php echo $Res[2]?>"> <?php echo $Res[2]?><br>
            <input type="radio" name="Grupo" id="Grupo4" value="<?php echo $Res[3]?>"> <?php echo $Res[3]?><br>
            <br><br>
            <input type="button" name="Validar" value="enviar" onClick="validarFormulario()">
<!--<input type="submit" name="submit" id="submit" value="Enviar" class="required"><!--type="button" id="boton" value="Enviar"-->
        </form>        
        <script>
            function validarFormulario(){
                //var cap=document.formulario;                
                var Sel=document.getElementsByName("Grupo");
                for(var i=0;i<Sel.length;i++){                
                    if(Sel[i].checked)
                        cap=Sel[i].value;
                }
                var res="<?php echo $Respuestas ?>";
                       
                if(cap==res){
                    alert("La respuesta es correcta");
                }else{
                    alert("La respuesta NO es correcta");
                }
            }
        </script>
    </body>
</html>