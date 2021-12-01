<?php 
    $id = $datos[0]['id'];
    $id_cliente = $datos[0]['id_cliente'];
    $id_detalle_suscripcion = $datos[0]['id_detalle_suscripcion'];
    $metodo_pago = $datos[0]['metodo_pago'];
    $periodo_pago = $datos[0]['periodo_pago'];
    $fecha_inicio = $datos[0]['fecha_inicio']; 
    $fecha_final = $datos[0]['fecha_final']; 
    $precio_renovacion = $datos[0]['precio_renovacion']; 
    $estado = $datos[0]['estado']; 
 ?>

<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>

<section class="col-lg-7 connectedSortable">
    <div class="card">
        <div class="card-header  bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-chart-pie mr-1"></i>
                Editar Suscripcion
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
                <form method="POST" action="<?php echo base_url().'/Suscripcion/actualizar' ?>">
                    <div class="row">
                        <div class="col-6">
                            <div>
                                <label for="id_cliente">id_cliente</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="number" name="id_cliente" id="id_cliente" class="form-control" value="<?php echo $id_cliente ?>">
                            </div><br>
                            <div>
                                <label for="id_detalle_suscripcion">id_detalle_suscripcion</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="number" name="id_detalle_suscripcion" id="id_detalle_suscripcion" class="form-control" value="<?php echo $id_detalle_suscripcion ?>">
                            </div><br>
                            <div>
                                <label for="metodo_pago">metodo_pago</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="metodo_pago" id="metodo_pago" class="form-control" value="<?php echo $metodo_pago ?>">
                            </div><br>
                            <div>
                                <label for="periodo_pago">periodo_pago</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="periodo_pago" id="periodo_pago" class="form-control" value="<?php echo $periodo_pago ?>">
                            </div><br>
                        </div>
                        <div class="col-6">
                            <div>
                                <label for="fecha_inicio">fecha_inicio</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="<?php echo $fecha_inicio ?>">
                            </div><br>
                            <div>
                                <label for="fecha_final">fecha_final</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="date" name="fecha_final" id="fecha_final" class="form-control" value="<?php echo $fecha_final ?>">
                            </div><br>
                            <div>
                                <label for="precio_renovacion">precio_renovacion</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="precio_renovacion" id="precio_renovacion" class="form-control" value="<?php echo $precio_renovacion ?>">
                            </div><br>
                            <div>
                                <label for="estado">estado</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="estado" id="estado" class="form-control" value="<?php echo $estado ?>">
                            </div><br>
                            <div>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="text" hidden="" name="id" id="id" class="form-control" value="<?php echo $id ?>">
                            </div><br>
                        </div>
                    </div>
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