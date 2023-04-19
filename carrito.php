<?php

session_start();

include ("db.php");

$car = array(
    'productos' => array(),
    'subtotal' => 0,
    'total' => 0
);

if(isset($_SESSION["carrito"])){
    $car = $_SESSION["carrito"];
}
$carritosGuardados = [];
if(isset($_SESSION["carritos"])){
    $carritosGuardados = $_SESSION["carritos"];
}

calcular($car, $carritosGuardados);

if(isset($_GET["carrito"])){
    //print $_SESSION["carrito"]['total'];
    $id = $_GET["carrito"];
    if($id){
        add($id, $car, $conexion, $carritosGuardados);
    }
}

if(isset($_GET["remove"])){
    $id = $_GET["remove"];
    if(isset($id) || $id == 0){
        remove($id, $car, $carritosGuardados);
    }
}

function add($p = [], &$car, &$conexion, &$carritosGuardados){
    $sql = mysqli_query($conexion, "SELECT * FROM abarrotes WHERE id = '$p' ");
    $resul = mysqli_fetch_array($sql);
    array_push($car['productos'], $resul);
    $_SESSION["carrito"] = $car;
    calcular($car, $carritosGuardados);
}

function calcular(&$car, &$carritosGuardados){
    $car['subtotal'] = 0;
    $car['total'] = 0;
    $car['index'] = 0;

    foreach($car['productos'] as &$p){
        $car['subtotal'] += $p['precio'];
    }
    $car['total'] = $car['subtotal'];
    $_SESSION["carrito"] = $car;

    $carritosGuardados[$car['index']] = $car;
    $_SESSION["carritos"] = $carritosGuardados;
}

function remove($index = 0, &$car, &$carritosGuardados){
    array_splice($car['productos'], $index, 1);
    calcular($car, $carritosGuardados);
}

?>

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
    <h1>Carrito Total: <?php echo $car['total'] ?></h1>
    <form action="tienda.php" method="get">
        <button class="boton-carrito" type="submit" name="p" value="p">Seguir Comprando</button>
    </form>
    <form action="#" method="get">
        <button class="boton-carrito" type="submit" name="comprar" value="comprar">Comprar</button>
    </form>

    <div class="grid">
        <?php
            include("db.php");
            foreach($car['productos'] as $key =>$row){
        ?>
        <div class="producto">
                <img class="producto__imagen" src="<?php echo $row["imagen"] ?>" alt="">
                <div class="producto__informacion">
                    <p class="producto__nombre"><?php echo $row["nombre"] ?></p>
                    <p class="producto__precio">$<?php echo $row["precio"] ?></p>
                    <form action="carrito.php" method="get">
                        <button class="boton" type="submit" name="remove" value="<?php echo $key ?>">Borrar</button>
                    </form>
                </div>
            </div>
        <?php
            }
            ?>
    </div>

</body>
</html>