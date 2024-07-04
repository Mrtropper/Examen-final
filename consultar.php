<?php
    include 'includes/head.php';
    include 'pdo_connect.php';
?>

    <div class="container-fluid">
        <div class="row">
            <aside class="col-md-3 sidebar">
                <ul class="nav flex-column">
                <li class="nav-item">
                      <h3>  <a class="nav-link active" href="index.php">Special food</a></h3>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="orden.php">Crear orden</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="consultar.php">Consultar Ordenes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="modificar_pedido.php">Modificar ordenes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tabla_eliminar.php">Eliminar ordenes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Salir</a>
                    </li>
                </ul>
            </aside>
            <main class="col-md-9 content">
            <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            <h4 class="mb-0">Tabla</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>id</th>
                                        <th>Cliente</th>
                                        <th>platoFuerte</th>
                                        <th>Refresco</th>
                                        <th>Acompañamiento</th>
                                        <th>Postre</th>
                                        <th>precio</th>
                                        <th>cantidad</th>
                                        <th>totalPagar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM tb_pedido";
                                    $stmt = $pdo->query($sql);
                                    if ($stmt->rowCount() > 0) {
                                        while ($row = $stmt->fetch()) {
                                    ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                                        <td><?php echo htmlspecialchars($row['cliente']); ?></td>
                                        <td><?php echo htmlspecialchars($row['platoFuerte']); ?></td>
                                        <td><?php echo htmlspecialchars($row['refresco']); ?></td>
                                        <td><?php echo htmlspecialchars($row['acompanamiento']); ?></td>
                                        <td><?php echo htmlspecialchars($row['postre']); ?></td>
                                        <td><?php echo htmlspecialchars($row['precio']); ?></td>
                                        <td><?php echo htmlspecialchars($row['cantidad']); ?></td>
                                        <td><?php echo htmlspecialchars($row['totalPagar']); ?></td>
                                    </tr>
                                    <?php
                                        }
                                    } else {
                                    ?>
                                    <tr>
                                        <td colspan="6" class="text-center">No hay pedidos guardados</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
