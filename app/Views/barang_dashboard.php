<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="card card-default px-6 py-4">
    <div class="card-header align-items-center p-0 py-4">
        <h1 class="font-weight-bold">Dashboard | Barang </h1>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-event">
            <i class="mdi mdi-plus mr-1"></i> Add Barang
        </button>
    </div>
    <table id="productsTable" class="table table-hover table-product" style="width:100%">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Perusahaan</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <!-- Map Data -->
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['stock'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['perusahaan_name'] ?></td>
                    <td>
                        <div class="dropdown">
                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right p-2" aria-labelledby="dropdownMenuLink">
                                <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#modal-edit-event">
                                    <i class_="mdi mdi-pencil mr-1"></i> Edit
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-event">
                                    <i class="mdi mdi-delete mr-1"></i> Delete
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>

            <?php endforeach; ?>

        </tbody>
    </table>
</div>
<?= $this->endSection() ?>