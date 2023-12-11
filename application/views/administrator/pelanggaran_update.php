<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fa-solid fa-university"></i> Form Edit Aktivitas
    </div>

    <?php foreach($aktivitas as $akt) : ?>
        <form method="post" action="<?php echo base_url('administrator/aktivitas/edit_aktivitas_aksi/' . $akt->id); ?>">
            <div class="form-group">
                <label for="">Aktivitas yang diikuti</label>
                <input type="text" name="aktivitas" class="form-control" value="<?php echo $akt->aktivitas ?>">
            </div>

            <div class="form-group">
                <label for="">Jenis Aktivitas</label>
                <input type="text" name="jenis_aktivitas" class="form-control" value="<?php echo $akt->jenis_aktivitas ?>">
            </div>

            <div class="form-group">
                <label for="">Deskripsi Aktivitas</label>
                <input type="text" name="deskripsi_aktivitas" class="form-control" value="<?php echo $akt->deskripsi_aktivitas ?>">
            </div>

            <div class="form-group">
                <label for="">Tanggal Aktivitas</label>
                <input type="text" name="tanggal_aktivitas" class="form-control" value="<?php echo $akt->tanggal_aktivitas ?>">
            </div>

            <div class="form-group">
                <label for="">Keterangan/Prestasi</label>
                <input type="text" name="keterangan_aktivitas" class="form-control" value="<?php echo $akt->keterangan_aktivitas ?>">
            </div>

            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        </form>
    <?php endforeach ?>
</div>
