<nav class="navbar navbar-light bg-light">
    <form class="container-fluid justify-content-start">
        <?php foreach (session('MenuDashboardCliente') as $key) : ?>

            <a href="<?php echo base_url() . '/mostrar/' . $key->idAgrupMenu ?>"><button class="btn btn-sm btn-outline-secondary" type="button"><?php echo $key->NombreAgrupMenu ?></button></a>
        <?php endforeach; ?>
        <a href="<?php echo base_url() . '/RegistrosOfi/' ?>"><button class="btn btn-sm btn-outline-secondary" type="button"><?php echo "Resgistros Ofi" ?></button></a>
        <a href="<?php echo base_url() . '/RegistrosOfi/' ?>"><button class="btn btn-sm btn-outline-secondary" type="button"><?php echo "Mi cuenta" ?></button></a>
    </form>
</nav>