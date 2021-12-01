<?= $this->extend('Layout/Layout') ?>
<?= $this->section('contenido') ?>

<section class="col-lg-7 connectedSortable">
    <div class="card">
        <div class="card-header  bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-chart-pie mr-1"></i>
                Diccionario
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
                    <form method="POST" action="<?php echo base_url() . '/Diccionario/crear' ?>">
                        <div class="col">
                            <div>
                                <label for="">Nombre</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="palabra" id="palabra" class="form-control">
                            </div>
                            <div>
                                <label for="">Significado</label>
                                <div class="form-group text-left">
                                    <textarea name="significado" id="ckeditor" cols="30" rows="10" class="ckeditor" value=""> </textarea>
                                </div>
                            </div><br>
                            <button class="btn btn-warning">Guardar</button>
                        </div>
                    </form>
                </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>Nombre</th>
                            <th>Significado</th>
                        </tr>
                        <?php foreach ($datos as $key) : ?>
                            <tr>
                                <td><?php echo $key->palabra ?></td>
                                <td><?php echo $key->significado ?></td>
                                <td>
                                    <a href="<?php echo base_url() . '/Diccionario/obtener/' . $key->idpalabra ?>" class="btn btn-warning btn-sm">Editar</a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() . '/Diccionario/eliminar/' . $key->idpalabra ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div><!-- /.card-body -->
    </div>
</section>

<?= $this->endSection() ?>