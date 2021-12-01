<?php
 $id = $datos[0]['id'];
 $id_usuario = $datos[0]['id_usuario'];
 $Nombre = $datos[0]['Nombre'];
 $Descripcion = $datos[0]['Descripcion'];
 $Precio = $datos[0]['Precio']; 

 
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
           <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="id" name="id"  value="<?php echo $id ?>" class="form-control" hidden="" > 
        </div>
        <div class="form-group text-left">
            <label for="Nombre" >Nombre</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="Nombre" name="Nombre"  value="<?php echo $Nombre ?>" class="form-control"> 
        </div>
        <div class="form-group text-left">
            <label for="Descripcion">Descripcion</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="Descripcion" value="<?php echo $Descripcion ?>" class="form-control"> 
            
        </div>
        <div class="form-group text-left">
            <label for="Precio">Precio</label>
            <input  style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="Precio" value="<?php echo $Precio ?>" class="form-control"> 
            

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