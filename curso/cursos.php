<?php
include ('../conexion.php');

//Abrimos la conexion a la DB MySQL
$conexion=conectar();

//Definimos la consulta SQL
$sql='SELECT curso_id, nombre_curso, creditos FROM curso';

//Ejecutamos el query en la conexion abierta
$resultado = mysqli_query($conexion,$sql);

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
    <title>Cursos</title>
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
                        <a href="/Aplicaciones_Ciclo3/Laboratorio06/Lab06/curso/cursos.php" class="nav-item nav-link disabled">Cursos</a>
                        <a href="/Aplicaciones_Ciclo3/Laboratorio06/Lab06/matricula/matriculas.php" class="nav-item nav-link">Matrícula</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-2">
                <h3>Cursos</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre de Curso</th>
                            <th scope="col">Créditos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            //recorrer el array con el resultado de la consulta
                            while($curso = mysqli_fetch_array($resultado))
                            {
                                $curso_id=$curso['curso_id'];
                                $nombre_curso=$curso['nombre_curso'];
                                $creditos=$curso['creditos'];

                                echo '<tr>';
                                echo '<th scope="row">' .$curso_id . '</td>';
                                echo '<td>' .$nombre_curso . '</td>';
                                echo '<td>' .$creditos . '</td>';                     
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <button class="btn btn-success" type="submit" name="ingresar" onclick="location.href='agregarCursos.html'">Nuevo</button>
            <button class="btn btn-success" type="submit" name="editar" onclick="location.href='editar_curso.php'">Editar</button>
            <button class="btn btn-success" type="submit" name="eliminar" onclick="location.href='eliminar_curso.php'">Eliminar</button>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</html>