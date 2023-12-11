<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fa-solid fa-university"></i> Tambah UKT Mahasiswa
    </div>

    <?php foreach ($mahasiswa as $mhs) : ?>
        <?php echo form_open_multipart('administrator/ukt/tambah_ukt_aksi') ?>
        <div class="form-group">
            <label for="">NIM Mahasiswa</label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $mhs->id ?>">
            <input type="text" name="nim" class="form-control" readonly value="<?php echo $mhs->nim ?>">
            <?php echo form_error('nim', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <div class="form-group">
            <label for="">Nama Mahasiswa</label>
            <input type="text" name="nama_lengkap" class="form-control" readonly value="<?php echo $mhs->nama_lengkap ?>">
            <?php echo form_error('nama_lengkap', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <div class="form-group">
            <label for="">Jenis UKT</label>
            <select name="jenis_ukt" class="form-control">
                <option value="Non Beasiswa">Non Beasiswa</option>
                <option value="Beasiswa">Beasiswa</option>
            </select>
            <?php echo form_error('jenis_ukt', '<div class="text-danger small ml-3">', '</div>'); ?>
        </div>

        <div class="form-group">
            <label for="">Total UKT</label>
            <input type="text" name="total" class="form-control">
            <?php echo form_error('total', '<div class="text-danger small ml-3">', '</div') ?>
        </div>

        <div class="form-group">
            <label for="">Status UKT</label>
            <select name="status_ukt" class="form-control">
                <option value="Belum Lunas">Belum Lunas</option>
                <option value="Lunas">Lunas</option>
            </select>
            <?php echo form_error('status_ukt', '<div class="text-danger small ml-3">', '</div>'); ?>
        </div>

        <div class="form-group">
            <label for="">Tenggat Pembayaran</label>
            <input type="date" name="tenggat_ukt" class="form-control">
            <?php echo form_error('tenggat_ukt', '<div class="text-danger small ml-3">', '</div>'); ?>
        </div>

        <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
        <?php echo anchor('administrator/ukt', '<div class="btn btn-sm btn-primary">Kembali</div>') ?>

        <?php form_close(); ?>
    <?php endforeach; ?>

</div>
