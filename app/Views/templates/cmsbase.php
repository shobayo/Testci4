<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $this->renderSection("title");?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url(); ?>/public/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>/public/assets/css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url(); ?>/homesignup">Signup</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?= base_url(); ?>/homesignup">Home</a>
                    </li>

                    <?php if(session()->has("logged_user") || session()->has("google_user")):?>
                        
                    <?= $this->section('page_title'); ?>
                    <span><?= ucfirst($userdata->firstname) . ' '. ucfirst($userdata->lastname) ;?></span>
                    <?= $this->endsection();?>
                    

                        <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?= $this->renderSection('page_title');?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li>
                        <a href="<?= base_url()?>/dashboard">Dashboard</a>
                    </li>
                    <li>
                        <a href="<?= base_url()?>/dashboard/edit">Edit Profile</a>
                    </li>
                    <li>
                        <a href="<?= base_url()?>/dashboard/avatar">Upload Picture</a>
                    </li>
                    <li>
                        <a href="<?= base_url()?>/dashboard/logout">Logout</a>
                    </li>
                    </ul>

                    <?php else: ?>

                    </li>

                    <li>
                        <a href="<?= base_url(); ?>/signup">Register</a>
                    </li>
                     <li>
                        <a href="<?= base_url(); ?>/login">Login</a>
                    </li>
                    <?php endif;?>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <?= $this->renderSection("content"); ?>

           <!-- Footer -->
           <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?= base_url(); ?>/public/assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url(); ?>/public/assets/js/bootstrap.min.js"></script>

</body>

</html>
