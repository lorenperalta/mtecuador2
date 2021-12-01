<?php
 $id = $datos[0]['id'];
 $Nombre = $datos[0]['Nombre'];
 $Apellidos = $datos[0]['Apellidos'];
 $Direccion = $datos[0]['Direccion']; 
 $Usuario = $datos[0]['Usuario']; 
 $Password = $datos[0]['Password'];
 $Roll = $datos[0]['Roll'];
 
?>

<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>


<section class="col-lg-7 connectedSortable">
    <div class="card">
                <div class="card-header  bg-primary">
                    <h3 class="card-title text-white">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Usuario Editar
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
                        <form action="<?php echo base_url().'/Usuario/actualizar'?>" method="post">
    <div class="form-group text-left">
           <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="id" name="id"  value="<?php echo $id ?>" class="form-control" hidden="" > 
        </div>
        <div class="form-group text-left">
            <label for="Nombre" >Nombre</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="Nombre" name="Nombre"  value="<?php echo $Nombre ?>" class="form-control"> 
        </div>
        <div class="form-group text-left">
            <label for="Apellidos">Apellidos</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="Apellidos" value="<?php echo $Apellidos ?>" class="form-control"> 
            
        </div>
        <div class="form-group text-left">
            <label for="Direccion">Direccion</label>
            <input  style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="Direccion" value="<?php echo $Direccion ?>" class="form-control"> 
            <span asp-validation-for="dni" class="text-danger"></span>

        </div>
        <div class="form-group text-left">
            <label for="Usuario">Usuario</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="Usuario" value="<?php echo $Usuario ?>" class="form-control"> 
            
        </div>
        <div class="form-group text-left">
            <label for="Password">Contraseña</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="Password" name="Password" value="<?php echo $Password ?>" class="form-control"> 
            
        </div>
        <div class="form-group text-left">
            <label for-="Roll">Rol</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="Roll" value="<?php echo $Roll ?>" class="form-control"> 
            
        </div><br>
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