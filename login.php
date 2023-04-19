<?php
 //encontar la base de datos con los campos de texto
 $usuario=$_POST['username'];
 $password=$_POST['password'];
  
 //conectar a la base de datos
 $con=mysqli_connect("localhost", "root", "", "abarrotes");
 $consulta="SELECT * FROM registroo WHERE correo= '$usuario' and contra='$password' ";
 $resultado=mysqli_query($con, $consulta);
 
 $filas=mysqli_fetch_array($resultado);
 
 //validar con 1 y 0 
 if ($filas['idcargo'] == 1) { //Administrador
    header("Location: productos.html");
 }  else if($filas['idcargo'] == 2){//cliente
    header("Location: tienda.php");
 } else{
    echo "Error en la autenticacion";
    header("Location: login.html");
 }
 
 mysqli_free_result($resultado);
 mysqli_close($con);

?>