<?php  
//Dapatkan id user yang didaftarkan saat login
$id_user    = $this->session->userdata('id_user');
$user_aktif = $this->user_model->detail($id_user);
?>



<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">SHUTTERNUT</a>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">

    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i>  
            <?php if($this->session->userdata('akses_level') == "Admin") { ?>
            <?= $user_aktif->nama ?>
            <?php } ?>
            <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
        <?php if($this->session->userdata('akses_level') == "Admin") { ?>
            <li><a href="<?= base_url('login/logout'); ?>"><i class="fa fa-unlock fa-fw"></i> Logout</a></li>
        <?php } else { ?>
            <li><a href="<?= base_url('login'); ?>"><i class="fa fa-lock fa-fw"></i> Login</a></li>
        <?php } ?>        
        </ul>        
    </li>   
</ul>
     