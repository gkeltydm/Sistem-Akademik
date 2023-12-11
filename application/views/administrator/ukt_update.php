<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fa-solid fa-university"></i> Ubah UKT Mahasiswa
    </div>

    <?php foreach ($mahasiswa as $mhs) : ?>
        <?php echo form_open_multipart('administrator/ukt/update_ukt/' . $ukt->id_ukt) ?>
        <div class="form-group">
            <label for="">NIM Mahasiswa</label>
            <input type="hidden" name="id_mahasiswa" class="form-control" id="" value="<?= set_value('jumlah', $ukt->id_mahasiswa); ?>">
            <input type="text" name="nim" class="form-control" id="" readonly value="<?php echo $mhs->nim ?>">
            <?php echo form_error('nim', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <div class="form-group">
            <label for="">Nama Mahasiswa</label>
            <input type="text" name="nama_lengkap" class="form-control" readonly id="" value="<?php echo $mhs->nama_lengkap ?>">
            <?php echo form_error('nama_lengkap', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <div class="form-group">
            <label for="">Jenis UKT</label>
            <select name="jenis_ukt" class="form-control">
                <option value="Non Beasiswa" <?= set_select('jenis_ukt', 'Non Beasiswa', ($ukt->jenis_ukt == 'Non Beasiswa')); ?>>Non Beasiswa</option>
                <option value="Beasiswa" <?= set_select('jenis_ukt', 'Beasiswa', ($ukt->jenis_ukt == 'Beasiswa')); ?>>Beasiswa</option>
            </select>
            <?php echo form_error('jenis_ukt', '<div class="text-danger small ml-3">', '</div>'); ?>
        </div>

        <div class="form-group">
            <label for="">Jumlah UKT</label>
            <input type="text" name="total" class="form-control" value="<?= set_value('total_ukt', $ukt->total_ukt); ?>" id="">
            <?php echo form_error('total', '<div class="text-danger small ml-3">', '</div') ?>
        </div>

        <div class="form-group">
            <label for="">Status UKT</label>
            <select name="status_ukt" class="form-control">
                <option value="Belum Lunas" <?= set_select('status_ukt', 'Belum Lunas', ($ukt->status_ukt == 'Belum Lunas')); ?>>Belum Lunas</option>
                <option value="Lunas" <?= set_select('status_ukt', 'Lunas', ($ukt->status_ukt == 'LUNAS')); ?>>Lunas</option>
            </select>
            <?php echo form_error('status_ukt', '<div class="text-danger small ml-3">', '</div>'); ?>
        </div>

        <div class="form-group">
            <label for="">Tenggat UKT</label>
            <input type="date" name="tenggat_ukt" class="form-control" value="<?= set_value('tanggak_pembayaran', $ukt->tenggat_ukt); ?>">
            <?php echo form_error('tenggat_ukt', '<div class="text-danger small ml-3">', '</div>'); ?>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-sm btn-primary">UBAH UKT</button>

            <?= form_close(); ?>
        </div>
    <?php endforeach; ?>
    <?php echo anchor('administrator/ukt', '<div class="btn btn-sm btn-danger">Kembali</div>') ?>
</div>
