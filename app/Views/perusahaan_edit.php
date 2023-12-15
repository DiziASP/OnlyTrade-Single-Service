<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="align-items-center p-0 py-4">
    <h1 class="font-weight-bold">Dashboard | Edit Perusahaan </h1>
</div>
<form>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control rounded-0" id="nama" name="nama" placeholder="<?= $data['nama'] ?>">
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control rounded-0" id="alamat" name="alamat" placeholder="<?= $data['alamat'] ?>">
    </div>
    <div class="form-group">
        <label for="no_telp">Nomor Telepon</label>
        <input type="text" class="form-control rounded-0" id="no_telp" name="no_telp" placeholder="<?= $data['no_telp'] ?>">
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
            nama: document.getElementById('nama').value,
            alamat: document.getElementById('alamat').value,
            no_telp: document.getElementById('no_telp').value,
        }

        $.ajax({
            url: '/api/perusahaan/' + id,
            method: 'PUT',
            contentType: 'application/json',
            data: JSON.stringify(data),
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