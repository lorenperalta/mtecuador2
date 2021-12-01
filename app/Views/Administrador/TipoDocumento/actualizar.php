<?php 
    $idTipoDoc = $datos[0]['idTipoDoc'];
    $NombreDoc = $datos[0]['NombreDoc']; 
    $Descripcion = $datos[0]['Descripcion']; 
 ?>

<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>

<section class="col-lg-7 connectedSortable">
    <div class="card">
        <div class="card-header  bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-chart-pie mr-1"></i>
                Editar Tipo Documento
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
                <form method="POST" action="<?php echo base_url().'/TipoDocumento/actualizar' ?>">
                    <div>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none " type="number" hidden="" name="idTipoDoc" id="idTipoDoc" class="form-control" value="<?php echo $idTipoDoc ?>">
                    </div><br>
                    <div>
                        <label for="NombreDoc">NombreDoc</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="NombreDoc" id="NombreDoc" class="form-control" value="<?php echo $NombreDoc ?>">
                    </div><br>
                    <div>
                        <label for="Descripcion">Descripcion</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="Descripcion" id="Descripcion" class="form-control" value="<?php echo $Descripcion ?>">
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