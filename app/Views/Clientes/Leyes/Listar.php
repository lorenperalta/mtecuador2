<?= $this->extend('Layout/Clientedash');
$cont=1;
?>
<?= $this->section('contenido')?>

<?php foreach ($Ley as $key): ?>                
    <div>
        <a class="nav-link" href="../MostrarLey/<?php echo $key->idLey?>"><?php echo $cont++?>:-<?php echo $key->NombreLey ?></a> 
    </div>

        
<?php endforeach; ?>
            

<?= $this->endSection()?>