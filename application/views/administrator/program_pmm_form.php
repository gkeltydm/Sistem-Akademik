<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-university"></i> Form Input Program PMM
</div>

<?php echo form_open_multipart('administrator/program_pmm/tambah_program_pmm_aksi')?>


<div class="form-group">
    <label for="">Kampus Asal</label>
    <input type="text" name="kampus_asal_program_pmm" class="form-control" id="">
    <?php echo form_error('kampus_asal_program_pmm', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Kampus Tujuan</label>
    <input type="text" name="kampus_tujuan_program_pmm" class="form-control" id="">
    <?php echo form_error('kampus_tujuan_program_pmm', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<div class="form-group">
    <label for="">Jurusan</label>
    <input type="text" name="jurusan_program_pmm" class="form-control" id="">
    <?php echo form_error('jurusan_program_pmm', '<div class="text-danger small ml-3">','</div>') ?>
</div>

<button type="submit" class="btn btn-sm btn-primary">Simpan</button>

<?php form_close(); ?>

</div>