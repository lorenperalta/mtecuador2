<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>


<section class="col-lg-7 connectedSortable">
    <div class="card">
                <div class="card-header  bg-primary">
                    <h3 class="card-title text-white">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Agrupamientos
                    </h3>
                    <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark active text-white" href="#revenue-chart" data-toggle="tab">Ingresar</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark text-white" href="<?php echo base_url('/Servicios') ?>" >Servicios</a>
                        </li>
                    </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 500px;">
                        <form action="<?php echo base_url().'/Agrupamiento/insertar'?>" method="post">
                            <div class="form-group text-left">
                                <label  >Nombre de Agrupamiento</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="NombreAgrupamiento" class="form-control"> 
                            </div>
                            <div class="form-group text-left">
                                <label  >Descripcion del Agrupamiento</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="DescripcionAgrupamiento" class="form-control"> 
                            </div>
                            <div class="form-group text-left">
                                <label >Tipo de Agrupamiento</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="TipoAgrup" class="form-control"> 
                            </div>
                            <div class="form-group text-left">
                                <label >Precio</label>
                                <input  style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" step="0.01" name="Precio" class="form-control"> 
                            </div>  
                            <div class="form-group text-left">
                                <label >Imagen</label><br>
                                <input  style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="url" name="Imagen" class="form-control"> 
                                <!-- <input type="file" name="Imagen"> -->
                            </div>  
                            <div class="form-group">
                                <button class="btn btn-warning">Enviar</button>
                            </div>
                        </form>
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