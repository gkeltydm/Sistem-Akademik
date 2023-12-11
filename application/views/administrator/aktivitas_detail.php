<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-eye"></i> Detail Aktivitas Mahasiswa
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
<?php echo anchor('administrator/aktivitas/tambah_aktivitas', '<button class = "btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Aktivitas</button>') ?>
<tr>
    <th>NO</th>
    <th>AKTIVITAS</th>
    <th>JENIS AKTIVITAS</th>
    <th>DESKRIPSI AKTIVITAS</th>
    <th>TANGGAL</th>
    <th>KETERANGAN</th>
    <th colspan="3">AKSI</th>
</tr>

<?php $no=1;foreach ($aktivitas as $akt) : ?>
<tr>
    <td><?php echo $no++ ?></td>
    <td><?php echo $akt->aktivitas?></td>
    <td><?php echo $akt->jenis_aktivitas?></td>
    <td><?php echo $akt->deskripsi_aktivitas?></td>
    <td><?php echo $akt->tanggal_aktivitas?></td>
    <td><?php echo $akt->keterangan_aktivitas?></td>
    <!-- <td width = 20px><?php echo anchor('administrator/aktivitas/aktivitas_edit_aksi/' .$akt->id, '<div class="btn btn-sm btn-primary"><i class = "fa fa-edit"> </i></div>') ?></td> -->
    <td width = 20px><?php echo anchor('administrator/aktivitas/aktivitas_hapus/' .$akt->id, '<div class="btn btn-sm btn-danger"><i class = "fa fa-trash"> </i></div>') ?></td> 
</tr>


<?php endforeach; ?>

</table>

<?php echo anchor('administrator/aktivitas', '<div class="btn btn-sm btn-primary">Kembali</div>') ?>
<br><br><br><br>
</div>