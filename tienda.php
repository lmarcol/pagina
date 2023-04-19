<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/tienda.css">
    <title>Tienda</title>
</head>
<body>
<header class="header">
        <a href="tienda.html">
            <img class="header__logo" src="img/logoTienda.png" alt="logotipo">
        </a>
    </header>

    <nav class="navegacion">
        <a class="navegacion__enlace navegacion__enlace--activo" href="tienda.php">Tienda</a>
        <a class="navegacion__enlace" href="inicio.html">Salir</a>
    </nav>

    
        <h1>Nuestros productos</h1>
    <div class="grid">
        <?php 
            include("db.php");
            $sql = mysqli_query($conexion, "SELECT * FROM abarrotes");
            while($row = mysqli_fetch_array($sql)){
        ?>
            <div class="producto">
                <img class="producto__imagen" src="<?php echo $row["imagen"] ?>" alt="">
                <div class="producto__informacion">
                    <p class="producto__nombre"><?php echo $row["nombre"] ?></p>
                    <p class="producto__precio">$<?php echo $row["precio"] ?></p>
                    <form action="carrito.php" method="get">
                        <button class="boton" type="submit" name="carrito" value="<?php echo $row["id"] ?>">Agregar al carrito</button>
                    </form>
                </div>
            </div>
                <?php
                }
                ?>
    </div>
</body>
</html>  
