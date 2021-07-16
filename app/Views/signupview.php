<?php
$page_session = \CodeIgniter\Config\Services::session();
?>

<?= $this->extend("templates/cmsbase"); ?>

<?= $this->Section("content"); ?>

<script>
    setTimeout(function(){
        $("hidemsg").hide();
    },3000);
</script>

<style>
    .text-danger{color:red;}
</style>

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <h1>Signup</h1>
                <?php if(isset($validation)): ?>
                    <div class="alert alert-danger"><?= $validation->listErrors(); ?></div>
                 <?php endif; ?>

                <?php if($page_session->getTempdata('success')):?>
                    <div id="hidemsg" class="alert alert-success"><?= $page_session->getTempdata('success'); ?></div>
                <?php endif; ?>

                <?php if($page_session->getTempdata('error')):?>
                    <div id="hidemsg" class="alert alert-danger"><?= $page_session->getTempdata('error'); ?></div>
                <?php endif; ?>

                <?= form_open();?>
                <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" name="firstname" class="form-control" value="<?= set_value('firstname'); ?>">
                </div>
                <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" name="lastname" class="form-control" value="<?= set_value('lastname'); ?>">
                </div>
                <div class="form-group">
                <label for="">Gender </label>
                    <select name="gender" id="gender">
                    <option value='Male'>Male</option>
                    <option value='Female'>Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control"value="<?= set_value('email'); ?>">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" name="confirm password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Mobile Number</label>
                    <input type="text" name="mobile" class="form-control"value="<?= set_value('mobile'); ?>">
                </div>
                <div class="form-group">
                    <input type="submit" name="register" class="btn btn-primary" value="Submit" >
                </div>

                <?= form_close();?>
            </div>

        </div>


    </div>

<?= $this->endSection(); ?>