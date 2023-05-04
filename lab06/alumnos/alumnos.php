<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Consulta SQL
$sql = 'SELECT alumno_id, nombres, ape_paterno, ape_materno FROM alumno';

// Ejecutamos la consulta
$resultado = mysqli_query($conexion, $sql);

// Cerramos la conexión
desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleALUM.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Alumnos</title>
</head>
<body class="mt-3">
<div class="container">
        <h1 class="text-center">Alumnos</h1>

        <a href="agregar.html" class="btn btn-primary mb-3">Nuevo alumno</a>

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Nombres</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
            <?php

                $alumno_id = $alumno['alumno_id'];
                $nombres = $alumno['nombres'];
                $ape_paterno = $alumno['ape_paterno'];
                $ape_materno = $alumno['ape_materno'];
            ?>

            <?php
            // Recorremos el array con los datos de los alumnos
            while ($alumno = mysqli_fetch_array($resultado)) {
                
                ?>

                <tr>
                    <td><?php echo $alumno['alumno_id'] ?></td>
                    <td><?php echo $alumno['nombres'] ?></td>
                    <td><?php echo $alumno['ape_paterno'] ?></td>
                    <td><?php echo $alumno['ape_materno'] ?></td>

                    <td>
                        <!---Editar--->
                        <a href="editar.php?id=<?php echo $alumno['alumno_id'] ?>">Editar</a>

                        <!---Eliminar--->
                        <form action="eliminar.php" method="post">
                            <td><button type="submit" value="<?php echo $alumno['alumno_id']?>" name="txtID">Eliminar</td>
                        </form>
                    </td>
                
                </tr>
                <?php
            }

            ?>
        </tbody>
    </table>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>