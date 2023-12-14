<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="align-items-center p-0 py-4">
    <h1 class="font-weight-bold">Dashboard | Edit Barang </h1>
</div>
<form onsubmit="handleSubmit(<?= $data['id'] ?>)">
    <div class="form-group">
        <label for="name">Nama Produk</label>
        <input type="text" class="form-control rounded-0" id="name" name="name" placeholder="<?= $data['name'] ?>">
    </div>
    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" class="form-control rounded-0" id="stock" name="stock" placeholder="<?= $data['stock'] ?>">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control rounded-0" id="price" name="price" placeholder="<?= $data['price'] ?>">
    </div>
    <div class="form-group">
        <label for="perusahaan">Perusahaan</label>
        <select class="form-control rounded-0" id="perusahaan_id" name="perusahaan_id">
            <?php foreach ($perusahaan as $row) : ?>
                <option value="<?= $row['id'] ?>">
                    <?= $row['nama'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-footer">
        <button type="button" class="btn btn-secondary btn-pill" onclick="handleSubmit('<?= $data['id'] ?>')">Submit</button>
        <a href="/barang">
            <button type="button" class="btn btn-light btn-pill">Cancel</button>
        </a>
    </div>

</form>

<script>
    function handleSubmit(id) {
        data = {
            name: "Sapi Patah Hati 2 123",
            stock: "20",
            price: "80000",
            perusahaan_id: "4bfc25cb-99ed-11ee-abae-0242ac1e0002"
        }
        $.ajax({
            url: '/api/barang/' + "fd2573a4-829e-4081-bbed-ba926ee47743",
            method: 'PUT',
            data: {
                name: "Sapi Patah Hati 2 123",
                stock: "20",
                price: "80000",
                perusahaan_id: "4bfc25cb-99ed-11ee-abae-0242ac1e0002"
            },
            success: function(result) {
                window.location.href = '/barang';
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }
</script>
<?= $this->endSection() ?>