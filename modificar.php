<?php
    include 'includes/head.php'; 
    include 'pdo_connect.php';

    function calcularPrecio($platoFuerte, $refresco, $acompanamiento, $postre, $cantidad) {
        $precioPlatoFuerte = 2000;
        $precioRefresco = 700;
        $precioAcompanamiento = 300;
        $precioPostre = 800;

        $precioTotal = ($precioPlatoFuerte + $precioRefresco + $precioAcompanamiento + $precioPostre) * $cantidad;
        return $precioTotal;
    }

    function modificarPedido($id, $cliente, $platoFuerte, $refresco, $acompanamiento, $postre, $cantidad, $precio, $totalPagar) {
        global $pdo;

        $sql = "UPDATE tb_pedido SET cliente = :cliente, platoFuerte = :platoFuerte, refresco = :refresco, acompanamiento = :acompanamiento, postre = :postre, cantidad = :cantidad, precio = :precio, totalPagar = :totalPagar WHERE id = :id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':cliente', $cliente);
        $stmt->bindParam(':platoFuerte', $platoFuerte);
        $stmt->bindParam(':refresco', $refresco);
        $stmt->bindParam(':acompanamiento', $acompanamiento);
        $stmt->bindParam(':postre', $postre);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':precio', $precio);       
        $stmt->bindValue(':totalPagar', $totalPagar);

        $stmt->execute();
    }
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM tb_pedido WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $pedido = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    if(isset($_POST['actualizar_pedido'])) {
        $id = $_POST['id'];
        $cliente = $_POST['cliente'];
        $platoFuerte = $_POST['platoFuerte'];
        $refresco = $_POST['refresco'];
        $acompanamiento = $_POST['acompanamiento'];
        $postre = $_POST['postre'];
        $cantidad = $_POST['cantidad'];

        $precio = calcularPrecio($platoFuerte, $refresco, $acompanamiento, $postre, $cantidad);
        $totalPagar = $precio * $cantidad;
        $impuesto = $totalPagar * 0.25;
        $totalPagar +=  $impuesto;

        modificarPedido($id, $cliente, $platoFuerte, $refresco, $acompanamiento, $postre, $cantidad, $precio, $totalPagar);
        header("Location: orden.php");
    }
?>
<section class="col-md-12">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Modificar Pedido</h3>
                </div>
                <div class="card-body">
                    <form action="modificar.php?id=<?php echo $pedido['id']; ?>" method="POST">
                        <div class="form-group">
                            <label for="cliente">Cliente</label>
                            <input type="text" class="form-control" id="cliente" name="cliente" value="<?php echo htmlspecialchars($pedido['cliente']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="platoFuerte">Plato Fuerte</label>
                            <select class="form-control" id="platoFuerte" name="platoFuerte" required>
                                <option value="pollo" <?php if($pedido['platoFuerte'] == 'pollo') echo 'selected'; ?>>Pollo</option>
                                <option value="carne" <?php if($pedido['platoFuerte'] == 'carne') echo 'selected'; ?>>Carne</option>
                                <option value="pescado" <?php if($pedido['platoFuerte'] == 'pescado') echo 'selected'; ?>>Pescado</option>
                                <option value="vegetariano" <?php if($pedido['platoFuerte'] == 'vegetariano') echo 'selected'; ?>>Vegetariano</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="refresco">Refresco</label>
                            <select class="form-control" id="refresco" name="refresco" required>
                                <option value="coca-cola" <?php if($pedido['refresco'] == 'coca-cola') echo 'selected'; ?>>Coca Cola</option>
                                <option value="pepsi" <?php if($pedido['refresco'] == 'pepsi') echo 'selected'; ?>>Pepsi</option>
                                <option value="agua" <?php if($pedido['refresco'] == 'agua') echo 'selected'; ?>>Agua</option>
                                <option value="jugo" <?php if($pedido['refresco'] == 'jugo') echo 'selected'; ?>>Jugo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="acompanamiento">Acompañamiento</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="acompanamiento" id="papas" value="Papas fritas" <?php if($pedido['acompanamiento'] == 'Papas fritas') echo 'checked'; ?> required>
                                <label class="form-check-label" for="papas">Papas fritas</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="acompanamiento" id="ensalada" value="Ensalada" <?php if($pedido['acompanamiento'] == 'Ensalada') echo 'checked'; ?> required>
                                <label class="form-check-label" for="ensalada">Ensalada</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="acompanamiento" id="arroz" value="Arroz" <?php if($pedido['acompanamiento'] == 'Arroz') echo 'checked'; ?> required>
                                <label class="form-check-label" for="arroz">Arroz</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postre">Postre</label>
                            <select class="form-control" id="postre" name="postre" required>
                                <option value="helado" <?php if($pedido['postre'] == 'helado') echo 'selected'; ?>>Helado</option>
                                <option value="pastel" <?php if($pedido['postre'] == 'pastel') echo 'selected'; ?>>Pastel</option>
                                <option value="fruta" <?php if($pedido['postre'] == 'fruta') echo 'selected'; ?>>Fruta</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input type="text" class="form-control" id="cantidad" name="cantidad" value="<?php echo htmlspecialchars($pedido['cantidad']); ?>" required>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $pedido['id']; ?>">
                        <button type="submit" class="btn btn-primary btn-block" name="actualizar_pedido">Actualizar Pedido</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>