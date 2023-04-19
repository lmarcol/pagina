<?php
$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="abarrotes";


$con =mysqli_connect($db_host, $db_user, $db_password,$db_name);

if(!$con){
    die("Error " . mysqli_connect_error());
}else{
    echo "conectado..";
}


//Usuario
//iformacion a agregar

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$sexo = $_POST["sexo"];
$contra = $_POST["contra"];

//Consulta en la base de datos

$inser = "INSERT INTO registroo(id, nombre, correo, telefono, sexo, contra, idcargo)
    values ('0', '$nombre','$correo','$telefono','$sexo','$contra','2')";

    $ir=mysqli_query($con,$inser);

    if($ir){
        header("Location: login.html");
        echo "se ha registrado con exito";

    }else{

        echo "hay un error";
        header("Location: registro.html");
    }



    mysqli_close($con)

?>
