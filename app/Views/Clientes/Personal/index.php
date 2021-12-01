<?= $this->extend('Layout/ClienteDash') ?>
<?= $this->section('contenido') ?>


<section class="content">
    <div class="row">

    <section class="col-lg-5 connectedSortable ui-sortable">
    <div class="card">
        <div class="card-header  bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-chart-pie mr-1"></i>
                Detalle Clientes
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
                    <form method="POST" action="<?php echo base_url() . '/DetalleCliente/crear' ?>">
                        <div class="col-4">
                            <div>
                                <label for="id_cliente">id_cliente</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="text" name="id_cliente" id="id_cliente" class="form-control">
                            </div>
                            <div>
                                <label for="nombre">Nombre</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="text" name="nombre" id="nombre" class="form-control">
                            </div>
                            <div>
                                <label for="apellido">Apellido</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="apellido" id="apellido" class="form-control">
                            </div>
                            <div>
                                <label for="dni">DNI</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="dni" id="dni" class="form-control">
                            </div>
                            <div>
                                <label for="usuario">Usuario</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="usuario" id="usuario" class="form-control">
                            </div>
                            <div>
                                <label for="contraseña">Contraseña</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="password" name="contraseña" id="contraseña" class="form-control">
                            </div>
                            <div>
                                <label for="estado">Estado</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="estado" id="estado" class="form-control">
                            </div><br>
                            <button class="btn btn-warning">Guardar</button>
                        </div>
                    </form>
                </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>id_cliente</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>DNI</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                        </tr>
                        <?php foreach ($datos as $key) : ?>
                            <tr>
                                <td><?php echo $key->id_cliente ?></td>
                                <td><?php echo $key->nombre ?></td>
                                <td><?php echo $key->apellido ?></td>
                                <td><?php echo $key->dni ?></td>
                                <td><?php echo $key->usuario ?></td>
                                <td><?php echo $key->estado ?></td>
                                <td>
                                    <a href="<?php echo base_url() . '/DetalleCliente/obtener/' . $key->id_detalleCliente ?>" class="btn btn-warning btn-sm">Editar</a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . '/DetalleCliente/eliminar/' . $key->id_detalleCliente ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div><!-- /.card-body -->
    </div>
</section>

        <section class="col-lg-5 connectedSortable ui-sortable">

            <div class="card">
                <div class="card-header ui-sortable-handle bg-danger" style="cursor: move;">
                    <h3 class="card-title">
                        <i class="ion ion-clipboard mr-1"></i>
                        Facturacion
                    </h3>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <ul class="todo-list ui-sortable list-unstyled" data-widget="todo-list">
                        <li>
                            <!-- drag handle -->
                            <span class="handle ui-sortable-handle">
                                <i class="fas fa-ellipsis-v"></i>
                                <i class="fas fa-ellipsis-v"></i>
                            </span>
                            <span class="text text-primary">Ley: <?php // echo $NombreLey ?></span>
                        </li>
                      
                    </ul>
                </div>

            </div>
        </section>

    </div>
</section>
<?= $this->endSection() ?>
