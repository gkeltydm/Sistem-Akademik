<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-university"></i> Form Update Tentang Kampus</div>

<?php foreach ($tentang as $ttg) : ?>

<form method="post" action="<?php echo base_url('administrator/tentang_kampus/update_aksi') ?>">

    <div class="form-group">
        <label>Sejarah</label>
        <input type="hidden" name="id" class="form-control" value="<?php echo $ttg->id ?>">
        <input type="text" name="sejarah" class="form-control" value="<?php echo $ttg->sejarah ?>">
    
    </div>

    <div class="form-group">
        <label>Visi</label>
        <input type="text" name="visi" class="form-control" value="<?php echo $ttg->visi ?>">
    
    </div>

    <div class="form-group">
        <label>Misi</label>
        <input type="text" name="misi" class="form-control" value="<?php echo $ttg->misi ?>">
    
    </div>

    <button type = "submit" class="btn btn-primary">Simpan</button>
</form>

<?php endforeach; ?>

</div>