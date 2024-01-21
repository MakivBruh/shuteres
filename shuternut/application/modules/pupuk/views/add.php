
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
                <h4 class="modal-title" id="myModalLabel">Form Tambah Data Pupuk</h4>
            </div>
            <div class="modal-body">
                <?php 
                    //Notifikasi kalau ada inpu error
                     echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');

                    //Form Open 
                    echo form_open(base_url('pupuk'));
                ?>
                
                 <div class="row">
                    <div class="col-md-6">
                         <div class="form-group">
                            <label>Kode Pupuk</label>
                            <input type="text" name="kode" class="form-control" placeholder="Kode Pupuk" value="<?php echo set_value('kode') ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Pupuk</label>
                            <input type="text" name="nama_pupuk" class="form-control" placeholder="Nama Pupuk" value="<?php echo set_value('nama_pupuk') ?>" required>
                        </div>                       
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                            <label>Kemasan</label>
                            <input type="number" name="kemasan" class="form-control" placeholder="Kemasan" value="<?php echo set_value('kemasan') ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="harga_pupuk" class="form-control" placeholder="Harga" value="<?php echo set_value('harga_pupuk') ?>" required>
                        </div>                        
                    </div>
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

