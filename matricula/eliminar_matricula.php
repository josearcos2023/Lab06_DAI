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
    <title>Eliminar Matrícula</title>
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
            <h3>Eliminar Matrícula</h3>
            <div>
                <form name="formEliminar" method="post" action="eliminar_matricula_reg.php">
                <div class="col-3 mt-3">
                        <label for="matricula">Elija el nombre del alumno a eliminar la matrícula: </label><br>
                        <select class="form-select" name="matricula" id="matricula">
                            <option value=""></option>
                    <?php
                        //Seguimos recorriendo el array...
                        while($matricula = mysqli_fetch_array($resultado))
                        {
                            $matricula_id=$matricula['matricula_id'];
                            $curso_id=$matricula['curso_id'];
                            $nombre_curso=$matricula['nombre_curso'];
                            $alumno_id=$matricula['alumno_id'];
                            $nombres=$matricula['nombres'];
                            $ape_paterno=$matricula['ap_paterno'];
                            $ape_materno=$matricula['ap_materno'];
                            $creditos=$matricula['creditos'];
                        ?>
                    <?php  
                            echo '<option value='.$matricula_id.'>' .$nombres.' '.$ape_paterno.' '.$ape_materno .' - '.$nombre_curso.' - '.$creditos.' creditos </option>';
                        }
                    ?>
                        </select>
                    </div>
                    <div class="mt-2">
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