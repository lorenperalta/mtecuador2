<?php 
    $idOrganismo = $datos[0]['idOrganismo'];
    $NombreOrganismo = $datos[0]['NombreOrganismo'];
    $DescripcionOrganismo = $datos[0]['DescripcionOrganismo'];
    $AbrevOrganismo = $datos[0]['AbrevOrganismo'];
    $Borrado = $datos[0]['Borrado']; 
    $idUsuarioCreo = $datos[0]['idUsuarioCreo']; 
    $idUsuarioMod = $datos[0]['idUsuarioMod']; 
 ?>

<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="col-sm">
                <h2>Actualizar Titulos</h2><br>
                <form method="POST" action="<?php echo base_url().'/Organismo/actualizar' ?>">
                    <div>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none " type="number" hidden="" name="idOrganismo" id="idOrganismo" class="form-control" value="<?php echo $idOrganismo ?>">
                    </div><br>
                    <div>
                        <label for="NombreOrganismo">NombreOrganismo</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none " type="number" name="NombreOrganismo" id="NombreOrganismo" class="form-control" value="<?php echo $NombreOrganismo ?>">
                    </div><br>
                    <div>
                        <label for="DescripcionOrganismo">DescripcionOrganismo</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="DescripcionOrganismo" id="DescripcionOrganismo" class="form-control" value="<?php echo $DescripcionOrganismo ?>">
                    </div><br>
                    <div>
                        <label for="AbrevOrganismo">AbrevOrganismo</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="AbrevOrganismo" id="AbrevOrganismo" class="form-control" value="<?php echo $AbrevOrganismo ?>">
                    </div><br>
                    <div>
                        <label for="Borrado">Borrado</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="Borrado" id="Borrado" class="form-control" value="<?php echo $Borrado ?>">
                    </div><br>
                    
                    <button class="btn btn-warning">Actualizar</button>
                </form>
            </div>
        </div>
        <div class="col">
    
        </div>
        <div class="col">
    
        </div>
    </div>
</div><!-- /.container -->

<?= $this->endSection()?>