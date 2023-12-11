<nav class="navbar navbar-light bg-warning text-dark">
    
  <div class="container-fluid">
    <?php foreach ($identitas as $id) : ?>
    <a class="navbar-brand"><strong><?php echo $id->judul_website ?></strong></a>
    <?php endforeach; ?>
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
      <button class="btn btn-outline-primary ml-2" type="submit">Login</button>
    </form>

    <?php foreach ($identitas as $id) : ?>
    <span class="small"><?php echo $id->alamat ?> - <?php echo $id->email ?> - <?php echo $id->telp ?></span>
    <?php endforeach; ?>
  </div>
</nav>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link ml-3" aria-current="page" href="#">BERANDA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ml-3" href="#tentang_kampus">TENTANG KAMPUS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ml-3" href="#informasi">INFORMASI</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link ml-3" href="#">FASILITAS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ml-3" href="#">GALLERY</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link ml-3" href="#kontak">KONTAK</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>

<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url('assets/img/slider1.jpg') ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url('assets/img/slider2.jpg') ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url('assets/img/slider3.jpg') ?>" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>



<div class="card text-center m-5" id="tentang_kampus">
  <div class="card-header">
    <strong>TENTANG KAMPUS</strong>
  </div>
  <div class="card-body">
    <p class="card-text">
    <?php foreach($tentang as $ttg) : ?>
  <?php echo word_limiter($ttg->sejarah, 75) ?>
  <?php endforeach; ?>
    </p>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Selengkapnya
</button>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tentang Kampus</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-justify">
        <strong>SEJARAH UNIVERSITAS NEGERI MEDAN PSIK 22 B</strong><br>
      <?php foreach($tentang as $ttg) : ?>
  <?php echo $ttg->sejarah ?>
  <?php endforeach; ?><br><br>

  <strong>VISI UNIVERSITAS NEGERI MEDAN PSIK 22 B</strong><br>
      <?php foreach($tentang as $ttg) : ?>
  <?php echo $ttg->visi ?>
  <?php endforeach; ?><br><br>

  <strong>MISI UNIVERSITAS NEGERI MEDAN PSIK 22 B</strong><br>
      <?php foreach($tentang as $ttg) : ?>
  <?php echo $ttg->misi ?>
  <?php endforeach; ?><br><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="row m-4 text-center" id="informasi">

<?php foreach($informasi as $info) : ?>

<div class="card m-3" style="width: 18rem;">
  <span class="display-2 text-center text-info"><i class="<?php echo $info->icon ?>"></i></span>
  <div class="card-body">
    <h5 class="card-title badge badge-info"><?php echo $info->judul_informasi ?></h5>
    <p class="card-text"><?php echo $info->isi_informasi ?></p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>
<?php endforeach; ?>
</div>

<form method="post" action="<?php echo base_url('landing_page/kirim_pesan') ?>">

  <div class="row m-4" id="kontak">
    <div class="col-md-8">
      <div class="alert alert-primary">
        <i class="fas fa-envelope-open-text"></i> HUBUNGI KAMI
      </div>

      <?php echo $this->session->flashdata('pesan') ?>

      <div class="form-group">
        <label for="">Nama</label>
        <input type="text" name="nama" class="form-control">
        <?php echo form_error('nama', '<div class ="text-danger small">','</div>') ?>
      </div>

      <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="email" class="form-control">
        <?php echo form_error('email', '<div class ="text-danger small">','</div>') ?>
      </div>

      <div class="form-group">
        <label for="">Pesan</label>
        <textarea type="text" name="pesan" class="form-control" id="" cols="30" rows="10"></textarea>
        <?php echo form_error('pesan', '<div class ="text-danger small">','</div>') ?>
      </div>

<button type="submit" class="btn btn-primary">Kirim</button>
    </div>

  </div>

</form>
