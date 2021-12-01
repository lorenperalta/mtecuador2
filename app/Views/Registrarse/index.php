<?php
$fecha = date("Y-m-d");
?>

<?= $this->extend('Layout/ClienteDash'); ?>
<?= $this->section('contenido') ?>

<div class="container">

    <form method="POST" action="<?php echo base_url() . '/Registrarse/crear' ?>">
        <div class="row">
            <div class="col-6">
                <div>
                    <label for="razon_social">Razon Social</label>
                    <input type="text" name="razon_social" id="razon_social" class="form-control">
                </div>
                <div>
                    <label for="abreviatura">Abreviatura</label>
                    <input type="text" name="abreviatura" id="abreviatura" class="form-control">
                </div>
                <div>
                    <label for="RUC_ciente">RUC del cliente</label>
                    <input type="number" name="RUC_cliente" id="RUC_cliente" class="form-control">
                </div>
                <div>
                    <label for="celular_cliente">Celular</label>
                    <input type="number" name="celular_cliente" id="celular_cliente" class="form-control">
                </div>
                <div>
                    <label for="telefono_cliente">Telefono ciente</label>
                    <input type="number" name="telefono_cliente" id="telefono_cliente" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div>
                    <label for="localizacion">Localizacion</label>
                    <input type="text" name="localizacion" id="localizacion" class="form-control">
                </div>
                <div>
                    <label for="email_cliente">Email del cliente</label>
                    <input type="email" name="email_cliente" id="email_cliente" class="form-control">
                </div>
                <div>
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control">
                </div>
                <div>
                    <label for="contraseña">Contraseña</label>
                    <input type="password" name="contraseña" id="contraseña" class="form-control">
                </div>
                <div>
                    <label for="fecha">Fecha</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo $fecha ?>">
                </div>
                <div>
                    <label for="numero_clientes">Numero de clientes</label>
                    <input type="text" name="numero_clientes" id="numero_clientes" class="form-control">
                </div>
            </div>
        </div><br>
        <button class="btn btn-warning">Registrar</button>
    </form>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    let mensaje = '<?php echo $mensaje ?>';

    if (mensaje == '1') {
        swal(':D', 'Agregado con exito!', 'success');
    } else if (mensaje == '0') {
        swal(':(', 'Fallo al agregar!', 'error');
    } else if (mensaje == '2') {
        swal(':D', 'Actualizado con exito!', 'success');
    } else if (mensaje == '3') {
        swal(':(', 'Fallo al Actualizar!', 'error');
    } else if (mensaje == '4') {
        swal(':D', 'Eliminado con exito!', 'success');
    } else if (mensaje == '5') {
        swal(':(', 'Fallo al eliminar!', 'error');
    }
</script>

<?= $this->endSection() ?>