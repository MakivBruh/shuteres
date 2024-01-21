
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
                <h4 class="modal-title" id="myModalLabel">Form Tambah Data Karakter Tanah</h4>
            </div>
            <div class="modal-body">
                <?php 
                    //Notifikasi kalau ada inpu error
                     echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');

                    //Form Open 
                    echo form_open(base_url('karakter'));
                ?>
                
                 <div class="row">
                    <div class="col-md-6">
                         <div class="form-group">
                            <label>Crop</label>
                            <select name="crop_id" class="form-control">
                                <!-- <option value="">-- Pilih Crop --</option> -->
                                <?php foreach($crop as $d) { ?>
                                <option value="<?php echo $d->id ?>"><?php echo $d->id ?> - <?php echo $d->nama_crop ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Lokasi</label>
                            <select name="lokasi_id" class="form-control">
                                <!-- <option value="">-- Pilih Lokasi --</option> -->
                                <?php foreach($lokasi as $d) { ?>
                                <option value="<?php echo $d->id ?>"><?php echo $d->id ?> - <?php echo $d->nama_lokasi ?></option>
                                <?php } ?>
                            </select>
                        </div>                   
                    </div>                    
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Media</label>
                            <select name="media_id" class="form-control">
                                <!-- <option value="">-- Pilih Media --</option> -->
                                <?php foreach($media as $d) { ?>
                                <option value="<?php echo $d->id ?>"><?php echo $d->id ?> - <?php echo $d->jenis_media ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Wadah</label>
                            <select name="wadah_id" class="form-control">
                                <!-- <option value="">-- Pilih Wadah --</option> -->
                                <?php foreach($wadah as $d) { ?>
                                <option value="<?php echo $d->id ?>"><?php echo $d->id ?> - <?php echo $d->wadah ?></option>
                                <?php } ?>
                            </select>
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

