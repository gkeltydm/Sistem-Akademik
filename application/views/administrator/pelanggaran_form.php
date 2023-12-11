<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-university"></i> Form Input Riwayat Pelanggaran
</div>

<?php echo form_open_multipart('administrator/pelanggaran/tambah_pelanggaran_aksi')?>

<div class="form-group">
    <label for="">Tanggal</label>
    <input type="date" name="tanggal_pelanggaran" class="form-control" id="">
    <?php echo form_error('tanggal_pelanggaran', '<div class="text-danger small ml-3">','</div>') ?>
</div>
<div class="form-group">
    <label for="">Pelanggaran yang Dilakukan</label>
    <input type="text" name="deskripsi_pelanggaran" class="form-control" id="">
    <?php echo form_error('deskripsi_pelanggaran', '<div class="text-danger small ml-3">','</div>') ?>
</div>  
<button type="submit" class="btn btn-sm btn-primary">Simpan</button>

<?php form_close(); ?>

</div>