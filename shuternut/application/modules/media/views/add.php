
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
                <h4 class="modal-title" id="myModalLabel">Form Tambah Data Media</h4>
            </div>
            <div class="modal-body">
                <?php 
                    //Notifikasi kalau ada inpu error
                     echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');

                    //Form Open 
                    echo form_open(base_url('media'));
                ?>
                
                 <div class="row">
                    <div class="col-md-6">
                         <div class="form-group">
                            <label>ID Media</label>
                            <input type="text" name="id" class="form-control" placeholder="ID Media" value="<?php echo set_value('id') ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Media</label>
                            <input type="text" name="jenis_media" class="form-control" placeholder="Jenis Media" value="<?php echo set_value('jenis_media') ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Kering Angin</label>
                            <input type="number" name="kering_angin" class="form-control" placeholder="Kering Angin" value="<?php echo set_value('kering_angin') ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Kapasitas Lapang</label>
                            <input type="number" name="kapasitas_lapang" class="form-control" placeholder="Kapasitas Lapang" value="<?php echo set_value('kapasitas_lapang') ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                            <label>Titik Layu Permanen</label>
                            <input type="number" name="titik_layu_permanen" class="form-control" placeholder="Titik Layu Permanen" value="<?php echo set_value('titik_layu_permanen') ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Air Tanah Tersedia</label>
                            <input type="number" name="air_tanah_tersedia" class="form-control" placeholder="Air Tanah Tersedia" value="<?php echo set_value('air_tanah_tersedia') ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Berat Jenis</label>
                            <input type="number" name="berat_jenis" class="form-control" placeholder="Berat Jenis" value="<?php echo set_value('berat_jenis') ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Porositas</label>
                            <input type="number" name="porositas" class="form-control" placeholder=Porositas" value="<?php echo set_value('porositas') ?>" required>
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

