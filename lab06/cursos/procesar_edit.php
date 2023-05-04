<?php

include('../conexion.php');

$conexion = conectar();

$ID=$_POST['txtID'];
$NOMBRE=$_POST['txtNombre'];
$CRED=$_POST['txtCreditos'];

mysqli_query($conexion, "UPDATE `curso` SET `nombre_curso` = '$NOMBRE', `creditos` = '$CRED' WHERE `curso`.`curso_id` = $ID;") or die ("Error de actualización");

desconectar($conexion);

header("Location:cuRsos.php");
?>