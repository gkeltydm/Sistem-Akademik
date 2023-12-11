<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman PHP dengan CSS</title>
    
    <!-- Memanggil file CSS -->
    <link rel="stylesheet" href="assets\css\sb-admin-2.css">
</head>
<body>
<!-- Bagian 1: Surat Keterangan Aktif Kuliah -->
<div class="card mb-3">
    <div class="card-header">
        <h4>1. Surat Keterangan Aktif Kuliah
            <!-- Tombol Download Template -->
            <a href="<?= base_url('administrator/surat/download_template/' . urlencode(url_title('surat_keterangan_aktif_kuliah'))); ?>" class="btn btn-success float-end">
            <i class="fa-solid fa-download"></i>
        </a>
        </h4>
    </div>
    <div class="card-body">
    <p>
    Surat Keterangan Aktif Kuliah berfungsi sebagai bukti resmi dari institusi pendidikan yang menyatakan bahwa seorang mahasiswa terdaftar dan aktif dalam menjalani proses pendidikan. 
    </p>    
    </div>
</div>

<!-- Bagian 2: Surat Keterangan Berkelakuan Baik -->
<div class="card mb-3">
    <div class="card-header">
        <h4>2. Surat Keterangan Berkelakuan Baik
            <!-- Tombol Download Template -->
            <a href="<?= base_url('administrator/surat/download_template/' . urlencode(url_title('surat_keterangan_berkelakuan_baik'))); ?>" class="btn btn-success float-end">
            <i class="fa-solid fa-download"></i>
        </a>
        </h4>
    </div>
    <div class="card-body">
        <p>
            Surat Keterangan Berkelakuan Baik adalah dokumen resmi yang diterbitkan oleh institusi pendidikan atau otoritas yang berwenang untuk menyatakan bahwa seseorang, umumnya seorang mahasiswa, telah menunjukkan perilaku positif dan patuh terhadap norma-norma sosial dan peraturan di lingkungan akademis.
        </p>
    </div>
</div>


<!-- Bagian 3: Surat Rekomendasi Beasiswa -->
<div class="card mb-3">
    <div class="card-header">
        <h4>3. Surat Rekomendasi Beasiswa
            <!-- Tombol Download Template -->
        <a href="<?= base_url('administrator/surat/download_template/' . urlencode(url_title('surat_rekomendasi_beasiswa'))); ?>" class="btn btn-success float-end">
            <i class="fa-solid fa-download"></i>
        </a>
        </h4>
    </div>
    <div class="card-body">
    <p>
    Surat rekomendasi beasiswa adalah dokumen tertulis yang memberikan evaluasi positif tentang kualifikasi, prestasi, dan karakter calon penerima beasiswa.
    </p>
    </div>
</div>
</body>
</html>