<?php
$idSeccion = $datos[0]['idSeccion'];
$NoSeccion = $datos[0]['NoSeccion'];
$mostrar_NoSeccion = $datos[0]['mostrar_NoSeccion'];
$NombreSeccion = $datos[0]['NombreSeccion'];
$mostrar_NombreSeccion = $datos[0]['mostrar_NombreSeccion'];
$idCapitulo = $datos[0]['idCapitulo'];
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
                Editar Seccion
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
                    <form action="<?php echo base_url() . '/Seccion/actualizar' ?>" method="post">
                        <div class="form-group text-left">
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="id" name="idSeccion" value="<?php echo $idSeccion ?>" class="form-control" hidden="">
                        </div>
                        <div class="form-group text-left">
                            <label for="">nº Seccion</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="NoSeccion" name="NoSeccion" value="<?php echo $NoSeccion ?>" class="form-control">
                        </div>
                        <div class="form-group text-left">
                            <label for="">mostrar NoSeccion</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="mostrar_NoSeccion" value="<?php echo $mostrar_NoSeccion ?>" class="form-control">

                        </div>
                        <div class="form-group text-left">
                            <label for="">Nombre Seccion</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="NombreSeccion" value="<?php echo $NombreSeccion ?>" class="form-control">
                            <span asp-validation-for="dni" class="text-danger"></span>

                        </div>
                        <div class="form-group text-left">
                            <label for="">mostrar NombreSeccion</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="mostrar_NombreSeccion" value="<?php echo $mostrar_NombreSeccion ?>" class="form-control">

                        </div>
                        <div class="form-group text-left">
                            <label for="">id Capitulo</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="idCapitulo" value="<?php echo $idCapitulo ?>" class="form-control">

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