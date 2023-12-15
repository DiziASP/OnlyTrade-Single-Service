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
            name: document.getElementById('name').value,
            stock: document.getElementById('stock').value,
            price: document.getElementById('price').value,
            perusahaan_id: document.getElementById('perusahaan_id').value,
        }
        $.ajax({
            url: '/api/barang/' + id,
            method: 'PUT',
            contentType: 'application/json',
            data: JSON.stringify(data),
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