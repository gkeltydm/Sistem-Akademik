<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-university"></i> Form Input Mata Kuliah
</div>

    <form method="post" action="<?php echo base_url('administrator/matakuliah/tambah_matakuliah_aksi') ?>">
    <div class="form-group">
        <label for="">Kode Mata Kuliah</label>
        <input type="text" name="kode_matakuliah" class="form-control" id="">
        <?php echo form_error('kode_matakuliah', '<div class="text-danger small ml-3">') ?>
    </div>
    <div class="form-group">
        <label for="">Nama Mata Kuliah</label>
        <input type="text" name="nama_matakuliah" class="form-control" id="">
        <?php echo form_error('nama_matakuliah', '<div class="text-danger small ml-3">') ?>
    </div>

    <div class="form-group">
        <label for="">SKS</label>
        <select name="sks" class="form-control" id="">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
        </select>
        
    </div>

    <div class="form-group">
        <label for="">Semester</label>
        <select name="semester" class="form-control" id="">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
        </select>
        
    </div>

    <div class="form-group">
        <label for="">Program Studi</label>
        <select name="nama_prodi" class="form-control" id="">
            <option value="">--Pilih Program Studi</option>
            <?php foreach($prodi as $prd) : ?>
            <option value="<?php echo $prd->nama_prodi ?>"><?php echo $prd->nama_prodi ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary mb-5">Simpan</button>

    </form>
</div>
