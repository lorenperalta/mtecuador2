<?php
 $idAgrupMenu = $datos[0]['idAgrupMenu'];
 $NombreAgrupMenu = $datos[0]['NombreAgrupMenu'];
 $Descripcion = $datos[0]['Descripcion'];

?>

<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>

<div class="container">
    <h1 class="display-4">Formulario para Agrup Menu</h1><br>
    <div class="row">
    <div class="col-md-4">
    <form action="<?php echo base_url().'/AgrupMenu/actualizar'?>" method="post">
        <div class="form-group text-left">
           <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="idAgrupMenu" name="idAgrupMenu"  value="<?php echo $idAgrupMenu ?>" class="form-control" hidden="" > 
        </div>
        <div class="form-group text-left">
            <label for="NombreAgrupMenu" >Nombre Agrup Menu</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="NombreAgrupMenu" name="NombreAgrupMenu"  value="<?php echo $NombreAgrupMenu ?>" class="form-control"> 
        </div>
        <div class="form-group text-left">
            <label for="Descripcion">Descripcion</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="Descripcion" value="<?php echo $Descripcion ?>" class="form-control"> 
            
        </div>
       
        <br>
        <div class="form-group">
            <button class="btn btn-warning">Enviar</button>
        </div>
    </form>
    </div>
    
    
</div>
</div>
<?= $this->endSection()?>