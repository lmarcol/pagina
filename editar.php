<?php
include('db.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Productos</title>
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
            <a href="inicio.html">Inicio </a>
            <a href="mostrar.php">Tabla </a>
        </nav>
    </div>


<!--------mostrar---->

<div class="centrado">
    <?php
        $id = $_GET["id"];
        $sql="SELECT * FROM abarrotes where id = '$id'";
        $result = mysqli_query($conexion, $sql);

        $row=mysqli_fetch_array($result);
        
    ?>
    <form class="formulario" action="procesar_editar.php" method="POST">
        <fieldset>
        <legend>Editor de Productos</legend>
            <div class="contenedor-campos">
                <div class="campo">
            <input class="input-text" type="hidden" value="<?php echo $row['id'] ?>" name="txtID">
                <P>Nombre</P>
                </div>
                <div class="campo">
            <input class="input-text" type="text" value="<?php echo $row['nombre'] ?>" name="txtNombre">
                <p>Categoria</p>
                </div>
                <div class="campo">
            <input class="input-text" type="text" value="<?php echo $row['categoria'] ?>" name="txtCategoria">
                <p>Precio</p>
                </div>
                <div class="campo">
            <input class="input-text" type="text" value="<?php echo $row['precio'] ?>" name="txtPrecio">
                <p>Imagen</p>
                </div>
                <div class="campo">
            <input class="input-text" type="text" value="<?php echo $row['imagen'] ?>" name="txtImagen">
            </div>
            </div><!--Este es el contenedor de los campos-->
            <div class="alinear-derecha flex">
        <button class="btn_editar">Actualizar</button>
        </div>
        </fieldset>
    </form>
    <?php
    ?>
</div>