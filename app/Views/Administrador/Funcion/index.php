<?= $this->extend('Layout/layout')?>
<?= $this->section('contenido')?>
<section class="col-lg-7 connectedSortable">
    <div class="card">
        <div class="card-header  bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-chart-pie mr-1"></i>
                Funciones
            </h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark active text-white" href="#revenue-chart"
                            data-toggle="tab">Ingresar</a>
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
                    <form action="<?php echo base_url().'/Funcion/insertar'?>" method="post">
                        <div class="form-group text-left">
                            <label for="NombreFuncion">Nombre Funcion</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="NombreFuncion" name="NombreFuncion" class="form-control">
                        </div><br>
                        <div class="form-group text-left">
                            <label for="DescripcionFuncion">Descripcion Funcion</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="DescripcionFuncion" class="form-control">
                        </div><br>
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
                                <th scope="col">Nombre Funcion</th>
                                <th scope="col">Descripcion Funcion</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datos as $key): ?>
                            <tr>
                                <th scope="row"><?php echo  $key->idFuncion?></th>
                                <td><?php echo  $key->NombreFuncion?></td>
                                <td><?php echo $key->DescripcionFuncion?></td>

                                <td><a href="<?php echo base_url().'/Funcion/editar/'.$key->idFuncion?>"
                                        class="btn btn-info btn-sm">editar</a></td>
                                <td><a href="<?php echo base_url().'/eliminar'?>"
                                        class="btn btn-danger btn-sm">eliminar</a></td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.card-body -->
    </div>
</section>
<?= $this->endSection()?>