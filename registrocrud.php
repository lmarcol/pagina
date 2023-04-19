<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include('db.php');

$nombre = $_POST["nombre"];
$categoria = $_POST["categoria"];
$precio = $_POST["precio"];
$imagen = $_POST["imagen"];

$consulta="INSERT INTO `abarrotes` (`nombre`, `categoria`, `precio`, `imagen`)
VALUES ('$nombre', '$categoria', '$precio', '$imagen');";

$resultado=mysqli_query($conexion,$consulta) or die ("error de registro");

header("Location: productos.html");

mysqli_close($conexion);

?>