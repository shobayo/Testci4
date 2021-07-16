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
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-6">
                <h1>Login</h1>
                <?php if(isset($error)): ?>
            <div class="alert alert-danger"><?= $error; ?></div>
            <?php endif; ?>
                <?php if(session()->getTempdata('error')):?>
                    <div id="hidemsg" class="alert alert-danger"><?= session()->getTempdata('error'); ?></div>
                <?php endif; ?>
                <?php if(session()->getTempdata('success')):?>
            <div id="hidemsg" class='alert alert-success'><?= session()->getTempdata('success');?></div>
            <?php endif; ?>

                <?= form_open();?>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" value="<?= set_value('email')?>">
                   
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">

                </div>
                <div class="form-group">
                    <input type="submit" name="login" class="btn btn-primary" value="Login" >
                    <a href="<?= base_url()?>/login/forgot_password">Forgot Password</a>
                </div>

                <?= form_close();?>
            </div>

        </div>


    </div>

<?= $this->endSection(); ?>