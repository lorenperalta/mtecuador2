<?php 
    $idTema = $datos[0]['idTema'];
    $idRO = $datos[0]['idRO'];
    $NoTema = $datos[0]['NoTema'];
    $idFuncion = $datos[0]['idFuncion'];
    $idOrganismo = $datos[0]['idOrganismo'];
    $idCategoria = $datos[0]['idCategoria']; 
    $DetalleTema = $datos[0]['DetalleTema']; 
 ?>

<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>


<section class="col-lg-7 connectedSortable">
    <div class="card">
        <div class="card-header  bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-chart-pie mr-1"></i>
                Editar Temas RO
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
                    <form method="POST" action="<?php echo base_url().'/TemasRO/actualizar' ?>">
                    <div>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="number" hidden="" name="idTema" id="idTema" class="form-control" value="<?php echo $idTema ?>">
                    </div><br>
                    <div>
                        <label for="idRO">idRO</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="number" name="idRO" id="idRO" class="form-control" value="<?php echo $idRO ?>">
                    </div><br>
                    <div>
                        <label for="NoTema">Numero del Tema</label>
                        <div>
                            <textarea name="NoTema" id="" cols="30" rows="0" class=""><?php echo $NoTema ?> </textarea>
                        </div>
                    <div>
                        <label for="idFuncion">idFuncion</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="idFuncion" id="idFuncion" class="form-control" value="<?php echo $idFuncion ?>">
                    </div><br>
                    <div>
                        <label for="idOrganismo">idOrganismo</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="idOrganismo" id="idOrganismo" class="form-control" value="<?php echo $idOrganismo ?>">
                    </div><br>
                    <div>
                        <label for="idCategoria">idCategoria</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="idCategoria" id="idCategoria" class="form-control" value="<?php echo $idCategoria ?>">
                    </div><br>
                    <div>
                        <label for="DetalleTema">Detalle del Tema</label>
                        <div>
                            <textarea name="DetalleTema" id="" cols="90" rows="10" class=""><?php echo $DetalleTema ?> </textarea>
                        </div>
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