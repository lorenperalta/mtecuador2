<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>
    <div class="card">
                <div class="card-header  bg-primary">
                    <h3 class="card-title text-white">
                    <i class="fas fa-chart-pie mr-1"></i>
                    ley
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                            <a class="nav-link btn btn-sm btn-dark active text-white" href="#revenue-chart" data-toggle="tab">Actualizar</a>
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
                    <div class="chart tab-pane active" id="revenue-chart"
                        style="position: relative; height: 300px;">
                        <form action="<?php echo base_url().'/Leyes/insertar'?>" method="post">
                            <div class="form-group text-left">
                                <label for="NombreLey" >Nombre Ley</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="NombreLey" name="NombreLey" class="form-control"> 
                            </div>
                            <div class="form-group text-left">
                                <label for="nombre_doc" >Nombre del Documento</label>
                                <input class="form-control" style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" name="nombre_doc" type="file" id="formFile">
                            </div>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="Cons_Prea_Intr" id="btnradio1" value="1" autocomplete="off" checked>
                                <label class="btn btn-outline-primary" for="btnradio1">Preambulo</label>

                                <input type="radio" class="btn-check" name="Cons_Prea_Intr" id="btnradio2" value="2" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btnradio2">Considerando</label>

                                <input type="radio" class="btn-check" name="Cons_Prea_Intr" id="btnradio3" value="3" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btnradio3">Introducción</label>

                                <input type="radio" class="btn-check" name="Cons_Prea_Intr" id="btnradio4" value="4" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btnradio4">No existe</label>

                                <label for="idAgrupMenu" >Agrupamiento</label>
                                <select class="form-select form-select-sm" name="idAgrupMenu" aria-label="form-select-sm example" style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;">
                                
                                <?php foreach ($datosAgrup as $key): ?>
                                    <option Value="<?php echo $key->idAgrupMenu?>"><?php echo $key->NombreAgrupMenu?></option>
                                    <?php endforeach; ?>
                                    
                                </select>
                                

                                <label for="ano" >Año</label>
                                <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="ano" name="ano" class="form-control"> 
                            </div>
                            <div class="form-group text-left">
                                <textarea  name="Considerando" id="ckeditor" cols="30" rows="10" class="ckeditor">
                                </textarea>
                            </div>
                            
                                <div class="form-group">
                                <button class="btn btn-warning">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre ley</th>
                <th scope="col">Nombre Doc</th>
                <th scope="col">Cons_Prea_Intr</th>
                <th scope="col">Considerando</th>
                <th scope="col">editar</th>
                <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($datos as $key): ?>
                <tr>
                <th scope="row"><?php echo  $key->idLey?></th>
                <td><?php echo  substr($key->NombreLey,0,50)?>...</td>
                <td><?php echo  substr($key->nombre_doc,0,50)?></td>
                <td><?php echo  $key->Cons_Prea_Intr?></td>
                <td><?php echo  substr($key->Considerando,0,50)?>...</td>
                <td><a href="<?php echo base_url().'/Leyes/editar/'.$key->idLey?>" class="btn btn-info btn-sm">editar</a></td>
                <td><a href="<?php echo base_url().'/eliminar'?>" class="btn btn-danger btn-sm">eliminar</a></td>
                </tr>
            <?php endforeach; ?>
                
            </tbody>
        </table>
                    </div>
                    </div>
                </div><!-- /.card-body -->
            </div>

<?= $this->endSection()?>