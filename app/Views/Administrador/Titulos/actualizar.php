<?php 
    $idTitulo = $datos[0]['idTitulo'];
    $NoTitulo = $datos[0]['NoTitulo'];
    $mostrar_NoTitulo = $datos[0]['mostrar_NoTitulo'];
    $NombreTitulo = $datos[0]['NombreTitulo'];
    $mostrar_NombreTitulo = $datos[0]['mostrar_NombreTitulo']; 
    $idLibro = $datos[0]['idLibro']; 
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
                    Titulo Editar
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
                        <form method="POST" action="<?php echo base_url().'/Titulos/actualizar' ?>">
                    <div>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none " type="number" hidden="" name="idTitulo" id="idTitulo" class="form-control" value="<?php echo $idTitulo ?>">
                    </div><br>
                    <div>
                        <label for="NoTitulo">NoTitulo</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none " type="number" name="NoTitulo" id="NoTitulo" class="form-control" value="<?php echo $NoTitulo ?>">
                    </div><br>
                    <div>
                        <label for="mostrar_NoTitulo">mostrar_NoTitulo</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="mostrar_NoTitulo" id="mostrar_NoTitulo" class="form-control" value="<?php echo $mostrar_NoTitulo ?>">
                    </div><br>
                    <div>
                        <label for="NombreTitulo">NombreTitulo</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="NombreTitulo" id="NombreTitulo" class="form-control" value="<?php echo $NombreTitulo ?>">
                    </div><br>
                    <div>
                        <label for="mostrar_NombreTitulo">mostrar_NombreTitulo</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="mostrar_NombreTitulo" id="mostrar_NombreTitulo" class="form-control" value="<?php echo $mostrar_NombreTitulo ?>">
                    </div><br>
                    <div>
                        <label for="idLibro">idLibro</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="idLibro" id="idLibro" class="form-control" value="<?php echo $idLibro ?>">
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