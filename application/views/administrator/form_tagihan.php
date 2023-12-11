<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-coins"></i> Tambah Tagihan Mahasiswa
</div>

<?php foreach($mahasiswa as $mhs) : ?>
<?php echo form_open_multipart('administrator/tagihan/tambah_tagihan_aksi')?>
<div class="form-group">
    <label for="">NIM Mahasiswa</label>
    <input type="hidden" name="id" class="form-control" id="" value="<?php echo $mhs->id  ?>">
    <input type="text" name="nim" class="form-control" id="" readonly value="<?php echo $mhs->nim  ?>">
    <?php echo form_error('nim', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Nama Mahasiswa</label>
    <input type="text" name="nama_lengkap" class="form-control" readonly id="" value="<?php echo $mhs->nama_lengkap  ?>">
    <?php echo form_error('nama_lengkap', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Jenis Kelamin</label>
    <input type="text" name="jenis_kelamin" readonly class="form-control" id="" value="<?php echo $mhs->jenis_kelamin  ?>">
    <?php echo form_error('jenis_kelamin', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Nama Tagihan</label>
    <input type="text" name="nama_tagihan" class="form-control" id="">
    <?php echo form_error('nama_tagihan', '<div class="text-danger small ml-3">','</div') ?>
</div>
<div class="form-group">
    <label for="">Jumlah Tagihan</label>
    <input type="text" name="jumlah_tagihan" class="form-control" id="">
    <?php echo form_error('jumlah_tagihan', '<div class="text-danger small ml-3">','</div') ?>
</div>

<div class="form-group">
<label for="">Status Tagihan</label>
    <select name="status_tagihan" class="form-control">
        <option value="BELUM LUNAS">BELUM LUNAS</option>
        <option value="LUNAS">LUNAS</option>
    </select>
    <?php echo form_error('status_tagihan', '<div class="text-danger small ml-3">', '</div>'); ?>
</div>

<div class="form-group">
    <label for="">Tenggat Tagihan</label>
    <input type="date" name="tenggat_tagihan" class="form-control">
    <?php echo form_error('tenggat_tagihan', '<div class="text-danger small ml-3">', '</div>'); ?>
</div>


<button type="submit" class="btn btn-sm btn-primary">Tambah</button>
<?php echo anchor('administrator/tagihan', '<div class="btn btn-sm btn-primary">Kembali</div>') ?>

<?php form_close(); ?>
<?php endforeach; ?>

</div>