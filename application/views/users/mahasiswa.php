<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-eye"></i> Profil Mahasiswa
</div>

<table class="table table-hover table-bordered table-striped">

    <img class = "mb-4 " src="<?php echo base_url('assets/uploads/').$mahasiswa->photo ?>" style="width: 20%;" alt="">
<tr>
    <td>NIM</td>
    <td><?php echo $mahasiswa->nim ?></td>
</tr>
<tr>
    <td>NAMA LENGKAP</td>
    <td><?php echo $mahasiswa->nama_lengkap ?></td>
</tr>
<tr>
    <td>ALAMAT</td>
    <td><?php echo $mahasiswa->alamat ?></td>
</tr>
<tr>
    <td>EMAIL</td>
    <td><?php echo $mahasiswa->email ?></td>
</tr>
<tr>
    <td>TELEPON</td>
    <td><?php echo $mahasiswa->telepon ?></td>
</tr>
<tr>
    <td>TEMPAT LAHIR</td>
    <td><?php echo $mahasiswa->tempat_lahir ?></td>
</tr>
<tr>
    <td>TANGGAL LAHIR</td>
    <td><?php echo $mahasiswa->tanggal_lahir ?></td>
</tr>
<tr>
    <td>JENIS KELAMIN</td>
    <td><?php echo $mahasiswa->jenis_kelamin ?></td>
</tr>
<tr>
    <td>PROGRAM STUDI</td>
    <td><?php echo $mahasiswa->nama_prodi ?></td>
</tr>

</table>
<br><br><br><br>
</div>