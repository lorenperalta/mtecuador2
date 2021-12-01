<?php 
    $idReformatoria = $datos[0]['idReformatoria'];
    $NoReformatoria = $datos[0]['NoReformatoria'];
    $ResumenReformatoria = $datos[0]['ResumenReformatoria'];
    $idRO = $datos[0]['idRO']; 
    $idLey = $datos[0]['idLey']; 
    $idUsuarioCreo = $datos[0]['idUsuarioCreo']; 
    $idUsuarioMod = $datos[0]['idUsuarioMod']; 
 ?>

<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>

<!-- /.container -->
<section class="col-lg-7 connectedSortable">
    <div class="card">
        <div class="card-header  bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-chart-pie mr-1"></i>
                Editar Reformatorias
            </h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark active text-white" href="#revenue-chart"
                            data-toggle="tab">Ingresar</a>
                    </li>

                </ul>
            </div>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                    <form method="POST" action="<?php echo base_url().'/Reformatorias/actualizar' ?>">
                        <div>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none "
                                type="number" hidden="" name="idReformatoria" id="idReformatoria" class="form-control"
                                value="<?php echo $idReformatoria ?>">
                        </div><br>
                        <div>
                            <label for="NoReformatoria">NoReformatoria</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none "
                                type="number" name="NoReformatoria" id="NoReformatoria" class="form-control"
                                value="<?php echo $NoReformatoria ?>">
                        </div><br>
                        <div>
                            <label for="ResumenReformatoria">Resumen de Reformatoria</label>
                            <textarea name="ResumenReformatoria" id="ckeditor" cols="30" rows="10" class="ckeditor">
                            <?php echo $ResumenReformatoria ?>
                        </textarea>
                        </div><br>
                        <div>
                            <label for="idRO">idRO</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;"
                                type="number" name="idRO" id="idRO" class="form-control" value="<?php echo $idRO ?>">
                        </div><br>
                        <div>
                            <label for="idLey">idLey</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;"
                                type="number" name="idLey" id="idLey" class="form-control" value="<?php echo $idLey ?>">
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
<?= $this->endSection()?>