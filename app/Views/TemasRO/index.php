<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>

<section class="col-lg-7 connectedSortable">
    <div class="card">
        <div class="card-header  bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-chart-pie mr-1"></i>
                Temas RO
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
                <form method="POST" action="<?php echo base_url().'/TemasRO/crear' ?>">
                    <div class="col">
                        <div>
                            <label for="idRO">RO ID</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="number" name="idRO" id="idRO" class="form-control">
                        </div>
                        <div>
                            <label for="NoTema">Numero del Tema</label>
                            <div>
                                <textarea name="NoTema" id="" cols="30" rows="0" class=""> </textarea>
                            </div>
                        </div>
                        <div>
                            <label for="idFuncion">Funcion ID</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="idFuncion" id="idFuncion" class="form-control">
                        </div>
                        <div>
                            <label for="idOrganismo">Organismo ID</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="idOrganismo" id="idOrganismo" class="form-control">
                        </div>
                        <div>
                            <label for="idCategoria">Categoria ID</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="idCategoria" id="idCategoria" class="form-control">
                        </div><br>
                        <div>
                            <label for="DetalleTema">Detalle del Tema</label>
                            <div>
                                <textarea name="DetalleTema" id="" cols="90" rows="10" class=""> </textarea>
                            </div>
                        </div><br>
                        <button class="btn btn-warning">Guardar</button>
                    </div>
                </form>
                </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>idRO</th>
                        <th>NoTema</th>
                        <th>idFuncion</th>
                        <th>idOrganismo</th>
                        <th>idCategoria</th>
                        <th>DetalleTema</th>
                    </tr>
                    <?php foreach($datos as $key): ?>
                            <tr>
                                <td><?php echo $key->idRO ?></td>
                                <td><?php echo $key->NoTema ?></td>
                                <td><?php echo $key->idFuncion ?></td>
                                <td><?php echo $key->idOrganismo?></td>
                                <td><?php echo $key->idCategoria ?></td>
                                <td><?php echo $key->DetalleTema ?></td>
                                <td>
                                    <a href="<?php echo base_url().'/TemasRO/obtener/'.$key->idTema ?>" class="btn btn-warning btn-sm">Editar</a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'/TemasRO/eliminar/'.$key->idTema ?>" class="btn btn-danger btn-sm">Eliminar</a>
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