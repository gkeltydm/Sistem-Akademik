<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-university"></i> Pendaftaran Online
</div>

<?php echo form_open_multipart('administrator/pendaftaran_online/daftar_online_aksi')?>

<div class="form-group">
    <label for="">nama depan</label>
    <input type="text" name="nama_depan" class="form-control" id="">
    <?php echo form_error('nama_depan', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Nama belakang</label>
    <input type="text" name="nama_belakang" class="form-control" id="">
    <?php echo form_error('nama_belakang', '<div class="text-danger small ml-3">','</div>') ?>

    <div class="form-group">
    <label for="">Alamat</label>
    <input type="text" name="alamat" class="form-control" id="">
    <?php echo form_error('alamat', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Tanggal Lahir</label>
    <input type="date" name="tanggal_lahir" class="form-control" id="">
    <?php echo form_error('tanggal_lahir', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Jenis Kelamin</label>
    <select name="jenis_kelamin" class="form-control" id="">
        <option>--Pilih Jenis Kelamin--</option>
        <option>Laki-laki</option>
        <option>Perempuan</option>
    </select>
    <?php echo form_error('jenis_kelamin', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Email</label>
    <input type="text" name="email" class="form-control" id="">
    <?php echo form_error('email', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">nomor handphone</label>
    <input type="text" name="nomor_handphone" class="form-control" id="">
    <?php echo form_error('nomor_handphone', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Program Studi</label>
    <select name="program_studi" class="form-control" id="">
        <option>--Pilih Program studi--</option>
        <?php foreach($prodi as $prd) : ?>
        <option value="<?php echo $prd->nama_prodi ?>"><?php echo $prd->nama_prodi ?></option>
        <?php endforeach; ?>
    </select>
    <?php echo form_error('program_studi', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">tahun masuk</label>
    <input type="text" name="tahun_masuk" class="form-control" id="">
    <?php echo form_error('tahun_masuk', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<button type="submit" class="btn btn-sm btn-primary">Simpan</button>

<?php form_close(); ?>

</div>