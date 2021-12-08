<?= $this->extend('Layout/Layout') ?>
<?= $this->section('contenido') ?>

<section class="col-lg-7 connectedSortable">
    <div class="card">
        <div class="card-header  bg-primary">
            <h3 class="card-title text-white">
                <i class="fas fa-chart-pie mr-1"></i>
                Favoritos
            </h3>
        </div>
        <div class="card-body">
            <div class="tab-content p-0">
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                <table class="table table-hover table-bordered">
                        <tr>
                            <th>Leyes</th>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>