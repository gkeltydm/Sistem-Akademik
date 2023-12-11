<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-list-check"></i></i> Form Input Aktivitas
</div>

<?php echo form_open_multipart('administrator/aktivitas/tambah_aktivitas_aksi')?>

<div class="form-group">
    <label for="">Aktivitas yang diikuti</label>
    <input type="text" name="aktivitas" class="form-control" id="">
    <?php echo form_error('aktivitas', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Jenis Aktivitas</label>
    <input type="text" name="jenis_aktivitas" class="form-control" id="">
    <?php echo form_error('jenis_aktivitas', '<div class="text-danger small ml-3">','</div>') ?>

    <div class="form-group">
    <label for="">Deskripsi Aktivitas</label>
    <input type="text" name="deskripsi_aktivitas" class="form-control" id="">
    <?php echo form_error('deskripsi_aktivitas', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Tanggal Aktivitas</label>
    <input type="date" name="tanggal_aktivitas" class="form-control" id="">
    <?php echo form_error('tanggal_aktivitas', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Keterangan/Prestasi</label>
    <input type="text" name="keterangan_aktivitas" class="form-control" id="">
    <?php echo form_error('keterangan_aktivitas', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<button type="submit" class="btn btn-sm btn-primary">Simpan</button>

<?php form_close(); ?>

</div>