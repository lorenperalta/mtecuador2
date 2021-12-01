<?= $this->extend('Layout/ClienteDash') ?>
<?= $this->section('contenido') ?>

<div class="container">
    <h1 class="display-4">Registros Oficiales</h1><br>
    <?php

    $count = 0;
    $i = date("Y");
    while ($i >= 2002) {
    ?>
        <div class="row">
            <?php
            for ($y = 0; $y < 6; $y++) {
            ?>
                <div class="col-sm">
                    <a href="<?php echo base_url() . '/RegistrosOfi/' . $i ?>"> <i class="fa fa-folder" style="font-size:90px;color:#ffc107"></i><br></a>
                    <label for=""><?php echo $i;
                                    $i--; ?></label>
                </div>
            <?php
            }
            ?>
        </div>
    <?php

    }
    ?>

</div>
<?= $this->endSection() ?>