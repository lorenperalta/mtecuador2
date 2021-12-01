<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>


<section class="col-lg-7 connectedSortable">
    <div class="card">
        <div class="card-header  bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-chart-pie mr-1"></i>
                Suscripcion
            </h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark active text-white" href="#revenue-chart" data-toggle="tab">Ingresar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark text-white" href="#sales-chart" data-toggle="tab">Listar</a>
                    </li>
                </ul>
            </div>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                <form method="POST" action="<?php echo base_url().'/Suscripcion/crear' ?>">
                    <div class="row">
                        <div class="col-6">
                            <div>
                                <label for="id_cliente">id_cliente</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="number" name="id_cliente" id="id_cliente" class="form-control">
                            </div><br>
                            <div>
                                <label for="id_detalle_suscripcion">id_detalle_suscripcion</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="number" name="id_detalle_suscripcion" id="id_detalle_suscripcion" class="form-control">
                            </div><br>
                            <div>
                                <label for="metodo_pago">metodo_pago</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="metodo_pago" id="metodo_pago" class="form-control">
                            </div><br>
                            <div>
                                <label for="periodo_pago">periodo_pago</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="periodo_pago" id="periodo_pago" class="form-control">
                            </div><br>
                            </div>
                        <div class="col-6">
                            <div>
                                <label for="fecha_inicio">fecha_inicio</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
                            </div><br>
                            <div>
                                <label for="fecha_final">fecha_final</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="date" name="fecha_final" id="fecha_final" class="form-control">
                            </div><br>
                            <div>
                                <label for="precio_renovacion">precio_renovacion</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="precio_renovacion" id="precio_renovacion" class="form-control">
                            </div><br>
                            <div>
                                <label for="estado">Estado</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="estado" id="estado" class="form-control">
                            </div><br>
                        </div>
                    </div>
                    <button class="btn btn-warning">Guardar</button>
                </form>
                </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>id_cliente</th>
                        <th>id_detalle_suscripcion</th>
                        <th>metodo_pago</th>
                        <th>periodo_pago</th>
                        <th>fecha_inicio</th>
                        <th>fecha_final</th>
                        <th>precio_renovacion</th>
                        <th>Estado</th>
                    </tr>
                    <?php foreach($datos as $key): ?>
                            <tr>
                                <td><?php echo $key->id_cliente ?></td>
                                <td><?php echo $key->id_detalle_suscripcion ?></td>
                                <td><?php echo $key->metodo_pago ?></td>
                                <td><?php echo $key->periodo_pago?></td>
                                <td><?php echo $key->fecha_inicio ?></td>
                                <td><?php echo $key->fecha_final ?></td>
                                <td><?php echo $key->precio_renovacion ?></td>
                                <td><?php echo $key->estado ?></td>
                                <td>
                                    <a href="<?php echo base_url().'/Suscripcion/obtener/'.$key->id ?>" class="btn btn-warning btn-sm">Editar</a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'/Suscripcion/eliminar/'.$key->id ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                </table>
                </div>
            </div>
        </div><!-- /.card-body -->
    </div>
</section>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    let mensaje = '<?php echo $mensaje ?>';

    if (mensaje == '1') {
        swal(':D','Agregado con exito!','success');
    } else if (mensaje == '0'){
        swal(':(','Fallo al agregar!','error');
    } else if (mensaje == '2'){
        swal(':D','Actualizado con exito!','success');
    } else if (mensaje == '3'){
        swal(':(','Fallo al Actualizar!','error');
    } else if (mensaje == '4'){
        swal(':D','Eliminado con exito!','success');
    } else if (mensaje == '5'){
        swal(':(','Fallo al eliminar!','error');
    }
</script>
<?= $this->endSection()?>