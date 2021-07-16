<?= $this->extend("templates/cmsbase"); ?>

<?= $this->section('page_title');?>
<span><?= ucfirst($userdata->firstname) . ' '. ucfirst($userdata->lastname) ;?></span>
<?= $this->endsection();?>

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
        <div class="row">
            <div class="col-ml-12">

    <?php if(isset($validation)): ?>
    <div class="alert alert-danger"><?= $validation->listErrors(); ?></div>
    <?php endif;?>

    <?php if(session()->getTempdata('success')): ?>
    <div id="hidemsg" class="alert alert-success"><?= session()->getTempdata('success'); ?></div>
    <?php endif;?>

    <?php if(session()->getTempdata('error')): ?>
    <div id="hidemsg" class="alert alert-danger"><?= session()->getTempdata('error'); ?></div>
    <?php endif;?>

            <h3>Upload Avatar</h3>
    <?=form_open_multipart();?>
        <div class="form-group">
         <input type="file" name="picture" multiple="multiple">
        </div>
        <div class="form-group">
        <input type="submit" value="Upload" name="upload" class='btn btn-primary'>
        </div>
    <?=form_close();?>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>