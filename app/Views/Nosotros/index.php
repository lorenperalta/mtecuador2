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

<?= $this->extend('Layout/Clientedash') ?>
<?= $this->section('contenido') ?>

<section class="content">
    <div class="row">
        <section class="col-lg-7 connectedSortable">
            <div class="card">
                <div class="card-header  bg-primary">
                    <h3 class="card-title text-white">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Quienes Somos
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                        <form action="<?php echo base_url() . '/Nosotros/actualizar' ?>" method="post">
                            <div class="form-group d-flex justify-content-end">
                                <button class="btn btn-primary">Enviar</button>
                            </div>
                            <!-- Morris chart - Sales -->
                            <div style="position: relative; padding-bottom: 30px;">
                                <div class="form-group text-left">
                                    <label for="Nombre">Historia</label>
                                    <div class="form-group text-left">
                                        <textarea name="historia" id="ckeditor" cols="30" rows="10" class="ckeditor" value=""><?php echo $historia ?> </textarea>
                                    </div>
                                </div>
                            </div>
                            <div style="position: relative; padding-bottom: 30px;">
                                <div class="form-group text-left">
                                    <label for="Nombre">Mision</label>
                                    <div class="form-group text-left">
                                        <textarea name="mision" id="ckeditor" cols="30" rows="10" class="ckeditor" value=""><?php echo $mision ?> </textarea>
                                    </div>
                                </div>
                            </div>
                            <div style="position: relative; padding-bottom: 30px;">
                                <div class="form-group text-left">
                                    <label for="Nombre">Vision</label>
                                    <div class="form-group text-left">
                                        <textarea name="vision" id="ckeditor" cols="30" rows="10" class="ckeditor" value=""><?php echo $vision ?> </textarea>
                                    </div>
                                </div>
                            </div>
                            <div style="position: relative; padding-bottom: 30px;">
                                <div class="form-group text-left">
                                    <label for="Nombre">Valores</label>
                                    <div class="form-group text-left">
                                        <textarea name="valores" id="ckeditor" cols="30" rows="10" class="ckeditor" value=""><?php echo $valores ?> </textarea>
                                    </div>
                                </div>
                            </div>
                            <div style="position: relative; padding-bottom: 30px;">
                                <div class="form-group text-left">
                                    <label for="Nombre">Objetivos</label>
                                    <div class="form-group text-left">
                                        <textarea name="objetivos" id="ckeditor" cols="30" rows="10" class="ckeditor" value=""><?php echo $objetivos ?> </textarea>
                                    </div>
                                </div>
                            </div>
                            <div style="position: relative; padding-bottom: 30px;">
                                <div class="form-group text-left">
                                    <label for="Nombre">Filosofia</label>
                                    <div class="form-group text-left">
                                        <textarea name="filosofia" id="ckeditor" cols="30" rows="10" class="ckeditor" value=""><?php echo $filosofia ?> </textarea>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div><!-- /.card-body -->
            </div>
        </section>

    </div>
</section>

<?= $this->endSection() ?>