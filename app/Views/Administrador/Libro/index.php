<?php $ley  = $idLeye; ?>

<?php
$NombreLey  = $dbLeyes[0]['NombreLey']; ?>

<?= $this->extend('Layout/Layout') ?>
<?= $this->section('contenido') ?>
<section class="content">
    <div class="row">

        <section class="col-lg-7 connectedSortable">
            <div class="card">
                <div class="card-header  bg-primary">
                    <h3 class="card-title text-white">
                        <i class="fas fa-chart-pie mr-1"></i>

                        <?php echo $NombreLey ?>
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="nav-link btn btn-sm btn-dark active text-white" href="#revenue-chart" data-toggle="tab">Ingresar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-sm btn-dark text-white" href="#sales-chart" data-toggle="tab">Listar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-sm btn-dark text-white" href="#sales-chart" data-toggle="tab">Buscar</a>
                            </li>
                        </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                            <form action="<?php echo base_url() . '/Libros/insertar' ?>" method="post">
                                <div class="row">
                                    <label for="">Nº Libro</label>
                                    <div class="col-sm">
                                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="NoLibro" name="NoLibro" class="form-control">
                                    </div>
                                    <div class="col-sm form-check">
                                        <input class="form-check-input" type="checkbox" name="mostrar_NoLibro" id="mostrar_NoLibro">
                                        <label class="form-check-label">
                                            Mostrar numero de Libro
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="">Nombre Libro</label>
                                    <div class="col-sm">
                                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="NombreLibro" class="form-control">

                                    </div>
                                    <div class="col-sm form-check">
                                        <input class="form-check-input" type="checkbox" name="mostrar_NombreLibro" id="mostrar_NombreLibro">
                                        <label class="form-check-label">
                                            Mostrar numero de Libro
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group text-left">
                                    <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" name="idLey" type="text" value="<?php echo $ley ?>" class="form-control" hidden>
                                    <span asp-validation-for="dni" class="text-danger"></span>
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
                                        <th scope="col">Nº Libro</th>
                                        <th scope="col">NombreLibro</th>
                                        <th scope="col">idLey</th>
                                        <th scope="col">Editar</th>
                                        <th scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($datos as $key) : ?>
                                        <tr>
                                            <th scope="row"><?php echo  $key->idLibro ?></th>
                                            <th scope="row"><?php echo  $key->NoLibro ?></th>
                                            <td><?php echo  $key->NombreLibro ?></td>
                                            <td><?php echo $key->idLey ?></td>

                                            <td><a href="<?php echo base_url() . '/Libros/editar/' . $key->idLibro ?>" class="btn btn-info btn-sm">editar</a></td>
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
                            <span class="text text-primary">Ley: <?php echo $NombreLey ?></span>
                        </li>
                        <?php foreach ($datos as $key) : ?>
                            <li>

                                <div class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="todo3" id="todoCheck3">
                                    <label for="todoCheck3"></label>
                                </div>
                                <span class="text text-info"><a class="link-info rounded" href="<?php echo base_url() . '/Titulos/' . $key->idLibro ?>">Libro Nº <?php echo  $key->NoLibro ?> : <?php echo  $key->NombreLibro ?></a> </span>

                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>
        </section>

    </div>
</section>
<?= $this->endSection() ?>