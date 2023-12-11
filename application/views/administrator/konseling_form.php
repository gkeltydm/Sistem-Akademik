<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-university"></i> Form Input Bimbingan
</div>

<?php echo form_open_multipart('administrator/konseling/tambah_konseling_aksi')?>

<div class="form-group">
    <label for="">Jenis Bimbingan</label>
    <input type="text" name="jenis_bimbingan" class="form-control" id="">
    <?php echo form_error('jenis_bimbingan', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Deskripsi Bimbingan</label>
    <input type="text" name="deskripsi_bimbingan" class="form-control" id="">
    <?php echo form_error('deskripsi_bimbingan', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Tanggal Bimbingan</label>
    <input type="date" name="tanggal_bimbingan" class="form-control" id="">
    <?php echo form_error('tanggal_bimbingan', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Keterangan</label>
    <input type="text" name="keterangan_bimbingan" class="form-control" id="">
    <?php echo form_error('keterangan_bimbingan', '<div class="text-danger small ml-3">','</div>') ?>
</div>
<div class="form-group">
    <label for="">Dosen Pembimbing</label>
    <select name="nama_dosen" class="form-control" id="">
        <option value="">--Pilih DPA--</option>
        <?php foreach($dosen as $dsn) : ?>
            <option value="<?= $dsn->nama_dosen ?>"><?= $dsn->nama_dosen ?></option>
        <?php endforeach; ?>
    </select>
    <?php echo form_error('dosen_pembimbing', '<div class="text-danger small ml-3">','</div>') ?>
</div>


<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
<br><br><br>

<?php form_close(); ?>

</div>





