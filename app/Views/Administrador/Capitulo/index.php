<?php
$idTitulos = $idTitu;
$NombreTitulos = $dbtitu[0]['NombreTitulo'];
$NombreLibros = $dblib[0]['NombreLibro'];
$NombreLey = $dbley[0]['NombreLey'];
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
                        Capitulo
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
                            <form action="<?php echo base_url() . '/Capitulo/insertar' ?>" method="post">
                                <div class="row">
                                    <label for="">Nº Capitulo</label>
                                    <div class="col-sm">
                                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" id="NoCapitulo" name="NoCapitulo" class="form-control">
                                    </div>
                                    <div class="col-sm form-check">
                                        <input class="form-check-input" type="checkbox" name="mostrar_NoCapitulo" id="mostrar_NoCapitulo">
                                        <label class="form-check-label">
                                            Mostrar numero de capitulo
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="">Nombre Capitulo</label>
                                    <div class="col-sm">
                                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="NombreCapitulo" class="form-control">
                                    </div>
                                    <div class="col-sm form-check">
                                        <input class="form-check-input" type="checkbox" name="mostrar_NombreCapitulo" id="mostrar_NombreCapitulo">
                                        <label class="form-check-label">
                                            Mostrar nombre de capitulo
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group text-left" hidden>
                                    <label for="">Id Titulo</label>
                                    <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="idTitulo" value="<?php echo $idTitulos ?>" class="form-control">
                                    <span asp-validation-for="dni" class="text-danger"></span>
                                </div>
                                <br>
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
                                        <th scope="col">Nº Capitulo</th>
                                        <th scope="col">NombreCapitulo</th>
                                        <th scope="col">idTitulo</th>
                                        <th scope="col">Editar</th>
                                        <th scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($datos as $key) : ?>
                                        <tr>
                                            <th scope="row"><?php echo  $key->idCapitulo ?></th>
                                            <th scope="row"><?php echo  $key->NoCapitulo ?></th>
                                            <td><?php echo  $key->NombreCapitulo ?></td>
                                            <td><?php echo $key->idTitulo ?></td>

                                            <td><a href="<?php echo base_url() . '/Capitulo/editar/' . $key->idCapitulo ?>" class="btn btn-info btn-sm">editar</a></td>
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
                            <span class="text text-primary">Titulo: <?php echo $NombreTitulos ?></span>
                        </li>
                        <?php foreach ($datos as $key) : ?>
                            <li>

                                <div class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="todo3" id="todoCheck3">
                                    <label for="todoCheck3"></label>
                                </div>
                                <span class="text text-info"><a class="link-info rounded" href="<?php echo base_url() . '/Seccion/' . $key->idCapitulo ?>">Capitulo Nº <?php echo  $key->NoCapitulo ?> : <?php echo  $key->NombreCapitulo ?></a> </span>

                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>
        </section>
    </div>
</section>
<?= $this->endSection() ?>