<?php

include('../conexion.php');

$conexion = conectar();

$id=$_POST['txtID'];

mysqli_query($conexion, "DELETE FROM alumno where alumno_id='$id'") or die ("error al eliminar");

desconectar($conexion);

header("location:alumnos.php");

?>