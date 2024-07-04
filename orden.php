<?php
    include 'includes/head.php';
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
                <div class="row">
                    <section class="col-md-12">
                        <h2>Crear Orden de Restaurante</h2>
                        <div class="form-section">
                            <form action="procesar_orden.php" method="post">
                                <div class="form-group">
                                    <label for="nombreCliente">Nombre del Cliente</label>
                                    <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" required>
                                </div>
                                <div class="form-group">
                                    <label for="platoFuerte">Plato Fuerte</label>
                                    <select class="form-control" id="platoFuerte" name="platoFuerte" required>
                                        <option value="pollo">Pollo</option>
                                        <option value="carne">Carne</option>
                                        <option value="pescado">Pescado</option>
                                        <option value="vegetariano">Vegetariano</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="refresco">Refresco</label>
                                    <select class="form-control" id="refresco" name="refresco" required>
                                        <option value="coca-cola">Coca Cola</option>
                                        <option value="pepsi">Pepsi</option>
                                        <option value="agua">Agua</option>
                                        <option value="jugo">Jugo</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="acompanamiento">Acompañamientos</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="acompanamiento" id="acompanamiento1"
                                            value="Papas fritas" required>
                                        <label class="form-check-label" for="postre1">Papas fritas</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="acompanamiento" id="acompanamiento2"
                                            value="Ensalada" required>
                                        <label class="form-check-label" for="acompanamiento2">Ensalada</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="acompanamiento" id="acompanamiento3"
                                            value="Arroz" required>
                                        <label class="form-check-label" for="acompanamiento3">Arroz</label>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="postre">Postre</label>
                                    <select class="form-control" id="postre" name="postre" required>
                                        <option value="helado">Helado</option>
                                        <option value="pastel">Pastel</option>
                                        <option value="fruta">Fruta</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="text" class="form-control" id="cantidad" name="cantidad" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Crear Orden</button>
                            </form>
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </div>

   