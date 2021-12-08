
<?= $this->extend('Layout/Layout')?>
<?= $this->section('contenido')?>

<h3>Subir Archivo</h3><br>
<form action="<?php echo base_url().'/SubirArchivo/cargar_archivos'?>" method="post" enctype="multipart/form-data">
    <input type="file" name="archivo">
    <input type="submit" value="Guardar">
</form>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';

        if (mensaje == '1') {
             swal(':D','Agregado con exito!','success');
                    } else if (mensaje == '0'){
            swal(':(','Fallo al agregar!','error');
        }
    </script>
<?= $this->endSection()?>