<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fa-solid fa-eye"></i> Detail UKT Mahasiswa 
    </div>

    <table class="table table-hover table-bordered table-striped">
        <?php foreach ($profil_mahasiswa as $dt) : ?>

            <img class="mb-4 " src="<?php echo base_url('assets/uploads/') . $dt->photo ?>" style="width: 20%;" alt="">
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
        $no = 1;
        foreach ($ukt_belum_lunas as $bill) :
        ?>
            <div class="card col-sm-4 mx-auto" style="width: 20rem;">
                <div class="card-header">
                    UKT MAHASISWA
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>JENIS UKT :</strong> <?= $bill->jenis_ukt ?>
                    </li>
                    <li class="list-group-item">
                        <strong>TOTAL UKT :</strong> <?= "Rp. " . $bill->total_ukt ?>
                    </li>
                    <li class="list-group-item">
                        <strong>STATUS :</strong> <?php echo $bill->status_ukt; ?>
                    </li>
                    <li class="list-group-item">
                        <strong>TENGGAT UKT :</strong> <?php echo $bill->tenggat_ukt; ?>
                    </li>
                </ul>
                <div class="d-flex gap-2 ml-3">

                    <td class="ml-3" width=20px><?php echo anchor('administrator/ukt/edit_ukt/' . $bill->id_ukt, '<div class="btn btn-sm btn-primary"><i class = "fa fa-edit"> </i></div>') ?></td>
                    <td width="20px">
                        <?php echo anchor(
                            'administrator/ukt/hapus_ukt/' . $bill->id_ukt,
                            '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>',
                            array('onclick' => "return confirm('Apakah Anda yakin ingin menghapus tagihan ini?')")
                        ) ?>
                    </td>
                </div>
            </div>

        <?php
            $no++;

        endforeach; ?>

    </div>
    <div class="space-between">
        <?php  ?>
        <?php echo anchor('administrator/ukt', '<div class="btn btn-sm btn-primary">Kembali</div>') ?>

    </div>
    <br><br><br><br>
</div>
