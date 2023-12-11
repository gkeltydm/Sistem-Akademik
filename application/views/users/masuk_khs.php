<div class="container-fluid">

<div class="alert alert-success" role="alert">
<i class="fa-solid fa-university"></i> Form Masuk Halaman KHS
</div>

<form method="post" action="<?php echo base_url('users/nilai/nilai_aksi') ?>">

<?php echo $this->session->flashdata('pesan') ?>

<div class="form-group">
    <input type="hidden" name="nim" class="form-control" value="<?php echo $nim ?>">
</div>

<div class="form-group">
    <label for="">Tahun Akademik / Semester</label>
    <?php $query = $this->db->query('SELECT id_thn_akad, semester, CONCAT(tahun_akademik,"/") AS thn_semester FROM tahun_akademik'); 
    
    $dropdowns = $query->result();
    foreach($dropdowns as $dropdown){
    if($dropdown->semester ==  1){
        $tampilSemester = "Ganjil";

    }

    else{
        $tampilSemester = "Genap";
    }

    $dropDownList[$dropdown->id_thn_akad] = $dropdown->thn_semester. " " .$tampilSemester;

}

echo form_dropdown('id_thn_akad',$dropDownList,'','class="form-control" id="id_thn_akad"');

    ?>
</div>

<button type="submit" class="btn btn-primary">Proses</button>

</form>



</div>