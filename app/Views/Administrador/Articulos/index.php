<?php 

$idParagrafo= $ideParagrafo;
$NombreTitulos =$dbtitu[0]['NombreTitulo'];
$NombreLibros =$dblib[0]['NombreLibro'];
$NombreLey =$dbley[0]['NombreLey'];
$NombreCapitulo =$dbCapi[0]['NombreCapitulo'];
$NombreSeccion =$datosec[0]['NombreSeccion'];
$Paragraf =$dbpara[0]['NombreParagrafo'];
?>
<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>
<section class="content">
<div class="row">

<section class="col-lg-7 connectedSortable">
    <div class="card">
                <div class="card-header  bg-primary">
                    <h3 class="card-title text-white">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Articulos
                    </h3>
                    <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark active text-white" href="#revenue-chart" data-toggle="tab">Ingresar</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark text-white" href="#sales-chart" data-toggle="tab">Listar</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark text-white" href="#sales-chart" data-toggle="tab">Buscar</a>
                        </li>
                    </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="revenue-chart"
                        style="position: relative; height: 300px;">
                        <form method="POST" action="<?php echo base_url().'/Articulos/crear' ?>">
                            <div>
                                <label for="noArticulo">noArticulo</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="number" name="noArticulo" id="noArticulo" class="form-control">
                            </div><br>
                            <div>
                                <label for="ContenidoArticulo">ContenidoArticulo</label>
                                <textarea   name="ContenidoArticulo" id="ckeditor" class="form-control ckeditor">
                                </textarea>
                                
                            </div><br>
                            <div>
                                <label for="idParagrafo">idParagrafo</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none" type="number" name="idParagrafo" id="idParagrafo" value="<?php echo $idParagrafo?>" class="form-control">
                            </div><br>
                            <div>
                                <label for="idRomano">idRomano</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="number" name="idRomano" id="idRomano" class="form-control">
                            </div><br>
                            <button class="btn btn-warning">Guardar</button>
                        </form>
                    </div>
                    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <table class="table table-hover table-bordered">
                    <tr>
                        <th>noArticulo</th>
                        <th>ContenidoArticulo</th>
                        <th>idParagrafo</th>
                        <th>idRomano</th>
                    </tr>
                    <?php foreach($datos as $key): ?>
                            <tr>
                                <td><?php echo $key->noArticulo ?></td>
                                <td><?php echo $key->ContenidoArticulo ?></td>
                                <td><?php echo $key->idParagrafo ?></td>
                                <td><?php echo $key->idRomano ?></td>
                                <td>
                                    <a href="<?php echo base_url().'/Articulo/obtener/'.$key->idArticulo ?>" class="btn btn-warning btn-sm">Editar</a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'/Articulos/eliminar/'.$key->idArticulo ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                </table>
                    </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
            </section>
            <section class="col-lg-5 connectedSortable ui-sortable">

<div class="card">
  <div class="card-header ui-sortable-handle bg-danger" style="cursor: move;">
    <h3 class="card-title">
      <i class="ion ion-clipboard mr-1"></i>
      Vista Previa
    </h3>

</div>
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="todo-list ui-sortable list-unstyled" data-widget="todo-list">
                    <li>
                        <!-- drag handle -->
                        <span class="handle ui-sortable-handle">
                        <i class="fas fa-ellipsis-v"></i>
                        <i class="fas fa-ellipsis-v"></i>
                        </span>
                        <span class="text text-danger">Ley: <?php echo $NombreLey ?></span><br>

                        <span class="text text-primary">Libro: <?php echo $NombreLibros ?></span><br>
                        <span class="text text-primary">Titulo: <?php echo $NombreTitulos ?></span><br>
                        <span class="text text-primary">Capitulo: <?php echo $NombreCapitulo ?></span><br>
                        <span class="text text-primary">Seccion: <?php echo $NombreSeccion ?></span><br>
                        <span class="text text-primary">Paragrafo: <?php echo $Paragraf ?></span>

                    </li>
                    <?php foreach ($datos as $key): ?>
                    <li>
                        
                        <div class="icheck-primary d-inline ml-2">
                        <input type="checkbox" value="" name="todo3" id="todoCheck3">
                        <label for="todoCheck3"></label>
                        </div>
                        <span class="text text-info"><a class="link-info rounded" href="<?php echo base_url().'/Articulos/'.$key->idParagrafo?>">Articulo Nº  <?php echo  $key->noArticulo?> : <?php echo  $key->ContenidoArticulo?></a> </span>
                        
                    </li>
                    <?php endforeach; ?>
                </ul>
              </div>
              
            </div>
          </section>
          </div>
          </section>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="number/javascript">
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