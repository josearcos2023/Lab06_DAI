<?php
include ('../conexion.php');

//Abrimos la conexion a la DB MySQL
$conexion=conectar();

//Definimos la consulta SQL
$sql='SELECT m.matricula_id, a.alumno_id, a.nombres, a.ap_paterno, a.ap_materno, c.curso_id, c.nombre_curso, c.creditos FROM matricula m INNER JOIN alumno a ON m.alumno_id=a.alumno_id INNER JOIN curso c ON m.curso_id=c.curso_id';


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
    <title>Matrícula</title>
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
                <h3>Matrícula</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id Matrícula</th>
                            <th scope="col">Id Estudiante</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellido Paterno</th>
                            <th scope="col">Apellido Materno</th>
                            <th scope="col">Id_Curso</th>
                            <th scope="col">Curso</th>
                            <th scope="col">Créditos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($alumno = mysqli_fetch_array($resultado))
                        {
                            $matricula_id=$alumno['matricula_id'];
                            $curso_id=$alumno['curso_id'];
                            $nombre_curso=$alumno['nombre_curso'];
                            $alumno_id=$alumno['alumno_id'];
                            $nombres=$alumno['nombres'];
                            $ape_paterno=$alumno['ap_paterno'];
                            $ape_materno=$alumno['ap_materno'];
                            $creditos=$alumno['creditos'];

                            echo '<tr>';
                            echo '<th scope="row">' .$matricula_id . '</td>';
                            echo '<th scope="row">' .$alumno_id . '</td>';
                            echo '<td>' .$nombres . '</td>';
                            echo '<td>' .$ape_paterno . '</td>';
                            echo '<td>' .$ape_materno . '</td>';  
                            echo '<th scope="row">' .$curso_id . '</td>';
                            echo '<td>' .$nombre_curso . '</td>';
                            echo '<td>' .$creditos . '</td>';  
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div>
        <button class="btn btn-success" type="submit" name="ingresar" onclick="location.href='nueva_mat.php'">Nuevo</button>
        <button class="btn btn-success" type="submit" name="editar" onclick="location.href='editar_matricula.php'">Editar</button>
        <button class="btn btn-success" type="submit" name="eliminar" onclick="location.href='eliminar_matricula.php'">Eliminar</button>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</html>