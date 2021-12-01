<?= $this->extend('Layout/Clientedash') ?>
<?= $this->section('contenido') ?>

<header>
    <section class="textos-header">
        <h1>Más de 30 años
            haciendo posible
            lo imposible</h1>
        <h2>Queremos crecer de forma estratégica, siempre comprometidos con la sociedad para hacer del mundo un espacio más sostenible y solidario.</h2>
    </section>
    <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
            <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
        </svg></div>
</header>

<?php foreach ($datos as $key) : ?>
    <?php
    $historia = $key->historia;
    $mision = $key->mision;
    $vision = $key->vision;
    $valores = $key->valores;
    $objetivos = $key->objetivos;
    $filosofia = $key->filosofia;
    ?>
<?php endforeach; ?>

<div class="container mb-5">
    <div class="row mx-auto ">
        <div class="col-sm">
            <div>
                <div class="card-body">
                    <h2 class="card-title" style="text-align: center;">Historia</h2>
                    <p class="card-text"><?php echo $historia ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mb-5">
    <div class="row mx-auto">
        <div class="col-sm-6">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://moduloinduccioncecar.weebly.com/uploads/2/1/0/3/21037234/7507456.png?284" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text"><?php echo $mision ?></p>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://moduloinduccioncecar.weebly.com/uploads/2/1/0/3/21037234/7507456.png?284" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text"><?php echo $vision ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mb-5">
    <div class="row mx-auto ">
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://moduloinduccioncecar.weebly.com/uploads/2/1/0/3/21037234/7507456.png?284" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text"><?php echo $objetivos ?></p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://moduloinduccioncecar.weebly.com/uploads/2/1/0/3/21037234/7507456.png?284" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text"><?php echo $valores ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>