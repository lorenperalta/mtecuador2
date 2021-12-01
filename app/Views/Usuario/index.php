<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>

<section class="col-lg-7 connectedSortable">
    <div class="card">
                <div class="card-header  bg-primary">
                    <h3 class="card-title text-white">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Usuario
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
                    <div class="chart tab-pane active" id="revenue-chart"
                        style="position: relative; height: 300px;">
                        <form action="<?php echo base_url().'/Usuario/insertar'?>" method="post">
        <div class="form-group text-left">
            <label for="Nombre" >Nombre</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="Nombre" name="Nombre" class="form-control"> 
        </div><br>
        <div class="form-group text-left">
            <label for="Apellidos">Apellidos</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="Apellidos" class="form-control"> 
            
        </div>
        <div class="form-group text-left">
            <label for="Direccion">Direccion</label>
            <input  style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="Direccion" class="form-control"> 
            <span asp-validation-for="dni" class="text-danger"></span>

        </div>
        <div class="form-group text-left">
            <label for="Usuario">Usuario</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="Usuario" class="form-control"> 
            
        </div>
        <div class="form-group text-left">
            <label for="Password">Contraseña</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="Password" name="Password" class="form-control"> 
            
        </div>
        <div class="form-group text-left">
            <label for-="Roll">Rol</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="Roll" class="form-control"> 
            
        </div><br>
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
                <th scope="col">Apellidos</th>
                <th scope="col">Direccion</th>
                <th scope="col">usuario</th>
                <th scope="col">Roll</th>
                <th scope="col">Editar</th>
                <th scope="col">eliminar</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($datos as $key): ?>
                <tr>
                <th scope="row"><?php echo  $key->id?></th>
                <td><?php echo  $key->Nombre?></td>
                <td><?php echo $key->Apellidos?></td>
                <td><?php echo $key->Direccion?></td>
                <td><?php echo $key->Usuario?></td>
                <td><?php echo $key->Roll?></td>
                <td><a href="<?php echo base_url().'/Usuario/editar/'.$key->id?>" class="btn btn-info btn-sm">editar</a></td>
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