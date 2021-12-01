<?php $IdLeyes = $idLeyes;
$NombreLey  = $dbLeyes[0]['NombreLey']; ?>

<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>

<section class="col-lg-8 connectedSortable">
    <div class="card">
        <div class="card-header  bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-chart-pie mr-1"></i>
                <?php echo $NombreLey ?>
            </h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark active text-white" href="#revenue-chart"
                            data-toggle="tab">Ingresar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark text-white" href="#sales-chart"
                            data-toggle="tab">Listar</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content p-0">
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                    <form method="POST" action="<?php echo base_url().'/Disposicion/crear' ?>">
                        <div>
                            <label for="NoDisposicion">Numero de Disposicion</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="number"
                                name="NoDisposicion" id="NoDisposicion" class="form-control">
                        </div><br>
                        <div>
                            <label for="ContenidoDisposicion">Contenido de Disposicion</label>
                            <textarea name="ContenidoDisposicion" id="ckeditor" cols="30" rows="10"
                                class="ckeditor"> </textarea>
                        </div><br>
                        <div>
                            <label for="idRO">RO id</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="number"
                                name="idRO" id="idRO" class="form-control">
                        </div><br>
                        <div>
                            <label for="idLey">Ley id</label>
                            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="number"
                                name="idLey" class="form-control" value="<?php echo $IdLeyes ?>">
                        </div><br>
                        <button class="btn btn-warning">Guardar</button>
                    </form>
                </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <table class="table table-striped">
                        <tr>
                            <th>NoDisposicion</th>
                            <th>ContenidoDisposicion</th>
                            <th>idLey</th>
                            <th>idTipoDisposicion</th>
                            <th>Activo</th>
                            <th>Borrado</th>
                            <th>idUsuarioCreo</th>
                            <th>idUsuarioMod</th>
                        </tr>
                        <?php foreach($datos as $key): ?>
                        <tr>
                            <td><?php echo $key->NoDisposicion ?></td>
                            <td><?php echo $key->ContenidoDisposicion ?></td>
                            <td><?php echo $key->idLey ?></td>
                            <td><?php echo $key->idTipoDisposicion?></td>
                            <td><?php echo $key->Activo ?></td>
                            <td><?php echo $key->Borrado ?></td>
                            <td><?php echo $key->idUsuarioCreo ?></td>
                            <td><?php echo $key->idUsuarioMod ?></td>
                            <td>
                                <a href="<?php echo base_url().'/Disposicion/obtener/'.$key->idDisposicion ?>"
                                    class="btn btn-warning btn-sm">Editar</a>
                            </td>
                            <td>
                                <a href="<?php echo base_url().'/Disposicion/eliminar/'.$key->idDisposicion ?>"
                                    class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>

                        <?php endforeach; ?>
                    </table>
                </div>

            </div>
        </div>
</section>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    let mensaje = '<?php echo $mensaje ?>';

    if (mensaje == '1') {
        swal(':D', 'Agregado con exito!', 'success');
    } else if (mensaje == '0') {
        swal(':(', 'Fallo al agregar!', 'error');
    } else if (mensaje == '2') {
        swal(':D', 'Actualizado con exito!', 'success');
    } else if (mensaje == '3') {
        swal(':(', 'Fallo al Actualizar!', 'error');
    } else if (mensaje == '4') {
        swal(':D', 'Eliminado con exito!', 'success');
    } else if (mensaje == '5') {
        swal(':(', 'Fallo al eliminar!', 'error');
    }
</script>
<?= $this->endSection()?>