<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-university"></i> UKT
</div>

<?php echo $this->session->flashdata('pesan') ?>



<table class="table table-striped table-hover table-bordered">

<tr>
    <th>NO</th>
    <th>NIM</th>
    <th>NAMA</th>
    <th colspan="2">AKSI</th>
</tr>

<?php
$no=1;
foreach ($mahasiswa as $mhs) : ?>

<tr>
    <td><?php echo $no++ ?></td>
    <td><?php echo $mhs->nim ?></td>
    <td><?php echo $mhs->nama_lengkap ?></td>
    <td width = 20px><?php echo anchor('administrator/ukt/detail/' .$mhs->id, '<div class="btn btn-sm btn-primary"><i class = "fa fa-eye"> </i></div>') ?></td>
    <td width = 20px><?php echo anchor('administrator/ukt/tambah_ukt/' .$mhs->id, '<div class="btn btn-sm btn-primary"><i class = "fa-solid fa-plus"> </i></div>') ?></td>

    
</tr>


<?php endforeach; ?>

</table>

</div>