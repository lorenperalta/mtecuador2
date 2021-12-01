<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>

<div class="container">

  <div class="row">
    <div class="col">
        <h2>Titulos</h2><br>
        <div class="col">
            <form method="POST" action="<?php echo base_url().'/Organismo/crear' ?>">
                <div>
                    <label for="NombreOrganismo">NombreOrganismo</label>
                    <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="number" name="NombreOrganismo" id="NombreOrganismo" class="form-control">
                </div><br>
                <div>
                    <label for="DescripcionOrganismo">DescripcionOrganismo</label>
                    <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="DescripcionOrganismo" id="DescripcionOrganismo" class="form-control">
                </div><br>
                <div>
                    <label for="AbrevOrganismo">AbrevOrganismo</label>
                    <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="AbrevOrganismo" id="AbrevOrganismo" class="form-control">
                </div><br>
                <div>
                    <label for="Borrado">Borrado</label>
                    <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="Borrado" id="Borrado" class="form-control">
                </div><br>

                <button class="btn btn-warning">Guardar</button>
            </form>
        </div>
    </div>

    <div class="col">
        <h2>Listado de titulos</h2><br>
        <div class="col">
            <div class="table table-responsive">
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>NombreOrganismo</th>
                        <th>DescripcionOrganismo</th>
                        <th>AbrevOrganismo</th>
                        <th>Borrado</th>
      
                    </tr>
                    <?php foreach($datos as $key): ?>
                            <tr>
                                <td><?php echo $key->NombreOrganismo ?></td>
                                <td><?php echo $key->DescripcionOrganismo ?></td>
                                <td><?php echo $key->AbrevOrganismo ?></td>
                                <td><?php echo $key->Borrado ?></td>
                                
                                <td>
                                    <a href="<?php echo base_url().'/Organismo/obtenerTitulos/'.$key->idOrganismo ?>" class="btn btn-warning btn-sm">Editar</a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'/Organismo/eliminar/'.$key->idOrganismo ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

  </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';

        if (mensaje == '1') {
            swal(':D','Agregado con exito!','success');
        } else if (mensaje == '0'){
            swal(':(','Fallo al agregar!','error');
        } else if (mensaje == '2'){
            swal(':D','Actualizado con exito!','success');
        } else if (mensaje == '3'){
            swal(':(','Fallo al Actualizar!','error');
        } else if (mensaje == '4'){
            swal(':D','Eliminado con exito!','success');
        } else if (mensaje == '5'){
            swal(':(','Fallo al eliminar!','error');
        }
    </script>
<?= $this->endSection()?>