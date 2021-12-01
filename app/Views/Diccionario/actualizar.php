<?php
$idpalabra = $datos[0]['idpalabra'];
$palabra = $datos[0]['palabra'];
$significado = $datos[0]['significado'];
?>

<?= $this->extend('Layout/Layout') ?>
<?= $this->section('contenido') ?>

<section class="col-lg-7 connectedSortable">
    <div class="card">
        <div class="card-header  bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-chart-pie mr-1"></i>
                Editar
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
                    <form method="POST" action="<?php echo base_url() . '/Diccionario/actualizar' ?>">
                        <div class="row">
                            <div class="col">
                                <div>
                                    <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none " type="text" hidden="" name="idpalabra" id="idpalabra" class="form-control" value="<?php echo $idpalabra ?>">
                                </div>
                                <div>
                                    <label for="palabra">Palabra</label>
                                    <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none " type="text" name="palabra" id="palabra" class="form-control" value="<?php echo $palabra ?>">
                                </div>
                                <div>
                                    <label for="significado">Significado</label>
                                    <div class="form-group text-left">
                                        <textarea name="significado" id="ckeditor" class="ckeditor" value=""><?php echo $significado ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <button class="btn btn-warning">Actualizar</button>
                    </form>
                </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">

                </div>
            </div>
        </div><!-- /.card-body -->
    </div>
</section>
<?= $this->endSection() ?>