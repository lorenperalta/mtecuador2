<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>

<section class="col-lg-7 connectedSortable">
    <div class="card">
        <div class="card-header  bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-chart-pie mr-1"></i>
                Clientes
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
                <form method="POST" action="<?php echo base_url().'/crear' ?>">
                <div class="row">
                    <div class="col-6">
                        <div>
                            <label for="razon_social">Razon Social</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="text" name="razon_social" id="razon_social" class="form-control">
                        </div>
                        <div>
                            <label for="abreviatura">Abreviatura</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="abreviatura" id="abreviatura" class="form-control">
                        </div>
                        <div>
                            <label for="RUC_ciente">RUC del cliente</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="RUC_cliente" id="RUC_cliente" class="form-control">
                        </div>
                        <div>
                            <label for="celular_cliente">Celular</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="celular_cliente" id="celular_cliente" class="form-control">
                        </div>
                        <div>
                            <label for="telefono_cliente">Telefono ciente</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="telefono_cliente" id="telefono_cliente" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                            <label for="localizacion">Localizacion</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="localizacion" id="localizacion" class="form-control">
                        </div>
                        <div>
                            <label for="email_cliente">Email del cliente</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="email" name="email_cliente" id="email_cliente" class="form-control">
                        </div>
                        <div>
                            <label for="fecha">Fecha</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="date" name="fecha" id="fecha" class="form-control">
                        </div>
                        <div>
                            <label for="numero_clientes">Numero de clientes</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="numero_clientes" id="numero_clientes" class="form-control">
                        </div>
                        <div>
                            <label for="estado">Estado del cliente</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="estado" id="estado" class="form-control">
                        </div>
                    </div>
                </div><br>
                    <button class="btn btn-warning">Guardar</button>
                </form>
                </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>Razon Social</th>
                        <th>Abreviatura</th>
                        <th>RUC del cliente</th>
                        <th>Celular</th>
                        <th>Telefono</th>
                        <th>Localizacion</th>
                        <th>Email</th>
                        <th>Fecha</th>
                        <th>Numero de clientes</th>
                        <th>Estado del cliente</th>
                    </tr>
                    <?php foreach($datos as $key): ?>
                            <tr>
                                <td><?php echo $key->razon_social ?></td>
                                <td><?php echo $key->abreviatura ?></td>
                                <td><?php echo $key->RUC_cliente ?></td>
                                <td><?php echo $key->celular_cliente ?></td>
                                <td><?php echo $key->telefono_cliente ?></td>
                                <td><?php echo $key->localizacion ?></td>
                                <td><?php echo $key->email_cliente ?></td>
                                <td><?php echo $key->fecha ?></td>
                                <td><?php echo $key->numero_clientes ?></td>
                                <td><?php echo $key->estado ?></td>
                                <td>
                                    <a href="<?php echo base_url().'/obtenerCliente/'.$key->id_cliente ?>" class="btn btn-warning btn-sm">Editar</a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'/eliminar/'.$key->id_cliente ?>" class="btn btn-danger btn-sm">Eliminar</a>
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