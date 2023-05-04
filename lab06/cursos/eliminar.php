<?php

include('../conexion.php');

$conexion = conectar();

$id=$_POST['txtID'];

mysqli_query($conexion, "DELETE FROM curso where curso_id='$id'") or die ("error al eliminar");

desconectar($conexion);

header("location:cursos.php");

?>