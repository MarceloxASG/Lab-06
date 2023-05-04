<?php

include('../conexion.php');

// Abrimos la conexión a la base de datos
$conexion = conectar();


$Id=$_GET["id"];

// Consulta SQL
$sql = "SELECT * FROM curso where curso_id='$Id'";

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
    <link rel="stylesheet" href="styleEDI.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Curso</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Editar</h1>

    
    <table class="table table-striped table-hover">
        
        <tbody>
            <?php

                $curso_id = $curso['curso_id'];
                $nombres = $curso['nombre_curso'];
                $ape_paterno = $curso['creditos'];
            ?>

            <?php
            // Recorremos el array con los datos de los cursos
            
            while ($curso = mysqli_fetch_array($resultado)) {
                
                ?>

                <form action="procesar_edit.php" method="POST">
                    <input type="hidden" value="<?php echo $curso['curso_id'] ?>" name="txtID">
                    <p>Curso: </p>
                    <input type="text" value="<?php echo $curso['nombre_curso'] ?>" name="txtNombre">
                    <p>Creditos: </p>
                    <input type="number" value="<?php echo $curso['creditos'] ?>" name="txtCreditos">
               
                <?php
            }

                ?>
    <input type="submit" class="mt-4" value="ACTUALIZAR">
    </form>
        </tbody>
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>