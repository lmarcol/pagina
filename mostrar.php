<?php
include('db.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>productos</title>
    <link rel="preload" href="css/normalize.css" as="style">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <header>
        <a class="navegacion-titulo" href="inicio.html">
            <h1 class="titulo">San Antonio
                <span>Abarrotes</span>
            </h1>
        </a>
    </header>
    <div class="nav-bg">
        <nav class="navegacion-principal contenedor">
            <a href="productos.html">Inicio </a>
            <a href="mostrar.php">Tabla </a>
        </nav>
    </div>


<!--------mostrar---->

<div>
<table>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Categoria</th>
      <th scope="col">Precio</th>
      <th scope="col">Imagen</th>
      <th scope="col">Eliminar</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>

    <?php
        $sql="SELECT * FROM abarrotes";
        $result = mysqli_query($conexion, $sql);

        while($mostrar = mysqli_fetch_array($result)){

    ?>

    <tr>
        <td><?php echo $mostrar['id'] ?></th>
        <td><?php echo $mostrar['nombre'] ?></th>
        <td><?php echo $mostrar['categoria'] ?></th>
        <td><?php echo $mostrar['precio'] ?></th>
        <td><?php echo $mostrar['imagen'] ?></th>
        
        <form action="eliminar.php" method="post">
            <input type="hidden" value="<?php echo $mostrar['id']?>" name="txtID"readonly/>
            <td><button class="btn_eliminar">Eliminar</button></td>
        </form>
        
        
        <form action="editar.php?id=<?php echo $mostrar['id'] ?>" method="post">
            <td><button class="btn_editar">Editar</button></td>
        </form>
        


    </tr>

    <?php
}
    ?>
  </tbody>

</table>



</body>
