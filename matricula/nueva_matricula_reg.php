<?php
include('../conexion.php');

//Obtenemos la informacion del alumno
$alumno_id=$_POST['alumnos'];
$curso_id=$_POST['curso'];

//Abrimos la conexion a la DB
$conexion=conectar();

//formamos la consulta sql
$sql="INSERT INTO matricula (curso_id, alumno_id) VALUES ('$curso_id','$alumno_id')";


//ejecutamos nuestro query
$resultado = mysqli_query($conexion,$sql);

//cerramos la conexion
desconectar($conexion);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Nueva Matrícula</title>
</head>
<body>
    <div class="m-0">
        <nav class="navbar navbar-expand-lg navbar-success bg-success">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">Laboratorio #6</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="/Aplicaciones_Ciclo3/Laboratorio06/Lab06/alumno/alumnos.php" class="nav-item nav-link">Alumnos</a>
                        <a href="/Aplicaciones_Ciclo3/Laboratorio06/Lab06/curso/cursos.php" class="nav-item nav-link">Cursos</a>
                        <a href="/Aplicaciones_Ciclo3/Laboratorio06/Lab06/matricula/matriculas.php" class="nav-item nav-link disabled">Matrícula</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-2">
                <h3>
            <?php
                if (!$resultado)
                {
                    echo 'No se ha podido matricular al alumno';
                }
                else
                {
                    echo 'Matrícula realizada!';
                }
            ?>
                </h3>
                <button type="button" class="btn btn-danger" onclick="location.href='matriculas.php'">Regresar</button>

            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</html>