<?= $this->extend("templates/cmsbase"); ?>

<?= $this->section('page_title');?>
<span>Welcome to <?= ucfirst($userdata->firstname) . ' '. ucfirst($userdata->lastname);?></span>
<?= $this->endsection();?>


<?= $this->Section("content"); ?>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-6">
            <h1>Edit Profile</h1>
            <?php if(isset($error)): ?>
            <div class="alert alert-danger"><?= $error; ?></div>
            <?php endif; ?>
            <?php if(session()->getTempdata('success')): ?>
            <div class="alert alert-success"><?= session()->getTempdata('success'); ?></div>
            <?php endif;?>

            <?php if(session()->getTempdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getTempdata('error'); ?></div>
            <?php endif;?>
            <?= form_open();?>
                <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" name="firstname" class="form-control" value="<?= $userdata->firstname; ?>">
                </div>
                <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" name="lastname" class="form-control" value="<?= $userdata->lastname; ?>">
                </div>
                <div class="form-group">
                    <label for="">Mobile</label>
                    <input type="text" name="mobile" class="form-control" value="<?= $userdata->mobile; ?>">
                </div>
                <div class="form-group">
                    <input type="submit" name="login" class="btn btn-primary" value="Update" >
                </div>
            <?= form_close();?>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>