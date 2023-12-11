<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-university"></i> Ubah Potongan Mahasiswa
</div>

<?php foreach($mahasiswa as $mhs) : ?>
<?php echo form_open_multipart('administrator/potongan/update_potongan/' . $potongan->id_mahasiswa)?>
<div class="form-group">
    <label for="">NIM Mahasiswa</label>
    <input type="hidden" name="id_mahasiswa" class="form-control" id=""  value="<?= set_value('jumlah', $potongan->id_mahasiswa);?>">
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
    <label for="">Nama Potongan</label>
    <input type="text" name="nama_potongan" class="form-control" value="<?= set_value('jumlah', $potongan->nama_potongan);?>" id="">
    <?php echo form_error('nama_potongan', '<div class="text-danger small ml-3">','</div') ?>
</div>
<div class="form-group">
    <label for="">Jumlah Potongan</label>
    <input type="text" name="jumlah_potongan" class="form-control" value="<?= set_value('jumlah', $potongan->jumlah);?>" id="">
    <?php echo form_error('jumlah_potongan', '<div class="text-danger small ml-3">','</div') ?>
</div>

<div class="form-group">
    <label for="">Status Potongan</label>
    <select name="status_potongan" class="form-control">
        <option value="Aktif" <?= set_select('status_potongan', 'Aktif', ($potongan->status_potongan == 'Aktif')); ?>>Aktif</option>
        <option value="Lunas" <?= set_select('status_potongan', 'Lunas', ($potongan->status_potongan== 'Lunas')); ?>>Lunas</option>
    </select>
    <?php echo form_error('status_potongan', '<div class="text-danger small ml-3">', '</div>'); ?>
</div>

<div class="form-group">
    <label for="">Tenggat Potongan</label>
    <input type="date" name="tenggat_potongan" class="form-control" value="<?= set_value('tenggat_potongan', $potongan->tenggat_potongan); ?>">
    <?php echo form_error('tenggat_potongan', '<div class="text-danger small ml-3">', '</div>'); ?>
</div>


<button type="submit" class="btn btn-sm btn-primary">UBAH POTONGAN</button>

<?= form_close(); ?>
<?php endforeach; ?>

</div>