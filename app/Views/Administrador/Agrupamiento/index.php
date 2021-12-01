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
                        <form action="<?php echo base_url().'/Agrupamiento/insertar'?>" method="post">
        <div class="form-group text-left">
            <label for="Nombre" >Nombre</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="Nombre" name="Nombre" class="form-control"> 
        </div><br>
        <div class="form-group text-left">
            <label for="Descripción">Descripción</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="Descripcion" class="form-control"> 
            
        </div>
        <div class="form-group text-left">
            <label for="Precio">Precio</label>
            <input  style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="Precio" class="form-control"> 
            
        </div>
        <br>
        <div class="form-group">
            <button class="btn btn-warning">Enviar</button>
        </div>
    </form>
                    </div>
                    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($datos as $key): ?>
                <tr>
                <th scope="row"><?php echo  $key->id?></th>
                <td><?php echo  $key->Nombre?></td>
                <td><?php echo $key->Descripcion?></td>
                <td><?php echo $key->Precio?></td>
                <td><a href="<?php echo base_url().'/Agrupamiento/editar/'.$key->id?>" class="btn btn-info btn-sm">editar</a></td>
                <td><a href="<?php echo base_url().'/eliminar'?>" class="btn btn-danger btn-sm">eliminar</a></td>
                </tr>
            <?php endforeach; ?>
                
            </tbody>
        </table>
                    </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
            </section>
<?= $this->endSection()?>