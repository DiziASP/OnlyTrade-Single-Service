<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="align-items-center p-0 py-4">
    <h1 class="font-weight-bold">Dashboard | Edit Perusahaan </h1>
</div>
<form onsubmit="handleSubmit(<?= $data['id'] ?>)">
    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" class="form-control rounded-0" id="nama" name="nama" placeholder="<? $data['nama'] ?>">
    </div>
    <div class="form-group">
        <label for="stock">Alamat</label>
        <input type="text" class="form-control rounded-0" id="alamat" name="alamat" placeholder="<? $data['alamat'] ?>">
    </div>
    <div class="form-group">
        <label for="price">Nomor Telepon</label>
        <input type="text" class="form-control rounded-0" id="no_telp" name="no_telp" placeholder="<? $data['no_telp'] ?>">
    </div>
    <div class="form-footer">
        <button type="submit" class="btn btn-secondary btn-pill">Submit</button>
        <a href="/perusahaan">
            <button type="button" class="btn btn-light btn-pill">Cancel</button>
        </a>

</form>

<script>
    function handleSubmit(id) {
        data = {
            name: document.getElementById('nama').value,
            stock: document.getElementById('alamat').value,
            price: document.getElementById('no_telp').value,
        }
        alert(JSON.stringify(data));
        $.ajax({
            url: '/api/perusahaan/' + id,
            method: 'PUT',
            data: data,
            success: function(result) {
                window.location.href = '/perusahaan';
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }
</script>
<?= $this->endSection() ?>