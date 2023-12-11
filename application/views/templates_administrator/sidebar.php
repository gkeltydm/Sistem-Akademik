<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                <i class="fas fa-university"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SIAKAD</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('administrator/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-university"></i>
                    <span>Akademik</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sub-Menu Akademik:</h6>
                        <a class="collapse-item" href="<?php echo base_url('administrator/jurusan') ?>">Jurusan</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/prodi') ?>">Program Studi</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/matakuliah') ?>">Mata Kuliah</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/mahasiswa') ?>">Mahasiswa</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/tahun_akademik') ?>">Tahun Akademik</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/krs') ?>">KRS</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/nilai/input_nilai') ?>">Input Nilai</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/nilai') ?>">KHS</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/transkrip_nilai') ?>">Cetak Transkip</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/dosen') ?>">Dosen</a>
                    </div>
                </div>
            </li>

            
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fa-solid fa-coins"></i>
                    <span>Keuangan</span>   
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sub-Menu keuangan:</h6>
                        <a class="collapse-item" href="<?php echo base_url('administrator/tagihan') ?>">Tagihan</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/beasiswa') ?>">Beasiswa</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/ukt') ?>">UKT</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/potongan') ?>">Potongan</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                    aria-expanded="true" aria-controls="collapseFour">
                    <i class="fa-solid fa-list-check"></i>
                    <span>Manajemen Aktivitas</span>   
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sub-Menu Manajemen:</h6>
                        <a class="collapse-item" href="<?php echo base_url('administrator/aktivitas') ?>">Aktivitas dan Prestasi</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/pelanggaran') ?>">Riwayat Pelanggaran</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/surat') ?>">Surat Perkuliahan</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/konseling') ?>">Konseling</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/program_pmm') ?>">Program PMM</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMahasiswa"
        aria-expanded="true" aria-controls="collapseMahasiswa">
        <i class="fas fa-university"></i>
        <span>Pendaftaran</span>
    </a>
    <div id="collapseMahasiswa" class="collapse" aria-labelledby="headingMahasiswa"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Sub-Menu Pendaftaran:</h6>
            <a class="collapse-item"
                href="<?php echo base_url('administrator/pendaftaran_online') ?>">Pendaftaran Online</a>
            <!-- <a class="collapse-item"
                href="<?php echo base_url('administrator/cetak_kartu_ujian') ?>">Cetak Kartu Ujian</a>
            <a class="collapse-item"
                href="<?php echo base_url('administrator/Informasi_Kelulusan') ?>">Informasi Kelulusan</a>
            </div> -->
    </div>
</li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Pengaturan</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sub_Menu Pengaturan:</h6>
                        <a class="collapse-item" href="<?php echo base_url('administrator/users') ?>">User</a>
                        <!-- <a class="collapse-item" href="utilities-border.html">Menu</a> -->
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Info Kampus</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sub_Menu Info Kampus:</h6>
                        <a class="collapse-item" href="<?php echo base_url('landing_page') ?>">Website</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/identitas') ?>">Indentitas</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/hubungi_kami') ?>">Pesan User</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/informasi') ?>">Informasi Kampus</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/tentang_kampus') ?>">Tentang Kampus</a>
                        <!-- <a class="collapse-item" href="blank.html">Fasilitas</a>
                        <a class="collapse-item" href="404.html">Materi Perkuliahan</a>
                        <a class="collapse-item" href="blank.html">Gallery</a>
                        <a class="collapse-item" href="blank.html">Kontak</a> -->
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('administrator/auth/logout') ?>">
                <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url('administrator/auth/logout') ?>">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>