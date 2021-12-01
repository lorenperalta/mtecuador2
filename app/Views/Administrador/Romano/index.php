<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>


<section class="col-lg-7 connectedSortable">
    <div class="card">
                <div class="card-header  bg-primary">
                    <h3 class="card-title text-white">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Romano
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
                        <form action="<?php echo base_url().'/Capitulo/insertar'?>" method="post">
        <div class="form-group text-left">
            <label for="Nombre" >Nº Capitulo</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" id="NoCapitulo" name="NoCapitulo" class="form-control"> 
        </div><br>
        <div class="form-group text-left">
            <label for="Apellidos">Nombre Capitulo</label>
            <input style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="NombreCapitulo" class="form-control"> 
            
        </div>
        <div class="form-group text-left">
            <label for="Direccion">Id Titulo</label>
            <input  style="border:none; border-bottom: 1px solid #ffc107; box-shadow: none;" type="text" name="idTitulo" class="form-control"> 
            <span asp-validation-for="dni" class="text-danger"></span>

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
                <th scope="col">Nº Romano</th>
                <th scope="col">NombreRomano</th>
                <th scope="col">idParagrafo</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($datos as $key): ?>
                <tr>
                <th scope="row"><?php echo  $key->idRomano?></th>
                <th scope="row"><?php echo  $key->NoRomano?></th>
                <td><?php echo  $key->NombreRomano?></td>
                <td><?php echo $key->idParagrafo?></td>
                
                <td><a href="<?php echo base_url().'/Romano/editar/'.$key->idRomano?>" class="btn btn-info btn-sm">editar</a></td>
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