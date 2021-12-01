<?php $libro  = $idLibrore;
$NombreLibro  = $dbLibros[0]['NombreLibro'];
$NombreLey  = $dbLeyes[0]['NombreLey'];
?>
<?= $this->extend('Layout/Layout') ?>
<?= $this->section('contenido') ?>

<section class="content">
    <div class="row">
        <section class="col-lg-7 connectedSortable">
            <div class="card">
                <div class="card-header  bg-primary">
                    <h3 class="card-title text-white">
                        <i class="fas fa-chart-pie mr-1"></i>
                        <?php echo $NombreLibro ?>
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
                            <form method="POST" action="<?php echo base_url() . '/Titulos/crear' ?>">
                                <div class="row">
                                    <label for="NoTitulo">Nº Titulo</label>
                                    <div class="col-sm">
                                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="number" name="NoTitulo" id="NoTitulo" class="form-control">
                                    </div>
                                    <div class="col-sm form-check">
                                        <input class="form-check-input" type="checkbox" name="mostrar_NoTitulo" id="mostrar_NoTitulo">
                                        <label class="form-check-label">
                                            Mostrar numero de titulo
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="NombreTitulo">NombreTitulo</label>
                                    <div class="col-sm">
                                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="text" name="NombreTitulo" id="NombreTitulo" class="form-control">
                                    </div>
                                    <div class="col-sm form-check">
                                        <input class="form-check-input" type="checkbox" name="mostrar_NombreTitulo" id="mostrar_NombreTitulo">
                                        <label class="form-check-label">
                                            Mostrar nombre de titulo
                                        </label>
                                    </div>
                                </div>

                                <div hidden>
                                    <label for="idLibro">idLibro</label>
                                    <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="idLibro" id="idLibro" value="<?php echo $libro ?>" class="form-control">
                                </div>

                                <button class="btn btn-warning">Guardar</button>
                            </form>
                        </div>
                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                            <table class="table table-striped">
                                <tr>
                                    <th>#</th>
                                    <th>NoTitulo</th>
                                    <th>NombreTitulo</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                                <?php foreach ($datos as $key) : ?>
                                    <tr>
                                        <td><?php echo $key->idTitulo ?></td>
                                        <td><?php echo $key->NoTitulo ?></td>
                                        <td><?php echo $key->NombreTitulo ?></td>
                                        <td>
                                            <a href="<?php echo base_url() . '/Titulo/obtener/' . $key->idTitulo ?>" class="btn btn-warning btn-sm">Editar</a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url() . '/Titulo/eliminar/' . $key->idTitulo ?>" class="btn btn-danger btn-sm">Eliminar</a>
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
                        Vista Previa
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
                            <span class="text text-danger">Ley: <?php echo $NombreLey ?></span>
                            <span class="text text-primary">Libro: <?php echo $NombreLibro ?></span>
                        </li>
                        <?php foreach ($datos as $key) : ?>
                            <li>

                                <div class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="todo3" id="todoCheck3">
                                    <label for="todoCheck3"></label>
                                </div>
                                <span class="text text-info"><a class="link-info rounded" href="<?php echo base_url() . '/Capitulo/' . $key->idTitulo ?>">Titulo Nº <?php echo  $key->NoTitulo ?> : <?php echo  $key->NombreTitulo ?></a> </span>

                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>
        </section>
    </div>
</section>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    let mensaje = '<?php echo $mensaje ?>';

    if (mensaje == '1') {
        swal(':D', 'Agregado con exito!', 'success');
    } else if (mensaje == '0') {
        swal(':(', 'Fallo al agregar!', 'error');
    } else if (mensaje == '2') {
        swal(':D', 'Actualizado con exito!', 'success');
    } else if (mensaje == '3') {
        swal(':(', 'Fallo al Actualizar!', 'error');
    } else if (mensaje == '4') {
        swal(':D', 'Eliminado con exito!', 'success');
    } else if (mensaje == '5') {
        swal(':(', 'Fallo al eliminar!', 'error');
    }
</script>
<?= $this->endSection() ?>