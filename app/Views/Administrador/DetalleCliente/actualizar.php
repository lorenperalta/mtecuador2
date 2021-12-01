<?php 
    $id_detalleCliente = $datos[0]['id_detalleCliente'];
    $id_cliente = $datos[0]['id_cliente'];
    $nombre = $datos[0]['nombre'];
    $apellido = $datos[0]['apellido'];
    $dni = $datos[0]['dni'];
    $usuario = $datos[0]['usuario']; 
    $contraseña = $datos[0]['contraseña']; 
    $estado = $datos[0]['estado']; 
 ?>

<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>


<section class="col-lg-7 connectedSortable">
    <div class="card">
        <div class="card-header  bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-chart-pie mr-1"></i>
                Editar Detalle Clientes
            </h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark active text-white" href="#revenue-chart"
                            data-toggle="tab">Ingresar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark text-white" href="#sales-chart"
                            data-toggle="tab">Listar</a>
                    </li>
                </ul>
            </div>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                    <form method="POST" action="<?php echo base_url().'/DetalleCliente/actualizar' ?>">
                    <div>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="text" hidden="" name="id_detalleCliente" id="id_detalleCliente" class="form-control" value="<?php echo $id_detalleCliente ?>">
                    </div><br>
                    <div>
                        <label for="id_cliente">id_cliente</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="text" name="id_cliente" id="id_cliente" class="form-control" value="<?php echo $id_cliente ?>">
                    </div><br>
                    <div>
                        <label for="nombre">Nombre</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $nombre ?>">
                    </div><br>
                    <div>
                        <label for="apellido">Apellido</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="apellido" id="apellido" class="form-control" value="<?php echo $apellido ?>">
                    </div><br>
                    <div>
                        <label for="dni">DNI</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="dni" id="dni" class="form-control" value="<?php echo $dni ?>">
                    </div><br>
                    <div>
                        <label for="usuario">Usuario</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="usuario" id="usuario" class="form-control" value="<?php echo $usuario ?>">
                    </div><br>
                    <div>
                        <label for="contraseña">Contraseña</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="password" name="contraseña" id="contraseña" class="form-control" value="<?php echo $contraseña ?>">
                    </div><br>
                    <div>
                        <label for="estado">Estado</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="estado" id="estado" class="form-control" value="<?php echo $estado ?>">
                    </div><br>
                    <button class="btn btn-warning">Guardar</button>
                </form>
                </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">

                </div>
            </div>
        </div><!-- /.card-body -->
    </div>
</section>


<?= $this->endSection()?>