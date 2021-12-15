<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>

<style>
    .contenedor{
        display: flex;
        flex-wrap: wrap;
        width: 85%;
    }   

    img{
        margin-bottom: 10px;
    }

    .elemento{
        width: 250px;
        height: 330px;
        border-radius: 25px;
        margin: 20px;
        padding: 25px;
        text-align: start;
        background-color: rgba(155, 155, 142, 0.16);
        box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19);
    }
</style>
<div class="contenedor">
    <?php foreach ($datos as $key): ?>
        <div class="elemento">    
            <img src="<?php echo $key->Imagen?>" alt="" width="200px" height="150px">
            <!-- <?php echo $key->idAgrupamiento?> -->
            <div>
                <p><?php echo $key->NombreAgrupamiento?></p>
            </div>
            <div style="margin-bottom: 10px;">
                <?php echo $key->DescripcionAgrupamiento?>
            </div>
            <!-- <?php echo $key->TipoAgrup?> -->
            <div>
                $<?php echo $key->Precio?>
                <a href="<?php echo base_url().'/Agrupamiento/editar/'.$key->idAgrupamiento?>" style="margin-left: 45px;" class="btn btn-info btn-sm">Editar</a>
                <a href="<?php echo base_url().'/Agrupamiento/editar/'.$key->idAgrupamiento?>" class="btn btn-info btn-sm">Añadir</a>
            </div>
        </div>
    <?php endforeach; ?> 
</div>

<?= $this->endSection()?>