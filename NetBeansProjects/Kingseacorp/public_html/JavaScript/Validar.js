$Respuestas=$POST['$Respuesta'];
$CampoRespuesta=$_POST['Grupo'];//capturo el dato
if($CampoRespuesta === $Respuestas){
    document.write('Ha seleccionado la opcion correcta');
}else{
    document.write('Respuesta incorrecta');
}