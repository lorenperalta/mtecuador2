<?php 
    $idParagrafo = $datos[0]['idParagrafo'];
    $NoParagrafo = $datos[0]['NoParagrafo'];
    $mostrar_NoParagrafo = $datos[0]['mostrar_NoParagrafo'];
    $NombreParagrafo = $datos[0]['NombreParagrafo'];
    $mostrar_NombreParagrafo = $datos[0]['mostrar_NombreParagrafo']; 
    $idSeccion = $datos[0]['idSeccion']; 
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
                Editar Paragrafos
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
                <form method="POST" action="<?php echo base_url().'/Paragrafos/actualizar' ?>">
                    <div>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none " type="number" hidden="" name="idParagrafo" id="idParagrafo" class="form-control" value="<?php echo $idParagrafo ?>">
                    </div><br>
                    <div>
                        <label for="NoParagrafo">NoParagrafo</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none " type="number" name="NoParagrafo" id="NoParagrafo" class="form-control" value="<?php echo $NoParagrafo ?>">
                    </div><br>
                    <div>
                        <label for="NombreParagrafo">NombreParagrafo</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="NombreParagrafo" id="NombreParagrafo" class="form-control" value="<?php echo $NombreParagrafo ?>">
                    </div><br>
                    <div>
                        <label for="idSeccion">idSeccion</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="idSeccion" id="idSeccion" class="form-control" value="<?php echo $idSeccion ?>">
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