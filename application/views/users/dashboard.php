<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-gauge-high"></i> Dashboard
</div>

<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Selamat Datang!</h4>
  <p>Selamat Datang <strong><?php echo $mahasiswa->nama_lengkap; ?></strong> di Sistem Informasi Akademik Universitas Negeri Medan Ilmu Komputer 22 B, Anda Login sebagai <strong><?php echo $level; ?></strong>  </p>
<hr>
  <!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="fa-solid fa-gears"></i> Control Panel
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-solid fa-gears"></i> Control Panel</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url('users/mahasiswa') ?>"><p class = "nav-link small text-info">MAHASISWA</p><i class="fa-solid fa-3x fa-graduation-cap"></i></a>
                
            </div>

            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url('users/krs') ?>"><p class = "nav-link small text-info">KRS</p><i class="fa-solid fa-3x fa-edit"></i></a>
               
            </div>

            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url('users/nilai') ?>"><p class = "nav-link small text-info">KHS</p><i class="fa-solid fa-3x fa-file-alt"></i></a>

            </div>

            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url('users/transkrip_nilai') ?>"><p class = "nav-link small text-info">CETAK TRANSKRIP</p><i class="fa-solid fa-3x fa-print"></i></a>

            </div>
        </div><hr>

            <div class="row">
            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url() ?>"><p class = "nav-link small text-info">TAGIHAN</p><i class="fa-solid fa-3x fa-coins"></i></a>
            </div>

            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url() ?>"><p class = "nav-link small text-info">BEASISWA</p><i class="fa-solid fa-3x fa-book"></i></a>
            </div>

            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url() ?>"><p class = "nav-link small text-info">AKTIVITAS</p><i class="fa-solid fa-3x fa-id-card-alt"></i></a>
            </div>

            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url() ?>"><p class = "nav-link small text-info">RIWAYAT</p><i class="fa-solid fa-3x fa-clock-rotate-left"></i></a>
                
            </div>


           </div><hr>
            <div class="row">
            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url('landing_page') ?>"><p class = "nav-link small text-info">WEBSITE</p><i class="fa-solid fa-3x fa-list-ul"></i></a>
                
            </div>

            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url('landing_page#informasi') ?>"><p class = "nav-link small text-info">INFO KAMPUS</p><i class="fa-solid fa-3x fa-bullhorn"></i></a>
                
            </div>

            <div class="col-md-3 text-info text-center">
                <a href="<?php echo base_url('landing_page#tentang_kampus') ?>"><p class = "nav-link small text-info">TENTANG KAMPUS</p><i class="fa-solid fa-3x fa-info-circle"></i></a>
                
            </div>

            <div class="col-md-3 text-info text-center">
                  <a href="<?php echo base_url('landing_page#kontak') ?>"><p class = "nav-link small text-info">KONTAK</p><i class="fa-solid fa-3x fa-id-card-alt"></i></a>
                  
              </div>

        </div><hr>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>