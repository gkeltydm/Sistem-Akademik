<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-university"></i> PESAN DARI USER
</div>

<?php echo $this->session->flashdata('pesan') ?>

<table class="table table-striped table-hover table-bordered">

<tr>
    <th width="20px">NO</th>
    <th>NAMA</th>
    <th>EMAIL</th>
    <th>PESAN</th>
    <th colspan="2">AKSI</th>
</tr>

<?php
$no=1;
foreach ($hubungi as $hub) : ?>

<tr>
    <td><?php echo $no++ ?></td>
    <td><?php echo $hub->nama ?></td>
    <td><?php echo $hub->email ?></td>
    <td><?php echo $hub->pesan ?></td>
    <td width = 20px><?php echo anchor('administrator/hubungi_kami/kirim_email/' .$hub->id_hubungi, '<div class="btn btn-sm btn-primary"><i class = "fa fa-comment-dots"> </i></div>') ?></td>
    <td width = 20px><?php echo anchor('administrator/hubungi_kami/delete/' .$hub->id_hubungi, '<div class="btn btn-sm btn-danger"><i class = "fa fa-trash"> </i></div>') ?></td>
</tr>

<?php endforeach; ?>

</table>


</div>