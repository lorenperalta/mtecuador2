<?php
$idLibro = $datos[0]['idLibro'];
$NoLibro = $datos[0]['NoLibro'];
$mostrar_NoLibro = $datos[0]['mostrar_NoLibro'];
$NombreLibro = $datos[0]['NombreLibro'];
$mostrar_NombreLibro = $datos[0]['mostrar_NombreLibro'];
$idLey = $datos[0]['idLey'];
$idUsuarioCreo = $datos[0]['idUsuarioCreo'];
$idUsuarioMod = $datos[0]['idUsuarioMod'];

?>

<?= $this->extend('Layout/Layout') ?>
<?= $this->section('contenido') ?>

<section class="col-lg-7 connectedSortable">
    <div class="card">
        <div class="card-header  bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-chart-pie mr-1"></i>
                Libros
            </h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark active text-white" href="#revenue-chart" data-toggle="tab">Ingresar</a>
                    </li>

                </ul>
            </div>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                    <form action="<?php echo base_url() . '/Libros/actualizar' ?>" method="post">
                        <div class="form-group text-left">
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="id" name="idLibro" value="<?php echo $idLibro ?>" class="form-control" hidden="">
                        </div>
                        <div class="form-group text-left">
                            <label for="">nº Libro</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="NoLibro" name="NoLibro" value="<?php echo $NoLibro ?>" class="form-control">
                        </div>
                        <div class="form-group text-left">
                            <label for="">mostrar NoLibro</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="mostrar_NoLibro" value="<?php echo $mostrar_NoLibro ?>" class="form-control">

                        </div>
                        <div class="form-group text-left">
                            <label for="">Nombre Libro</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="NombreLibro" value="<?php echo $NombreLibro ?>" class="form-control">
                            <span asp-validation-for="dni" class="text-danger"></span>

                        </div>
                        <div class="form-group text-left">
                            <label for="">mostrar NombreLibro</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="mostrar_NombreLibro" value="<?php echo $mostrar_NombreLibro ?>" class="form-control">

                        </div>
                        <div class="form-group text-left">
                            <label for="">id Ley</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="idLey" value="<?php echo $idLey ?>" class="form-control">

                        </div>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-warning">Enviar</button>
                        </div>
                    </form>
                </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">

                </div>
            </div>
        </div><!-- /.card-body -->
    </div>
</section>
<?= $this->endSection() ?>