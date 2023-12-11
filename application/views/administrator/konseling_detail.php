<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-eye"></i> Detail Konseling Mahasiswa
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
<?php echo anchor('administrator/konseling/tambah_konseling', '<button class = "btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Bimbingan</button>') ?>
<tr>
    <th>NO</th>
    <th>Jenis Bimbingan</th>
    <th>Deskripsi Bimbingan</th>
    <th>Tanggal</th>
    <th>Keterangan</th>
    <th>Dosen Pembimbing</th>
    <th colspan="2">Aksi</th>
</tr>

<?php $no=1;foreach ($konseling as $kons) : ?>
<tr>
    <td><?php echo $no++ ?></td>
    <td><?php echo $kons->jenis_bimbingan?></td>
    <td><?php echo $kons->deskripsi_bimbingan?></td>
    <td><?php echo $kons->tanggal_bimbingan?></td>
    <td><?php echo $kons->keterangan_bimbingan?></td>
    <td><?php echo $kons->dosen_pembimbing?></td>
    <td width = 20px><?php echo anchor('administrator/konseling/konseling_hapus/' .$kons->id, '<div class="btn btn-sm btn-danger"><i class = "fa fa-trash"> </i></div>') ?></td> 

</tr>


<?php endforeach; ?>

</table>

<?php echo anchor('administrator/konseling', '<div class="btn btn-sm btn-primary">Kembali</div>') ?>
<br><br><br><br>
</div>