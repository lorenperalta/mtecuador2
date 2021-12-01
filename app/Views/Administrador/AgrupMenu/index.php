<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>

<div class="container">
    <h1 class="display-4">Formulario Agrupamar Menu</h1><br>
    <div class="row">
    <div class="col-md-4">
    <form action="<?php echo base_url().'/AgrupMenu/insertar'?>" method="post">
        <div class="form-group text-left">
            <label for="NombreAgrupMenu" >Nombre Agrup Menu</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="NombreAgrupMenu" name="NombreAgrupMenu" class="form-control"> 
        </div><br>
        <div class="form-group text-left">
            <label for="Descripción">Descripción</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="Descripcion" class="form-control"> 
            
        </div>
        <br>
        <div class="form-group">
            <button class="btn btn-warning">Enviar</button>
        </div>
    </form>
    </div>
    
    <div class="col-md-8">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre Agrup Menu</th>
                <th scope="col">Descripción</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($datos as $key): ?>
                <tr>
                <th scope="row"><?php echo  $key->idAgrupMenu?></th>
                <td><?php echo  $key->NombreAgrupMenu?></td>
                <td><?php echo $key->Descripcion?></td>
               
                <td><a href="<?php echo base_url().'/AgrupMenu/editar/'.$key->idAgrupMenu?>" class="btn btn-info btn-sm">editar</a></td>
                <td><a href="<?php echo base_url().'/eliminar'?>" class="btn btn-danger btn-sm">eliminar</a></td>
                </tr>
            <?php endforeach; ?>
                
            </tbody>
        </table>
    </div>
</div>
</div>
<?= $this->endSection()?>