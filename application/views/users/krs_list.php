<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-university"></i> Kartu Rencana Studi (KRS)</div>

<center class="mb-4">
    <legend class="mt-3"><strong>KARTU RENCANA STUDI</strong></legend>


<table>
    <tr>
        <td><strong>NIM</strong></td>
        <td>&nbsp;: <?php echo $nim ?></td>
    </tr>

    <tr>
        <td><strong>Nama Lengkap</strong></td>
        <td>&nbsp;: <?php echo $nama_lengkap ?></td>
    </tr>

    <tr>
        <td><strong>Program Studi</strong></td>
        <td>&nbsp;: <?php echo $prodi ?></td>
    </tr>

    <tr>
        <td><strong>Tahun Akademik (Semester)</strong></td>
        <td>&nbsp;: <?php echo $tahun_akademik.'&nbsp;('.$semester.')' ?></td>
    </tr>
</table>
</center>
<table class="table table-bordered table-hover table-striped ">
    <tr>
        <th>NO</th>
        <th>KODE MATA KULIAH</th>
        <th>NAMA MATA KULIAH</th>
        <th>SKS</th>

    </tr>
    <?php
    $no = 1;
    $jumlahSks = 0;
    foreach($krs_data as $krs) : ?>

        <tr>
            <td width ="20px"><?php echo $no++ ?></td>
            <td><?php echo $krs->kode_matakuliah ?></td>
            <td><?php echo $krs->nama_matakuliah ?></td>
            <td>
                <?php echo $krs->sks; $jumlahSks+=$krs->sks; ?></td>
        </tr>

    <?php endforeach; ?>

    <tr>
            <td colspan="3"><strong>Jumlah SKS</strong></td>
            <td colspan ="3"><strong><?php echo$jumlahSks; ?></strong></td>
        </tr>

</table>
</div>