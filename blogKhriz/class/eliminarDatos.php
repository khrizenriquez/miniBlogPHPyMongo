<?php
//Lo ideal en una base de datos no es borrar los registros, es cambiarles un estado de activo a inactivo y si esta inactivo no lo muestro, pero no borro su registro
print_r($_GET);
require_once 'instrucciones.php';
$instrucciones = new instruccionesBD();

$cambiandoEstado = array("estado" => "inactivo");//afectare solo una coleccion por eso le indico que claves se actualizaran
$actualizando = $instrucciones->actualizandoValores("_id", $_GET['idEliminar'], $cambiandoEstado);

header('Location: ../index.php');//me regresa al archivo donde vino ya con los cambios generados

//Lo ideal en una base de datos no es borrar los registros, es cambiarles un estado de activo a inactivo y si esta inactivo no lo muestro, pero no borro su registro
?>