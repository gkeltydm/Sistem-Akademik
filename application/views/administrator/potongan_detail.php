<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-eye"></i> Detail Potongan Mahasiswa
</div>

<table class="table table-hover table-bordered table-striped">
<?php foreach($detail as $dt) : ?>

    <img class = "mb-4 " src="<?php echo base_url('assets/uploads/').$dt->photo ?>" style="width: 20%;" alt="">
<tr>
    <td>NIM</td>
    <td><?php echo $dt->nim; ?></td>
</tr>
<tr>
    <td>NAMA LENGKAP</td>
    <td><?php echo $dt->nama_lengkap; ?></td>
</tr>
<tr>
    <td>ALAMAT</td>
    <td><?php echo $dt->alamat; ?></td>
</tr>
<tr>
    <td>EMAIL</td>
    <td><?php echo $dt->email; ?></td>
</tr>
<tr>
    <td>TELEPON</td>
    <td><?php echo $dt->telepon; ?></td>
</tr>
<tr>
    <td>TEMPAT LAHIR</td>
    <td><?php echo $dt->tempat_lahir; ?></td>
</tr>
<tr>
    <td>TANGGAL LAHIR</td>
    <td><?php echo $dt->tanggal_lahir; ?></td>
</tr>
<tr>
    <td>JENIS KELAMIN</td>
    <td><?php echo $dt->jenis_kelamin; ?></td>
</tr>
<tr>
    <td>PROGRAM STUDI</td>
    <td><?php echo $dt->nama_prodi; ?></td>
</tr>

<?php endforeach; ?>
</table>

<div class="container row">


<?php 
$no =1;
foreach ($potongan as $bill): ?>

    <div class="card col-sm-4 mx-auto" style="width: 20rem;">
        <div class="card-header">
            POTONGAN <?= $no;?>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
            <tr>
                <td> Kategori Potongan :</td>
                <td><?= $bill->nama_potongan; ?></td>
            </tr>
            </li>
            <li class="list-group-item">
            <tr>
                <td>Jumlah Potongan :</td>
                <td><?= "Rp. ".  $bill->besaran_potongan;?></td>
            </tr>
            </li>
            
        </ul>
    </div>


    

    <!-- Add more details as needed -->
<?php
$no++; 
endforeach; ?>

</div>


<?php echo anchor('administrator/potongan', '<div class="btn btn-sm btn-primary">Kembali</div>') ?>
<br><br><br><br>
</div>