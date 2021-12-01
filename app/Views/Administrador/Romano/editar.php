<?php
 $idRomano = $datos[0]['idRomano'];
 $NoRomano = $datos[0]['NoRomano'];
 $mostrar_NoRomano = $datos[0]['mostrar_NoRomano'];
 $NombreRomano = $datos[0]['NombreRomano'];
 $mostrar_NombreRomano = $datos[0]['mostrar_NombreRomano']; 
 $idParagrafo = $datos[0]['idParagrafo']; 
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
                    Romano Editar
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
                        <form action="<?php echo base_url().'/Romano/actualizar'?>" method="post">
    <div class="form-group text-left">
           <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="id" name="idRomano"  value="<?php echo $idRomano ?>" class="form-control" hidden="" > 
        </div>
        <div class="form-group text-left">
            <label for="Nombre" >nº Romano</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="NoRomano" name="NoRomano"  value="<?php echo $NoRomano ?>" class="form-control"> 
        </div>
        <div class="form-group text-left">
            <label for="Apellidos">mostrar NoRomano</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="mostrar_NoRomano" value="<?php echo $mostrar_NoRomano ?>" class="form-control"> 
            
        </div>
        <div class="form-group text-left">
            <label for="Direccion">Nombre Romano</label>
            <input  style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="NombreRomano" value="<?php echo $NombreRomano ?>" class="form-control"> 
            <span asp-validation-for="dni" class="text-danger"></span>

        </div>
        <div class="form-group text-left">
            <label for="mostrar_NombreRomano">mostrar NombreRomano</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="mostrar_NombreRomano" value="<?php echo $mostrar_NombreRomano ?>" class="form-control"> 
            
        </div>
        <div class="form-group text-left">
            <label for="PasswoidParagraford">id Paragrafo</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="idParagrafo" value="<?php echo $idParagrafo ?>" class="form-control"> 
            
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