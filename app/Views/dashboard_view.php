<?= $this->extend("templates/cmsbase"); ?>

<?= $this->Section("page_title"); ?>
<?php if(session()->has('google_user')):
$uinfo = session()->get('google_user');
?>
<span><?= $uinfo['first_name']; ?> <?= $uinfo['last_name'];?></span>
<?php else: ?>
<span><?= ucfirst($userdata->firstname) . ' '. ucfirst($userdata->lastname); ?></span>

<?php endif; ?>
<?= $this->endSection(); ?>



<?= $this->Section("content"); ?>

<div class="container">
    <div class="row">
    <div class="col-md-12">
            <?php if(session()->getTempdata('success')): ?>
            <div class="alert alert-success"><?= session()->getTempdata('success'); ?></div>
            <?php endif;?>

            <?php if(session()->getTempdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getTempdata('error'); ?></div>
            <?php endif;?>
            <?php if($userdata->profile_pic != ''): ?>
                <img src="<?= $userdata->profile_pic;?>" height="60" alt="">
            <?php else: ?>
                <img src="<?= base_url()?>/public/assets/images/avatar.png" height="60" alt="">
            <?php endif; ?>
            <h1>Welcome <?= ucfirst($userdata->firstname) . ' '. ucfirst($userdata->lastname)  ;?> to CodeIgniter4</h1>
            <h4>Mobile: <?= $userdata->mobile;?></h4>
            <h4>Email: <?= $userdata->email;?></h4>
            <h4>Gender: <?= $userdata->gender;?></h4>
            <a class="btn btn-primary" href="<?= base_url(); ?>/logout">Logout<span class="glyphicon glyphicon-chevron-right"></span> </a>
            <p><br></p>
        </div>
        <br>
        <h4>Login Activity</h4>
                <?php if(count($login_info)>0):?>
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Login Time</th>
                            <th>Logout Time</th>
                            <th>User Agent</th>
                            <th>IP Address</th>
                        </tr>
                        <?php foreach($login_info as $info): ?>
                        <tr>
                            <td><?= $info->id;?></td>
                            <td><?= date("l dS M Y h:i:s a", strtotime($info->login_time));?></td>
                            <?php if($info->logout_time == "0000-00-00 00:00:00"): ?>
                                <td><?= 'Current Login'?></td>
                            <?php else:?>
                                <td><?= date("l dS M Y h:i:s a", strtotime($info->logout_time));?></td>
                            <?php endif; ?>
                            <td><?= $info->agent;?></td>
                            <td><?= $info->ip;?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else:?>
                    <h5>Sorry no Login information</h5>
                <?php endif; ?>

    </div>
    </div>
</div>


<?= $this->endSection(); ?>