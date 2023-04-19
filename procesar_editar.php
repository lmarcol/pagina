<?php
include('db.php');

$ID=$_POST['txtID'];
$NOMBRE=$_POST['txtNombre'];
$CATEGORIA=$_POST['txtCategoria'];
$PRECIO=$_POST['txtPrecio'];
$IMAGEN=$_POST['txtImagen'];

mysqli_query($conexion,"UPDATE `abarrotes` SET `nombre` = '$NOMBRE', `categoria` = '$CATEGORIA', 
`precio` = '$PRECIO', `imagen` = '$IMAGEN' WHERE `abarrotes`.`id` = '$ID'")or die("error de actualización");

mysqli_close($conexion);
header("Location:mostrar.php");

?>