<?php
    //Hago la conexion
    $con=new mysqli("mysql.hostinger.es","u854307015_king","Q7kwGxh|D51=","u854307015_ask")or die("Error de conexion");        
    
    $NumFilas="SELECT COUNT(Pregunta)as total FROM Formulario";
    $ResNumFilas=$con->query($NumFilas);
    $Filas=$ResNumFilas->fetch_array();
    $Total=$Filas["total"];

    //genero la pregunta aleatoria
    $Rdm=rand(1,$Total);   
    
    //genero la pregunta
    $PreguntaRdm="SELECT Pregunta as preg FROM Formulario WHERE id=$Rdm";//+$Rdm;
    $QueryPreguntaRdm=$con->query($PreguntaRdm);
    $ColumnaPreguntas=$QueryPreguntaRdm->fetch_array();
    $Pregunta=$ColumnaPreguntas["preg"];
    echo "Pregunta:   $Pregunta <br>";
    
    //capturar la respuesta correcta   
    $RespuestaRdm="SELECT R1 as resp FROM Formulario WHERE id=$Rdm";//+$Rdm;
    $QueryRespuestaRdm=$con->query($RespuestaRdm);
    $ColumnaRespuestas=$QueryRespuestaRdm->fetch_array();
    $Respuestas=$ColumnaRespuestas["resp"];
    
    //desordenar las respuestas
    $OpcionesRdm="SELECT R1,R2,R3,R4 FROM Formulario WHERE id=$Rdm";//+$Rdm;
    $QueryOpcionesRdm=$con->query($OpcionesRdm);
    while($ColumnaOpciones=$QueryOpcionesRdm->fetch_array()){
        echo "Opcion1:  ". $ColumnaOpciones["R1"] ."<br>";
        echo "Opcion2:  ". $ColumnaOpciones["R2"] ."<br>";
        echo "Opcion3:  ". $ColumnaOpciones["R3"] ."<br>";
        echo "Opcion4:  ". $ColumnaOpciones["R4"] ."<br>";
    }
    
    //comparar la respuesta correcta con la seleccionada
    //header('Location: /PHP/Formulario.html');
?>