<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?></title>

    <!-- Core CSS - Include with every page -->
    <link href="<?= base_url(); ?>assets/sb-admin-v2/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/sb-admin-v2/font-awesome/css/font-awesome.css" rel="stylesheet">

    

    <!-- SB Admin CSS - Include with every page -->
    <link href="<?= base_url(); ?>assets/sb-admin-v2/css/sb-admin.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Input Username dan Password</h3>
                    </div>
                    <div class="panel-body">

                    <?php 
                    //Notifikasi kalau ada inpu error
                    echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');

                    //Notifikasi
                    if($this->session->flashdata('sukses')){
                        echo '<div class="alert alert-warning"><i class="fa fa-check"></i> ';
                        echo $this->session->flashdata('sukses');
                        echo '</div>';
                    }
                    ?>

                        <form role="form" method="post" action="<?php echo base_url('login') ?>">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <center>
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="<?= base_url(); ?>" class="btn btn-lg btn-warning">Kembali</a>
                                <input type="submit" name="submit" class="btn btn-lg btn-success" value="Login">
                                </center>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="<?= base_url(); ?>assets/sb-admin-v2/jsjquery-1.10.2.js"></script>
    <script src="<?= base_url(); ?>assets/sb-admin-v2/jsbootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/sb-admin-v2/jsplugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="<?= base_url(); ?>assets/sb-admin-v2/jssb-admin.js"></script>

</body>

</html>
