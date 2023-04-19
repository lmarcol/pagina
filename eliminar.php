<?php

include('db.php');

$ID=$_POST["txtID"];
mysqli_query($conexion,"DELETE FROM abarrotes where id='$ID'")or die("error al eliminar");

mysqli_close($conexion);
header("location:mostrar.php");

?>