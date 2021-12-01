<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>

<section class="col-lg-7 connectedSortable">
    <div class="card">
        <div class="card-header  bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-chart-pie mr-1"></i>
                Tipo Documento
            </h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark active text-white" href="#revenue-chart" data-toggle="tab">Ingresar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark text-white" href="#sales-chart" data-toggle="tab">Listar</a>
                    </li>
                </ul>
            </div>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                <form method="POST" action="<?php echo base_url().'/TipoDocumento/crear' ?>">
                    <div>
                        <label for="NombreDoc">NombreDoc</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="NombreDoc" id="NombreDoc" class="form-control">
                    </div><br>
                    <div>
                        <label for="Descripcion">Descripcion</label>
                        <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="Descripcion" id="Descripcion" class="form-control">
                    </div><br>

                    <button class="btn btn-warning">Guardar</button>
                </form>
                </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>NombreDoc</th>
                        <th>Descripcion</th>
      
                    </tr>
                    <?php foreach($datos as $key): ?>
                            <tr>
                                <td><?php echo $key->NombreDoc ?></td>
                                <td><?php echo $key->Descripcion ?></td>
                                
                                <td>
                                    <a href="<?php echo base_url().'/TipoDocumento/obtener/'.$key->idTipoDoc ?>" class="btn btn-warning btn-sm">Editar</a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'/TipoDocumento/eliminar/'.$key->idTipoDoc ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                </table>
                </div>
            </div>
        </div><!-- /.card-body -->
    </div>
</section>

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