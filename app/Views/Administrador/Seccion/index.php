<?php

$idCapitulo = $idcap;
$NombreTitulos = $dbtitu[0]['NombreTitulo'];
$NombreLibros = $dblib[0]['NombreLibro'];
$NombreLey = $dbley[0]['NombreLey'];
$NombreCapitulo = $dbCapi[0]['NombreCapitulo'];
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
                        Seccion
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
                            <form action="<?php echo base_url() . '/Seccion/insertar' ?>" method="post">
                                <div class="row">
                                    <label for="">Nº Seccion</label>
                                    <div class="col-sm">
                                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" id="NoSeccion" name="NoSeccion" class="form-control">
                                    </div>
                                    <div class="col-sm form-check">
                                        <input class="form-check-input" type="checkbox" name="mostrar_NoSeccion" id="mostrar_NoSeccion">
                                        <label class="form-check-label">
                                            Mostrar numero de seccion
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="">Nombre Seccion</label>
                                    <div class="col-sm">
                                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="NombreSeccion" name="NombreSeccion" class="form-control">
                                    </div>
                                    <div class="col-sm form-check">
                                        <input class="form-check-input" type="checkbox" name="mostrar_NombreSeccion" id="mostrar_NombreSeccion">
                                        <label class="form-check-label">
                                            Mostrar nombre de seccion
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group text-left" hidden>
                                    <label for="">Id Capitulo</label>
                                    <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="idCapitulo" value="<?php echo $idCapitulo ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-warning">Enviar</button>
                                </div>
                            </form>
                        </div>
                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nº Seccion</th>
                                        <th scope="col">NombreSeccion</th>
                                        <th scope="col">idCapitulo</th>
                                        <th scope="col">Editar</th>
                                        <th scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($datos as $key) : ?>
                                        <tr>
                                            <th scope="row"><?php echo  $key->idSeccion ?></th>
                                            <th scope="row"><?php echo  $key->NoSeccion ?></th>
                                            <td><?php echo  $key->NombreSeccion ?></td>
                                            <td><?php echo $key->idCapitulo ?></td>

                                            <td><a href="<?php echo base_url() . '/Seccion/editar/' . $key->idSeccion ?>" class="btn btn-info btn-sm">editar</a></td>
                                            <td><a href="<?php echo base_url() . '/eliminar' ?>" class="btn btn-danger btn-sm">eliminar</a></td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
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
                            <span class="text text-primary">Capitulo: <?php echo $NombreCapitulo ?></span>
                        </li>
                        <?php foreach ($datos as $key) : ?>
                            <li>

                                <div class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="todo3" id="todoCheck3">
                                    <label for="todoCheck3"></label>
                                </div>
                                <span class="text text-info"><a class="link-info rounded" href="<?php echo base_url() . '/Paragrafos/' . $key->idSeccion ?>">Seccion Nº <?php echo  $key->NoSeccion ?> : <?php echo  $key->NombreSeccion ?></a> </span>

                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>
        </section>
    </div>
</section>
<?= $this->endSection() ?>