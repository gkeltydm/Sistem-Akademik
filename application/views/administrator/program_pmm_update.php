<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fa-solid fa-university"></i> Form Edit Program PMM
    </div>

    <?php foreach($program_pmm as $pmm) : ?>
        <form method="post" action="<?php echo base_url('administrator/program_pmm/edit_program_pmm_aksi/' . $pmm->id); ?>">
            <div class="form-group">
                <label for="">Kampus Asal</label>
                <input type="text" name="program_pmm" class="form-control" value="<?php echo $pmm->program_pmm ?>">
            </div>

            <div class="form-group">
                <label for="">Kampus Tujuan</label>
                <input type="text" name="kampus_tujuan_program_pmm" class="form-control" value="<?php echo $pmm->kampus_tujuan_program_pmm ?>">
            </div>

            <div class="form-group">
                <label for="">Jurusan</label>
                <input type="text" name="deskripsi_program_pmm" class="form-control" value="<?php echo $pmm->deskripsi_program_pmm ?>">
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        </form>
    <?php endforeach ?>
</div>