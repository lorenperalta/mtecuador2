<?php 
    $idArticulo = $datos[0]['idArticulo'];
    $noArticulo = $datos[0]['noArticulo'];
    $ContenidoArticulo = $datos[0]['ContenidoArticulo'];
    $idParagrafo = $datos[0]['idParagrafo'];
    $idRomano = $datos[0]['idRomano']; 
    $idUsuarioCreo = $datos[0]['idUsuarioCreo']; 
    $idUsuarioMod = $datos[0]['idUsuarioMod']; 
 ?>

<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>

<section class="col-lg-7 connectedSortable">
    <div class="card">
        <div class="card-header  bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-chart-pie mr-1"></i>
                Editar Suscripcion
            </h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark active text-white" href="#revenue-chart"
                            data-toggle="tab">Ingresar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark text-white" href="#sales-chart"
                            data-toggle="tab">Listar</a>
                    </li>
                </ul>
            </div>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                    <h2>Actualizar Articulos</h2>
                    <form method="POST" action="<?php echo base_url().'/Articulos/actualizar' ?>">
                        <div>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none "
                                type="number" hidden="" name="idArticulo" id="idArticulo" class="form-control"
                                value="<?php echo $idArticulo ?>">
                        </div>
                        <div>
                            <label for="noArticulo">noArticulo</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none "
                                type="number" name="noArticulo" id="noArticulo" class="form-control"
                                value="<?php echo $noArticulo ?>">
                                 
                        </div><br>
                        <div>
                            
                                <textarea  name="ContenidoArticulo" id="ckeditor" class="ckeditor">
                                <?php echo $ContenidoArticulo ?>
                                </textarea>
                        </div><br>
                        <div>
                            <label for="idParagrafo">idParagrafo</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;"
                                type="number" name="idParagrafo" id="idParagrafo" class="form-control"
                                value="<?php echo $idParagrafo ?>">
                        </div><br>
                        <div>
                            <label for="idRomano">idRomano</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;"
                                type="number" name="idRomano" id="idRomano" class="form-control"
                                value="<?php echo $idRomano ?>">
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