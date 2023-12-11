<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-eye"></i> Detail Riwayat Pelanggaran 
</div>

<table class="table table-hover table-bordered table-striped">
<?php foreach($detail as $dt) : ?>
<tr>
    <td>NIM</td>
    <td><?php echo $dt->nim; ?></td>
</tr>
<tr>
    <td>NAMA LENGKAP</td>
    <td><?php echo $dt->nama_lengkap; ?></td>
</tr>

<?php endforeach; ?>


<table class="table table-striped table-hover table-bordered">
    <?php echo anchor('administrator/pelanggaran/tambah_pelanggaran', '<button class = "btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Riwayat Pelanggaran</button>') ?>
    <tr>
        <th>NO</th>
        <th>TANGGAL</th>
        <th>PELANGGARAN</th>
        <th colspan="2">AKSI</th>
    </tr>

    <?php $no=1; foreach ($pelanggaran as $pel) : ?>
    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $pel->tanggal_pelanggaran?></td>
        <td><?php echo $pel->deskripsi_pelanggaran?></td>
        <!-- <td width = 20px><?php echo anchor('administrator/pelanggaran/pelanggaran_edit_aksi/' .$pel->id, '<div class="btn btn-sm btn-primary"><i class = "fa fa-edit"> </i></div>') ?></td> -->
        <td width = 20px><?php echo anchor('administrator/pelanggaran/pelanggaran_hapus/' .$pel->id, '<div class="btn btn-sm btn-danger"><i class = "fa fa-trash"> </i></div>') ?></td> 
    </tr>
    <?php endforeach; ?>

</table>

<?php echo anchor('administrator/pelanggaran', '<div class="btn btn-sm btn-primary">Kembali</div>') ?>
<br><br><br><br>
</div>