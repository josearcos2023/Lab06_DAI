<?php
include ('../conexion.php');

//Abrimos la conexion a la DB MySQL
$conexion=conectar();

//Definimos la consulta SQL
$sql_alumnos='SELECT alumno_id, nombres, ap_paterno, ap_materno FROM alumno';
$sql_cursos='SELECT curso_id, nombre_curso, creditos FROM curso';

//Ejecutamos el query en la conexion abierta
$resultado_alumno = mysqli_query($conexion,$sql_alumnos);
$resultado_curso = mysqli_query($conexion,$sql_cursos);

//Cerramos la conexion
desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Nueva matrícula</title>
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
                <h3>Nueva matrícula</h3>
                <div>
                <form name="formMatricula" method="post" action="nueva_matricula_reg.php">
                    <div class="col-3 mt-3">
                        <label for="alumnos">Elija el nombre del alumno a matricular: </label><br>
                        <select class="form-select" name="alumnos" id="alumnos">
                            <option value=""></option>
                    <?php
                        //Seguimos recorriendo el array...
                        while($alumno = mysqli_fetch_array($resultado_alumno))
                        {
                            $alumno_id=$alumno['alumno_id'];
                            $nombres=$alumno['nombres'];
                            $ape_paterno=$alumno['ap_paterno'];
                            $ape_materno=$alumno['ap_materno'];
                    ?>
                    <?php  
                            echo '<option value='.$alumno_id.'>' .$nombres.' '.$ape_paterno.' '.$ape_materno .'</option>';
                        }
                    ?>
                        </select>
                    </div>
                    <div class="col-3 mt-3">
                        <label for="curso">Elija el nombre del curso a editar: </label><br>
                        <select class="form-select" name="curso" id="curso">
                            <option value=""></option>
                    <?php
                        //Seguimos recorriendo el array...
                        while($curso = mysqli_fetch_array($resultado_curso))
                        {
                            $curso_id=$curso['curso_id'];
                            $nom_curso=$curso['nombre_curso'];
                            $creditos=$curso['creditos'];
                    ?>
                    <?php  
                            echo '<option value='.$curso_id.'>' .$nom_curso.'</option>';
                        }
                    ?>
                        </select>
                    </div>
                    <br>
                    <div>
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <button type="button" class="btn btn-danger" onclick="history.back()">Regresar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</html>