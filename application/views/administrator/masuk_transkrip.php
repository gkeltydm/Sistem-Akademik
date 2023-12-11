<div class="container-fluid">
    <div class="alert alert-success">
        <i class="fas fa-university"></i> Form Masuk Halaman Transkrip Nilai
    </div>
    <form method="post" action="<?php echo base_url("administrator/transkrip_nilai/buat_transkrip_aksi") ?>">

    <div class="form-group">
        <label for="">NIM</label>
        <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM Mahasiswa">
        <?php echo form_error('nim', '<div class="text-danger small ml-2">','<?div>') ?>
    </div>

    <button type="submit" class="btn btn-primary">Prosses</button>

    </form>
</div>