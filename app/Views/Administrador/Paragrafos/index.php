<?php

$idSeccion = $idSecc;
$NombreTitulos = $dbtitu[0]['NombreTitulo'];
$NombreLibros = $dblib[0]['NombreLibro'];
$NombreLey = $dbley[0]['NombreLey'];
$NombreCapitulo = $dbCapi[0]['NombreCapitulo'];
$NombreSeccion = $datosec[0]['NombreSeccion'];
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
                        Paragrafos
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
                            <form method="POST" action="<?php echo base_url() . '/Paragrafos/crear' ?>">
                                <div class="row">
                                    <label for="NoParagrafo">NoParagrafo</label>
                                    <div class="col-sm">
                                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="NoParagrafo" id="NoParagrafo" class="form-control">
                                    </div>
                                    <div class="col-sm form-check">
                                        <input class="form-check-input" type="checkbox" name="mostrar_NoParagrafo" id="mostrar_NoParagrafo">
                                        <label class="form-check-label">
                                            Mostrar numero de seccion
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="NombreParagrafo">NombreParagrafo</label>
                                    <div class="col-sm">
                                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="NombreParagrafo" id="NombreParagrafo" class="form-control">
                                    </div>
                                    <div class="col-sm form-check">
                                        <input class="form-check-input" type="checkbox" name="mostrar_NombreParagrafo" id="mostrar_NombreParagrafo">
                                        <label class="form-check-label">
                                            Mostrar nombre de seccion
                                        </label>
                                    </div>
                                </div>
                                <div hidden>
                                    <label for="idSeccion">idSeccion</label>
                                    <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="idSeccion" id="idSeccion" value="<?php echo $idSeccion ?>" class="form-control">
                                </div><br>

                                <button class="btn btn-warning">Guardar</button>
                            </form>
                        </div>
                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>NoParagrafo</th>
                                    <th>NombreParagrafo</th>
                                    <th>mostrar_NombreParagrafo</th>
                                    <th>idSeccion</th>

                                </tr>
                                <?php foreach ($datos as $key) : ?>
                                    <tr>
                                        <td><?php echo $key->NoParagrafo ?></td>
                                        <td><?php echo $key->mostrar_NoParagrafo ?></td>
                                        <td><?php echo $key->NombreParagrafo ?></td>
                                        <td><?php echo $key->mostrar_NombreParagrafo ?></td>
                                        <td><?php echo $key->idSeccion ?></td>

                                        <td>
                                            <a href="<?php echo base_url() . '/Paragrafo/obtener/' . $key->idParagrafo ?>" class="btn btn-warning btn-sm">Editar</a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url() . '/Paragrafos/eliminar/' . $key->idParagrafo ?>" class="btn btn-danger btn-sm">Eliminar</a>
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
                            <span class="text text-danger">Ley: <?php echo $NombreLey ?></span><br>

                            <span class="text text-primary">Libro: <?php echo $NombreLibros ?></span><br>
                            <span class="text text-primary">Titulo: <?php echo $NombreTitulos ?></span><br>
                            <span class="text text-primary">Capitulo: <?php echo $NombreCapitulo ?></span><br>
                            <span class="text text-primary">Seccion: <?php echo $NombreSeccion ?></span>
                        </li>
                        <?php foreach ($datos as $key) : ?>
                            <li>

                                <div class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="todo3" id="todoCheck3">
                                    <label for="todoCheck3"></label>
                                </div>
                                <span class="text text-info"><a class="link-info rounded" href="<?php echo base_url() . '/Articulos/' . $key->idParagrafo ?>">Paragrafo Nº <?php echo  $key->NoParagrafo ?> : <?php echo  $key->NombreParagrafo ?></a> </span>

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