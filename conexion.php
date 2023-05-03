<?php
function conectar()
    {
        $conexion = mysqli_connect("localhost","root","usbw","lab06");
        return $conexion;
        die();
    }
function desconectar($conn)
    {
        mysqli_close($conn);
    }
?>