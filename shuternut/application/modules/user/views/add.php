
<!-- Button trigger modal -->
<p><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-plus"></i> Tambah Data
</button></p>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Form Tambah Data User</h4>
            </div>
            <div class="modal-body">
                <?php 
                    //Notifikasi kalau ada inpu error
                     echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');

                    //Form Open 
                    echo form_open(base_url('user'));
                ?>
                
                 <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                         <div class="form-group">
                            <label>Nama User</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama User" value="<?php echo set_value('nama') ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username') ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required>
                        </div>                       
                    </div>
                    <div class="col-md-3"></div>
                </row>
                    <div class="col-md-12" align="center">
                        <input type="submit" name="submit" class="btn btn-success" value="Save Data">
                        <input type="reset" name="reset" class="btn btn-default" value="Reset">
                    </div>
                 </div>                                  
            </div>

            <?php 
                //Form Close
                echo form_close();
            ?>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

