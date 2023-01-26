<?php
function inicio_tablas(){
    $conexion_inicial = new mysqli('db', 'root', 'test', 'dbname');
    $error = $conexion_inicial->connect_errno;
    if ($error != null) {
        die("Fallo en al conexion" . $conexion_inicial->connect_error . " Con numero " . $error);
    }
    $sql = "CREATE DATABASE IF NOT EXISTS tienda";
    $conexion_inicial->query($sql);   
    $conexion_inicial->close();
}

function compruebaExtension($imageFileType)
{
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        return false;
    } else {
        return true;
    }
}
function comprobaTamanho()
{
    if ($_FILES['foto']['size'] > 500000) {
        return false;
    } else {
        return true;
    }
}
