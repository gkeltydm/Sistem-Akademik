<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fa-solid fa-university"></i> Tambah Potongan Mahasiswa
    </div>

    <?php foreach ($mahasiswa as $mhs) : ?>
        <?php echo form_open_multipart('administrator/potongan/tambah_potongan_aksi') ?>
        <div class="form-group">
            <label for="nim">NIM Mahasiswa</label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $mhs->id ?>">
            <input type="text" name="nim" class="form-control" readonly value="<?php echo $mhs->nim ?>">
            <?php echo form_error('nim', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <div class="form-group">
            <label for="nama_lengkap">Nama Mahasiswa</label>
            <input type="text" name="nama_lengkap" class="form-control" readonly value="<?php echo $mhs->nama_lengkap ?>">
            <?php echo form_error('nama_lengkap', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <div class="form-group">
    <label for="jenis_potongan">Kategori Potongan</label>
    <input type="text" name="nama_potongan" class="form-control" id="">
    <?php echo form_error('nama_potongan', '<div class="text-danger small ml-3">', '</div>'); ?>
</div>

<div class="form-group">
    <label for="besaran_potongan">Jumlah Potongan</label>
    <input type="text" name="besaran_potongan" id="besaran_potongan" class="form-control">
    <?php echo form_error('besaran_potongan', '<div class="text-danger small ml-3">', '</div>'); ?>
</div>


        <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
        <?php echo anchor('administrator/potongan', '<div class="btn btn-sm btn-primary">Kembali</div>') ?>

        <?php echo form_close(); ?>
    <?php endforeach; ?>

</div>
