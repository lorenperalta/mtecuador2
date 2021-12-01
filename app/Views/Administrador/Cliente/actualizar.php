<?php 
    $id_cliente = $datos[0]['id_cliente'];
    $razon_social = $datos[0]['razon_social'];
    $abreviatura = $datos[0]['abreviatura'];
    $RUC_cliente = $datos[0]['RUC_cliente'];
    $celular_cliente = $datos[0]['celular_cliente']; 
    $telefono_cliente = $datos[0]['telefono_cliente']; 
    $localizacion = $datos[0]['localizacion']; 
    $email_cliente = $datos[0]['email_cliente']; 
    $fecha = $datos[0]['fecha']; 
    $numero_clientes = $datos[0]['numero_clientes']; 
    $estado = $datos[0]['estado']; 
 ?>

<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>

<section class="col-lg-7 connectedSortable">
    <div class="card">
        <div class="card-header  bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-chart-pie mr-1"></i>
                Editar Clientes
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
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                    <form method="POST" action="<?php echo base_url().'/actualizar' ?>">
                    <div class="row">
                        <div class="col-6">
                            <div>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none " type="text"
                                    hidden="" name="id_cliente" id="id_cliente" class="form-control"
                                    value="<?php echo $id_cliente ?>">
                            </div>
                            <div>
                                <label for="razon_social">Razon social</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none " type="text"
                                    name="razon_social" id="razon_social" class="form-control"
                                    value="<?php echo $razon_social ?>">
                            </div>
                            <div>
                                <label for="abreviatura">Abreviatura</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text"
                                    name="abreviatura" id="abreviatura" class="form-control"
                                    value="<?php echo $abreviatura ?>">
                            </div>
                            <div>
                                <label for="RUC_cliente">RUC del cliente</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text"
                                    name="RUC_cliente" id="RUC_cliente" class="form-control"
                                    value="<?php echo $RUC_cliente ?>">
                            </div>
                            <div>
                                <label for="celular_cliente">Celular</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text"
                                    name="celular_cliente" id="celular_cliente" class="form-control"
                                    value="<?php echo $celular_cliente ?>">
                            </div>
                            <div>
                                <label for="telefono_cliente">telefono_ciente</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text"
                                    name="telefono_cliente" id="telefono_cliente" class="form-control"
                                    value="<?php echo $telefono_cliente ?>">
                            </div>
                        </div>
                        <div class="col-6">
                            <div>
                                <label for="localizacion">localizacion</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text"
                                    name="localizacion" id="localizacion" class="form-control"
                                    value="<?php echo $localizacion ?>">
                            </div>
                            <div>
                                <label for="email_cliente">email_cliente</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="email"
                                    name="email_cliente" id="email_cliente" class="form-control"
                                    value="<?php echo $email_cliente ?>">
                            </div>
                            <div>
                                <label for="fecha">fecha</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="date"
                                    name="fecha" id="fecha" class="form-control" value="<?php echo $fecha ?>">
                            </div>
                            <div>
                                <label for="numero_clientes">Numero de clientes</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text"
                                    name="numero_clientes" id="numero_clientes" class="form-control"
                                    value="<?php echo $numero_clientes ?>">
                            </div>
                            <div>
                                <label for="estado">Estado del cliente</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text"
                                    name="estado" id="estado" class="form-control" value="<?php echo $estado ?>">
                            </div>
                        </div>
                    </div><br>
                        <button class="btn btn-warning">Actualizar</button>
                    </form>
                </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">

                </div>
            </div>
        </div><!-- /.card-body -->
    </div>
</section>
<?= $this->endSection()?>