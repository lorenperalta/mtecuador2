<?= $this->extend('Layout/Clientedash');
$cont=1;
?>
<?= $this->section('contenido')?>

<?php foreach ($Ley as $key): ?>
               
                
                
    <a class="nav-link" href="../MostrarLey/<?php echo $key->idLey?>"><?php echo $cont++?>:-<?php echo $key->NombreLey ?></a>  

                
                
            <?php endforeach; ?>
            

<?= $this->endSection()?>