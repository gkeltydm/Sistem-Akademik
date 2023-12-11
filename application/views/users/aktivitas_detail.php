<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fa-solid fa-eye"></i> Detail Aktivitas Mahasiswa
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
            <th>AKTIVITAS</th>
            <th>JENIS AKTIVITAS</th>
            <th>DESKRIPSI AKTIVITAS</th>
            <th>TANGGAL</th>
            <th>KETERANGAN</th>
        </tr>

        <?php $no = 1; foreach ($aktivitas as $akt) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $akt->aktivitas ?></td>
                <td><?php echo $akt->jenis_aktivitas ?></td>
                <td><?php echo $akt->deskripsi_aktivitas ?></td>
                <td><?php echo $akt->tanggal_aktivitas ?></td>
                <td><?php echo $akt->keterangan_aktivitas ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br><br><br><br>
</div>
