<div class="container-fluid">

<div class="alert alert-success">
    <i class="fas fa-comment-dots"></i> FORM BALAS PESAN USER
</div>

<?php foreach($hubungi as $hub) : ?>

    <form method = "post" action="<?php echo base_url('administrator/hubungi_kami/kirim_email_aksi') ?>">

    <div class="form-group">
        <label for="">Email</label>
        <input type="hidden" name="id_hubungi" value="<?php echo $hub->id_hubungi ?>">
        <input type="text" name="email" class="form-control" value="<?php echo $hub->email ?>" readonly>
    </div>

    <div class="form-group">
        <label for="">Subject</label>
        <input type="text" name="subject" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="">Pesan</label>
        <textarea type="text" class="form-control" name="pesan" id="" cols="30" rows="5"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Kirim</button>
    </form>

<?php endforeach; ?>

</div>