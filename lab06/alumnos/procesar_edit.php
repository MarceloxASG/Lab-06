<?php

include('../conexion.php');

$conexion = conectar();

$ID=$_POST['txtID'];
$NOMBRE=$_POST['txtNombre'];
$APE_PA=$_POST['txtApe_paterno'];
$APE_MA=$_POST['txtApe_materno'];

mysqli_query($conexion, "UPDATE `alumno` SET `nombres` = '$NOMBRE', `ape_paterno` = '$APE_PA', `ape_materno` = '$APE_MA' WHERE `alumno`.`alumno_id` = '$ID'") or die ("Error de actualización");

desconectar($conexion);

header("Location:alumnos.php");
?>