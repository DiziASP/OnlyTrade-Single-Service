<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="align-items-center p-0 py-4">
    <h1 class="font-weight-bold">Dashboard | Tambah Perusahaan </h1>
</div>
<form onsubmit="handleSubmit()">
    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" class="form-control rounded-0" id="nama" name="nama" placeholder="Enter Company Name">
    </div>
    <div class="form-group">
        <label for="stock">Alamat</label>
        <input type="text" class="form-control rounded-0" id="alamat" name="alamat" placeholder="Enter Company Address">
    </div>
    <div class="form-group">
        <label for="price">Nomor Telepon</label>
        <input type="text" class="form-control rounded-0" id="no_telp" name="no_telp" placeholder="Enter Phone Number">
    </div>
    <div class="form-footer">
        <button type="submit" class="btn btn-secondary btn-pill">Submit</button>
        <a href="/perusahaan">
            <button type="button" class="btn btn-light btn-pill">Cancel</button>
        </a>
    </div>

</form>

<script>
    function handleSubmit(e) {
        data = {
            nama: document.getElementById('nama').value,
            alamat: document.getElementById('alamat').value,
            no_telp: document.getElementById('no_telp').value,
        }

        if (data.nama == '' || data.alamat == '' || data.no_telp == '') {
            alert('Data tidak boleh kosong');
            return;
        }

        $.ajax({
            url: '/api/perusahaan',
            type: 'POST',
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