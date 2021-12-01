<?php 
    $idJurisprudencia = $datos[0]['idJurisprudencia'];
    $ContenidoJurisprudencia = $datos[0]['ContenidoJurisprudencia'];
    $ResumenJurisprudencia = $datos[0]['ResumenJurisprudencia'];
    $Borrado = $datos[0]['Borrado']; 
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
                    <form method="POST" action="<?php echo base_url().'/Juriprudencias/actualizar' ?>">
                        <div>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none "
                                type="number" hidden="" name="idJurisprudencia" id="idJurisprudencia" class="form-control"
                                value="<?php echo $idJurisprudencia ?>">
                        </div><br>
                        <div>
                            <label for="ContenidoJurisprudencia">Contenido de Juriprudencia</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none "
                                type="text" name="ContenidoJurisprudencia" id="ContenidoJurisprudencia" class="form-control"
                                value="<?php echo $ContenidoJurisprudencia ?>">
                        </div><br>
                        <div>
                            <label for="ResumenJurisprudencia">Resumen de Juriprudencia</label>
                            <textarea name="ResumenJurisprudencia" id="ckeditor" cols="30" rows="10" class="ckeditor">
                            <?php echo $ResumenJurisprudencia ?>
                        </textarea>
                        </div><br>
                        <div>
                            <label for="idLey">Ley ID</label>
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