<?= $this->extend("templates/cmsbase"); ?>

<?= $this->Section("title"); ?>
    <?= $page_title; ?>    
<?= $this->endSection(); ?>



<?= $this->Section("content"); ?>

<?= $this->include('partials/homepost'); ?>



       

        </div>
        <!-- /.row -->

        <hr>

        <?= $this->endSection(); ?>

 