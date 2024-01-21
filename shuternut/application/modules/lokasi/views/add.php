
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
                <h4 class="modal-title" id="myModalLabel">Form Tambah Data Lokasi</h4>
            </div>
            <div class="modal-body">
                <?php 
                    //Notifikasi kalau ada inpu error
                     echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');

                    //Form Open 
                    echo form_open(base_url('lokasi'));
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ID Lokasi</label>
                            <input type="text" name="id" class="form-control" placeholder="ID Lokasi" value="<?php echo set_value('id') ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Lokasi</label>
                            <input type="text" name="nama_lokasi" class="form-control" placeholder="Nama Lokasi" value="<?php echo set_value('nama_lokasi') ?>" required>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Konstanta ET Suhu</label>
                            <input type="number" name="et_suhu" class="form-control" placeholder="Konstanta ET Suhu" value="<?php echo set_value('et_suhu') ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Konstanta ET Kelembaban</label>
                            <input type="number" name="et_lembab" class="form-control" placeholder="Konstanta ET Kelembaban" value="<?php echo set_value('et_lembab') ?>" required>
                        </div>                                             
                    </div>
                    <div class="col-md-12" align="center">
                        <div class="form-group">
                            <label>Keterangan Lokasi</label>
                            <textarea name="ket_lokasi" class="form-control" placeholder="Keterangan Lokasi"><?php echo set_value('ket_lokasi'); ?></textarea>
                        </div>

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

