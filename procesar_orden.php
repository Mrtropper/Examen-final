<?php
include 'pdo_connect.php';

function calcularPrecio($platoFuerte, $refresco, $acompanamientos, $postre){
    $precioPlatoFuerte = 2000;
    $precioRefresco = 700;
    $precioAcompanamiento = 300;
    $precioPostre = 800;

    $precio = ($precioPlatoFuerte + $precioRefresco + $precioAcompanamiento + $precioPostre);
    return $precio;
}

function procesarOrden($cliente, $platoFuerte, $refresco, $acompanamientos, $postre, $precio, $cantidad, $totalPagar) {
    global $pdo;
    $sql = "INSERT INTO tb_pedido (cliente, platoFuerte, refresco, acompanamiento, postre, precio, cantidad, totalPagar) 
            VALUES (:cliente, :platoFuerte, :refresco, :acompanamientos, :postre, :precio, :cantidad, :totalPagar)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':cliente', $cliente);
    $stmt->bindValue(':platoFuerte', $platoFuerte);
    $stmt->bindValue(':refresco', $refresco);
    $stmt->bindValue(':acompanamientos', $acompanamientos ?? 'Sin acompañamiento');
    $stmt->bindValue(':postre', $postre);
    $stmt->bindValue(':precio', $precio);
    $stmt->bindValue(':cantidad', $cantidad);
    $stmt->bindValue(':totalPagar', $totalPagar);

    $stmt->execute();
}



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cliente = $_POST['nombreCliente'];
    $platoFuerte = $_POST['platoFuerte'];
    $refresco = $_POST['refresco'];
    $acompanamientos = isset($_POST['acompanamientos']) ? $_POST['acompanamientos'] : null;
    $postre = $_POST['postre'];
    $cantidad = $_POST['cantidad'];

    $precio = calcularPrecio($platoFuerte, $refresco, $acompanamientos, $postre);
    
    $totalPagar = $precio * $cantidad;
    $impuesto = $totalPagar * 0.25;
    $totalPagar +=  $impuesto;
    procesarOrden($cliente, $platoFuerte, $refresco, $acompanamientos, $postre, $precio, $cantidad, $totalPagar);
    header("Location: orden.php");
}
?>
