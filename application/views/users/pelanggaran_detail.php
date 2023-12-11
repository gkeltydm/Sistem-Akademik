<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fa-solid fa-eye"></i> Detail Riwayat Pelanggaran
    </div>

    <table class="table table-hover table-bordered table-striped">
            <tr>
                <td>NIM</td>
                <td><?php echo $mahasiswa->nim; ?></td>
            </tr>
            <tr>
                <td>NAMA LENGKAP</td>
                <td><?php echo $mahasiswa->nama_lengkap; ?></td>
            </tr>
    </table>
    
    <table class="table table-striped table-hover table-bordered">
        <tr>
            <th>NO</th>
            <th>TANGGAL</th>
            <th>PELANGGARAN</th>
        </tr>
        <?php $no = 1; foreach ($pelanggaran as $pel) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $pel->tanggal_pelanggaran ?></td>
                <td><?php echo $pel->deskripsi_pelanggaran ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<br><br><br><br>

