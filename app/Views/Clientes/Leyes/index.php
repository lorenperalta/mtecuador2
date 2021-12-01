<?php $NombreLey1 = "";?>
<?php $LibroAn = "";?>
<?= $this->extend('Layout/Clientedash')?>
<?= $this->section('contenido')?>

               <div class="card-header  bg-primary">
                    <h3 class="card-title text-white">
                    <i class="fas fa-chart-pie mr-1"></i>
                    <?php echo $NombreLey1 ?>
                    </h3>
                    <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark active text-white" href="#revenue-chart" data-toggle="tab">
                        <?php
											if ($Ley[0]['Cons_Prea_Intr'] == 1) echo 'Considerando';
											if ($Ley[0]['Cons_Prea_Intr'] == 2) echo 'Preámbulo';
											if ($Ley[0]['Cons_Prea_Intr'] == 3) echo 'Introducción';
										?>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link btn btn-sm btn-dark text-white" href="#List-Libros" data-toggle="tab">Contenido</a>
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
                    <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                       
                        
                            <div class="lh-1 text-wrap" contentindex="0c" style="display: block;" >
                           <p ><?php echo $Ley[0]["Considerando"] ?></p>  
                           </div>
                    </div>
                    <div class="chart tab-pane" id="List-Libros" style="position: relative; height: 300px;">
                    
                    <?php foreach($Libro as $key): ?>
                        
                    <?php endforeach;?>
                    
                   
                    
                    </div>
                    <div class="chart tab-pane" id="List-Disposiciones" style="position: relative; height: 300px;">
                    
                    </div>
                    <div class="chart tab-pane" id="List-Reformatorias" style="position: relative; height: 300px;">
                    
                    </div>
                    <div class="chart tab-pane" id="List-Juriprudencias" style="position: relative; height: 300px;">
                    
                    </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
<?= $this->endSection()?>