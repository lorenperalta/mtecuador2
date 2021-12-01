<?php
$idLey = $datos[0]['idLey']; 
 $NombreLey = $datos[0]['NombreLey'];
 $nombre_doc = $datos[0]['nombre_doc'];
 $Cons_Prea_Intr = $datos[0]['Cons_Prea_Intr'];
 $Considerando = $datos[0]['Considerando'];
 $idAgrupMenu = $datos[0]['idAgrupMenu'];
 $Listo = $datos[0]['Listo']; 
 $ano = $datos[0]['ano'];  
 $idUsuarioCreo = $datos[0]['idUsuarioCreo'];
 $idUsuarioMod = $datos[0]['idUsuarioMod'];
 ?>
<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>



    <div class="card">
                <div class="card-header  bg-primary">
                    <h3 class="card-title text-white">
                    <i class="fas fa-chart-pie mr-1"></i>
                    <?php echo $NombreLey ?>
                    </h3>
                    <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark active text-white" href="#revenue-chart" data-toggle="tab">Ingresar</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark text-white" href="#List-Libros" data-toggle="tab">Libros</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark text-white" href="#List-Disposiciones" data-toggle="tab">Disposiciones</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark text-white" href="#List-Reformatorias" data-toggle="tab">Reformatorias</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark text-white" href="#list-Juriprudencias" data-toggle="tab">Juriprudencias</a>
                        </li>
                        
                    </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="revenue-chart"
                        style="position: relative; height: 300px;">
                        <form action="<?php echo base_url().'/Leyes/actualizar'?>" method="post">
                        <div class="form-group text-left">
                                
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" hidden="" type="text" id="idLey" name="idLey" value="<?php echo $idLey ?>" class="form-control"> 
                            </div>
                            <div class="form-group text-left">
                                <label for="NombreLey" >Nombre Ley</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="NombreLey" name="NombreLey" value="<?php echo $NombreLey ?>" class="form-control"> 
                            </div>
                            <div class="form-group text-left">
                                <label for="nombre_doc" >Nombre del Documento</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="nombre_doc" name="nombre_doc" value="<?php echo $nombre_doc ?>" class="form-control"> 
                            </div>
                            
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="Cons_Prea_Intr" id="btnradio1" value="1" autocomplete="off" <?php if($Cons_Prea_Intr==1){echo "checked";}?>>
                                <label class="btn btn-outline-primary" for="btnradio1">Preambulo</label>

                                <input type="radio" class="btn-check" name="Cons_Prea_Intr" id="btnradio2" value="2" autocomplete="off" <?php if($Cons_Prea_Intr==2){echo "checked";}?> >
                                <label class="btn btn-outline-primary" for="btnradio2">Considerando</label>

                                <input type="radio" class="btn-check" name="Cons_Prea_Intr" id="btnradio3" value="3" autocomplete="off" <?php if($Cons_Prea_Intr==3){echo "checked";}?>>
                                <label class="btn btn-outline-primary" for="btnradio3">Introducción</label>

                                <input type="radio" class="btn-check" name="Cons_Prea_Intr" id="btnradio4" value="4" autocomplete="off" <?php if($Cons_Prea_Intr==4){echo "checked";}?>>
                                <label class="btn btn-outline-primary" for="btnradio4">No existe</label>

                                <label for="idAgrupMenu" >Agrupamiento</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="idAgrupMenu" name="idAgrupMenu" value="<?php echo $idAgrupMenu ?>" class="form-control"> 

                                <label for="ano" >Año</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="ano" name="ano" value="<?php echo $ano ?>" class="form-control"> 

                            </div>
                            <div class="form-group text-left">
                                <textarea  name="Considerando" id="ckeditor"  cols="30" rows="10"  class="ckeditor">
                                <?php echo $Considerando; ?>
                                </textarea>
                            </div>
                            
                            <div class="form-group text-left">
                                
                            </div>
                                <div class="form-group">
                                <button class="btn btn-sm btn-warning">Guardar</button>
                                <a href="<?php echo base_url().'/Libros/'.$idLey ?>" class="btn btn-sm btn-primary">Libros</a>
                                <a href="<?php echo base_url().'/Disposicion/'.$idLey ?>" class="btn btn-sm btn-primary">Disposiciones</a>
                                <a href="<?php echo base_url().'/Reformatorias/'.$idLey ?>" class="btn btn-sm btn-primary">Reformatorias</a>
                                <a href="<?php echo base_url().'/Juriprudencias/'.$idLey ?>" class="btn btn-sm btn-primary">Juriprudencias</a>
                            </div>
                        </form>
                    </div>
                    <div class="chart tab-pane" id="List-Libros" style="position: relative; height: 300px;">
                    <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nº Libro</th>
                <th scope="col">NombreLibro</th>
                <th scope="col">idLey</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($datosLibro as $key): ?>
                <tr>
                <th scope="row"><?php echo  $key->idLibro?></th>
                <th scope="row"><?php echo  $key->NoLibro?></th>
                <td><?php echo  $key->NombreLibro?></td>
                <td><?php echo $key->idLey?></td>
                
                <td><a href="<?php echo base_url().'/Libros/editar/'.$key->idLibro?>" class="btn btn-info btn-sm">editar</a></td>
                <td><a href="<?php echo base_url().'/eliminar'?>" class="btn btn-danger btn-sm">eliminar</a></td>
                </tr>
            <?php endforeach; ?>
                
            </tbody>
        </table>
                    </div>
                    <div class="chart tab-pane" id="List-Disposiciones" style="position: relative; height: 300px;">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>NoDisposicion</th>
                            <th>ContenidoDisposicion</th>
                            <th>idLey</th>
                            <th>idTipoDisposicion</th>
                        </tr>
                        <?php foreach($datosdispo as $key): ?>
                        <tr>
                            <td><?php echo $key->NoDisposicion ?></td>
                            <td><?php echo $key->ContenidoDisposicion ?></td>
                            <td><?php echo $key->idLey ?></td>
                            <td><?php echo $key->idTipoDisposicion?></td>
                            <td>
                                <a href="<?php echo base_url().'/Disposicion/obtenerCliente/'.$key->idDisposicion ?>"
                                    class="btn btn-warning btn-sm">Editar</a>
                            </td>
                            <td>
                                <a href="<?php echo base_url().'/Libros/Disposicion/'.$key->idDisposicion ?>"
                                    class="btn btn-warning btn-sm">Libro</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    </div>
                    <div class="chart tab-pane" id="List-Reformatorias" style="position: relative; height: 300px;">
                    <table class="table table-hover table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Numero de Reformatoria</th>
                        <th>ResumenReformatoria</th>
                        <th>idRO</th>
                        <th>idLey</th>            
                    </tr>
                    <?php foreach($dtrefo as $key): ?>
                        <tr>
                            <td><?php echo $key->idReformatoria ?></td>
                            <td><?php echo $key->NoReformatoria ?></td>
                            <td><?php echo $key->ResumenReformatoria ?></td>
                            <td><?php echo $key->idRO?></td>
                            <td><?php echo $key->idLey?></td>
                            <td>
                                <a href="<?php echo base_url().'/Reformatorias/obtener/'.$key->idReformatoria ?>" class="btn btn-warning btn-sm">Editar</a>
                            </td>
                            <td>
                                <a href="<?php echo base_url().'/Reformatorias/eliminar/'.$key->idReformatoria ?>" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                </table>
                    </div>
                    <div class="chart tab-pane" id="List-Juriprudencias" style="position: relative; height: 300px;">
                    
                    </div>
                    </div>
                </div><!-- /.card-body -->
            </div>

<?= $this->endSection()?>