<div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="<?= base_url('kalkulasi'); ?>"><i class="fa fa-building-o fa-fw"></i> Kalkulasi</a>
                        </li>

                        <?php if($this->session->userdata('akses_level') == "Admin") { ?>

                        <li>
                            <a href="#"><i class="fa fa-archive fa-fw"></i> Master<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?= base_url('user'); ?>"><i class="fa fa-user"></i> User</a></li>
                                <li><a href="<?= base_url('lokasi'); ?>"><i class="fa fa-map-marker"></i> Lokasi</a></li>
                                <li><a href="<?= base_url('crop'); ?>"><i class="fa fa-leaf"></i> Crop</a></li>
                                <li><a href="<?= base_url('wadah'); ?>"><i class="fa fa-flask"></i> Wadah</a></li>
                                <li><a href="<?= base_url('media'); ?>"><i class="fa fa-inbox"></i> Media</a></li>
                                <li><a href="<?= base_url('pupuk'); ?>"><i class="fa fa-square"></i> Pupuk</a></li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-book fa-fw"></i> Data<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?= base_url('karakter'); ?>"><i class="fa fa-pencil-square-o"></i> Karakter Tanah</a></li>
                                <li><a href="<?= base_url('nutrisi');?>"><i class="fa fa-bar-chart-o"></i> Nutrisi</a></li>                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php } ?>
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?= $title; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?= $title2; ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           