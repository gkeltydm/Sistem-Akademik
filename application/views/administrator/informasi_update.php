<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-university"></i> Form Update Informasi
</div>

<?php foreach($informasi as $info) : ?>
<form method="post" action="<?php echo base_url('administrator/informasi/update_informasi_aksi')?>">

<div class="form-group">
    <label for="">ICON</label>
    <input type="hidden" name="id_informasi" class="form-control" id="" value="<?php echo $info->id_informasi  ?>">
    <input type="text" name="icon" class="form-control" id="" value="<?php echo $info->icon  ?>">
    <?php echo form_error('icon', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">JUDUL INFORMASI</label>
    <input type="text" name="judul_informasi" class="form-control" id="" value="<?php echo $info->judul_informasi  ?>">
    <?php echo form_error('judul_informasi', '<div class="text-danger small ml-3">','</div>') ?>

    <div class="form-group">
    <label for="">ISI INFORMASI</label>
    <input type="text" name="isi_informasi" class="form-control" id="" value="<?php echo $info->isi_informasi  ?>">
    <?php echo form_error('isi_informasi', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
</form>

<?php endforeach; ?>

</div>