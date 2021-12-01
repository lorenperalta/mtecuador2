<?php
 $idFuncion = $datos[0]['idFuncion'];
 $NombreFuncion = $datos[0]['NombreFuncion'];
 $DescripcionFuncion = $datos[0]['DescripcionFuncion']; 
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
                    Funciones Editar
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
                        <form action="<?php echo base_url().'/Funcion/actualizar'?>" method="post">

    <div class="form-group text-left">
           <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="id" name="idFuncion"  value="<?php echo $idFuncion ?>" class="form-control" hidden="" > 
        </div>
        
        <div class="form-group text-left">
            <label for="NombreFuncion">Nombre Funcion</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="NombreFuncion" value="<?php echo $NombreFuncion ?>" class="form-control"> 
            
        </div>
        <div class="form-group text-left">
            <label for="DescripcionFuncion">mostrar NombreFuncion</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="DescripcionFuncion" value="<?php echo $DescripcionFuncion ?>" class="form-control"> 
            
        </div>
        <div class="form-group text-left">
            <label for="Borrado">id Borrado</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="Borrado" value="<?php echo $Borrado ?>" class="form-control"> 
            
        </div>
        <br>
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