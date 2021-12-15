<?php
 $idAgrupamiento = $datos[0]['idAgrupamiento'];
 $NombreAgrupamiento = $datos[0]['NombreAgrupamiento'];
 $DescripcionAgrupamiento = $datos[0]['DescripcionAgrupamiento'];
 $TipoAgrup = $datos[0]['TipoAgrup'];
 $Precio = $datos[0]['Precio']; 
 $Imagen = $datos[0]['Imagen']; 
?>

<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>

<section class="col-lg-7 connectedSortable">
    <div class="card">
                <div class="card-header  bg-primary">
                    <h3 class="card-title text-white">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Agrupamientos
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
                    <div class="chart tab-pane active" id="revenue-chart"
                        style="position: relative; height: 300px;">
                        <form action="<?php echo base_url().'/Agrupamiento/actualizar'?>" method="post">
                            <div class="form-group text-left">
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="idAgrupamiento"  value="<?php echo $idAgrupamiento ?>" class="form-control" hidden="" > 
                            </div>
                            <div class="form-group text-left">
                                <label for="NombreAgrupamiento" >Nombre de Agrupamiento</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="NombreAgrupamiento"  value="<?php echo $NombreAgrupamiento ?>" class="form-control"> 
                            </div>
                            <div class="form-group text-left">
                                <label for="DescripcionAgrupamiento" >Descripcion de Agrupamiento</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="DescripcionAgrupamiento"  value="<?php echo $DescripcionAgrupamiento ?>" class="form-control"> 
                            </div>
                            <div class="form-group text-left">
                                <label for="TipoAgrup">Tipo de Agrupamiento</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="TipoAgrup" value="<?php echo $TipoAgrup ?>" class="form-control"> 
                            </div>
                            <div class="form-group text-left">
                                <label for="Precio">Precio</label>
                                <input  style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" step="0.01" name="Precio" value="<?php echo $Precio ?>" class="form-control"> 
                            </div>
                            <div class="form-group text-left">
                                <label for="Imagen">Imagen</label>
                                <input  style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="Imagen" value="<?php echo $Imagen ?>" class="form-control"> 
                            </div>
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
<?= $this->endSection()?>