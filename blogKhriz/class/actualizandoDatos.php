<?php
require_once 'instrucciones.php';
$instrucciones = new instruccionesBD();

$valoresActualizados = array("titulo" => strip_tags($_POST['txtTituloPost']), "contenido" => strip_tags($_POST['txtAreaContenidoPost']), "estado" => 'activo');//afectare solo una coleccion por eso le indico que claves se actualizaran
$actualizando = $instrucciones->actualizandoValores("_id", $_POST['txtCorrelativo'], $valoresActualizados);
header('Location: ../comentarioIndividual.php?id='.strip_tags($_POST['txtCorrelativo']));//me regresa al archivo donde vino ya con los cambios generados
?>