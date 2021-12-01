<?php 
    $idDisposicion = $datos[0]['idDisposicion'];
    $NoDisposicion = $datos[0]['NoDisposicion'];
    $ContenidoDisposicion = $datos[0]['ContenidoDisposicion'];
    $idLey = $datos[0]['idLey'];
    $idTipoDisposicion = $datos[0]['idTipoDisposicion'];
    $Activo = $datos[0]['Activo']; 
    $Borrado = $datos[0]['Borrado']; 
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
                    Disposicion Editar
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
                        <form method="POST" action="<?php echo base_url().'/Disposicion/actualizar' ?>">
                            <div>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="text" hidden="" name="idDisposicion" id="idDisposicion" class="form-control" value="<?php echo $idDisposicion ?>">
                            </div><br>
                            <div class="row ">
                                <div class="col-5">
                                    <label for="NoDisposicion">Numero de Disposicion</label>
                                    <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="text" name="NoDisposicion" id="NoDisposicion" class="form-control" value="<?php echo $NoDisposicion ?>">
                                </div>
                                <div class="col-5">
                                    <label for="idTipoDisposicion">Tipo de Disposicion</label>
                                    <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="idTipoDisposicion" id="idTipoDisposicion" class="form-control" value="<?php echo $idTipoDisposicion ?>">
                                </div>
                            </div><br>
                            <div>
                                <label for="ContenidoDisposicion">Contenido de Disposicion</label>
                                <textarea  name="ContenidoDisposicion" id="ckeditor" cols="30" rows="10" class="ckeditor" >
                                    <?php echo $ContenidoDisposicion ?>
                                </textarea>
                            </div><br>
                            <div class="form-group text-left">
                                <label for="idLey">idLey</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="idLey" id="idLey" class="form-control" value="<?php echo $idLey ?>">
                            </div><br>
                            <button class="btn btn-warning">Guardar</button>
                        </form>
                    </div>
                    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                   
                    </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
</section>
<?= $this->endSection()?>