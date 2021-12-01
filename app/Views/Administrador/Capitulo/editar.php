<?php
$idCapitulo = $datos[0]['idCapitulo'];
$NoCapitulo = $datos[0]['NoCapitulo'];
$mostrar_NoCapitulo = $datos[0]['mostrar_NoCapitulo'];
$NombreCapitulo = $datos[0]['NombreCapitulo'];
$mostrar_NombreCapitulo = $datos[0]['mostrar_NombreCapitulo'];
$idTitulo = $datos[0]['idTitulo'];
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
                Capitulo Editar
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
                    <form action="<?php echo base_url() . '/Capitulo/actualizar' ?>" method="post">
                        <div class="form-group text-left">
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="id" name="idCapitulo" value="<?php echo $idCapitulo ?>" class="form-control" hidden="">
                        </div>
                        <div class="form-group text-left">
                            <label for="">nº Capitulo</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="NoCapitulo" name="NoCapitulo" value="<?php echo $NoCapitulo ?>" class="form-control">
                        </div>
                        <div class="form-group text-left">
                            <label for="">mostrar NoCapitulo</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="mostrar_NoCapitulo" value="<?php echo $mostrar_NoCapitulo ?>" class="form-control">

                        </div>
                        <div class="form-group text-left">
                            <label for="">Nombre Capitulo</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="NombreCapitulo" value="<?php echo $NombreCapitulo ?>" class="form-control">
                            <span asp-validation-for="dni" class="text-danger"></span>

                        </div>
                        <div class="form-group text-left">
                            <label for="">mostrar NombreCapitulo</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="mostrar_NombreCapitulo" value="<?php echo $mostrar_NombreCapitulo ?>" class="form-control">

                        </div>
                        <div class="form-group text-left">
                            <label for="">id Titulo</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="idTitulo" value="<?php echo $idTitulo ?>" class="form-control">

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