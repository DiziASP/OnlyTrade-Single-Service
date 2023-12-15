<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-xl-8">
        <!-- Income and Express -->
        <div class="card card-default">
            <div class="card-header">
                <h2>Cashflow</h2>
            </div>
            <div class="card-body">
                <div class="chart-wrapper">
                    <div id="mixed-chart-1"></div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-xl-4">
        <!-- Revenue -->
        <div class="card card-default">
            <div class="card-header justify-content-center">
                <h2>Total Penjualan</h2>
            </div>
            <div class="card-body pt-0">
                <div class="chart-wrapper">
                    <div id="radial-bar-chart-1"></div>
                </div>
                <div class="radial-bar-chart-footer">
                    <div class="title-large">
                        <?php $total = 0; ?>
                        <?php foreach ($data as $t) : ?>
                            <?php $total += $t['total']; ?>
                        <?php endforeach; ?>

                        Rp <?= $total; ?>
                        <?php if ($total > 300000) : ?>
                            <i class="mdi mdi-arrow-up-bold text-success"></i>
                        <?php else : ?>
                            <i class="mdi mdi-arrow-down-bold text-danger"></i>
                        <?php endif; ?>
                    </div>
                    <div class="title-small">vs Rp300000 (prev)</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pengguna</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data as $t) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $t['user_id']; ?></td>
                    <td><?= $t['created_at']; ?></td>
                    <td><?= $t['amount']; ?></td>
                    <td>Rp <?= $t['total']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    // Add options to Apexchart
</script>
<?= $this->endSection() ?>