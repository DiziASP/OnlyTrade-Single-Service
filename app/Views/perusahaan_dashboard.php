<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="card card-default px-6 py-4">

    <div class="card-header align-items-center p-0 py-4">
        <h1 class="font-weight-bold">Dashboard | Perusahaan </h1>

        <a href="/perusahaan/add">
            <button type="button" class="btn btn-primary btn-pill ml-4">
                <i class="mdi mdi-plus"></i> Tambah Perusahaan
            </button>
        </a>
    </div>
    <table id="productsTable" class="table table-hover table-product" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Contact</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <!-- Map Data -->
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td><?= $row['no_telp'] ?></td>
                    <td>
                        <a href="/perusahaan/<?= $row['id'] ?>">
                            <button type="button" class="btn btn-primary mr-4" data-toggle="modal" data-target="#modal-edit-event">
                                <i class="mdi mdi-pencil"></i>
                            </button>
                        </a>
                        <button type="button" class="btn btn-danger" onclick="handleDelete('<?= $row['id'] ?>')">
                            <i class="mdi mdi-delete"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>
<!-- Delete Function using Ajax -->
<script>
    function handleDelete(id) {
        $.ajax({
            url: '/api/perusahaan/' + id,
            type: 'DELETE',
            success: function(result) {
                location.reload();
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }
</script>
<?= $this->endSection() ?>