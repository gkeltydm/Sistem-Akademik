<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-eye"></i> Detail Program PMM
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
<?php echo anchor('administrator/program_pmm/tambah_program_pmm', '<button class = "btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Program PMM</button>') ?>
<tr>
        <th>NO</th>
        <th>KAMPUS ASAL</th>
        <th>KAMPUS TUJUAN</th>
        <th>JURUSAN</th>
        <th colspan="3">AKSI</th>
</tr>

<?php $no=1;foreach ($program_pmm as $pmm) : ?>
<tr>
    <td><?php echo $no++ ?></td>
    <td><?php echo $pmm->kampus_asal?></td>
    <td><?php echo $pmm->kampus_tujuan?></td>
    <td><?php echo $pmm->jurusan?></td>
    <!-- <td width = 20px><?php echo anchor('administrator/program_pmm/program_pmm_edit/' .$pmm->id, '<div class="btn btn-sm btn-primary"><i class = "fa fa-edit"> </i></div>') ?></td> -->
    <td width = 20px><?php echo anchor('administrator/program_pmm/program_pmm_hapus/' .$pmm->id, '<div class="btn btn-sm btn-danger"><i class = "fa fa-trash"> </i></div>') ?></td> 
</tr>


<?php endforeach; ?>

</table>

<?php echo anchor('administrator/program_pmm', '<div class="btn btn-sm btn-primary">Kembali</div>') ?>
<br><br><br><br>
</div>