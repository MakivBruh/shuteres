
<!-- Button trigger modal -->
<p><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-plus"></i> Tambah Data
</button></p>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Form Tambah Data Nutrisi</h4>
            </div>
            <div class="modal-body">
                <?php 
                    //Notifikasi kalau ada inpu error
                     echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');

                    //Form Open 
                    echo form_open(base_url('nutrisi'));
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
                            <label>Pupuk</label>
                            <select name="pupuk_id" class="form-control">
                                <!-- <option value="">-- Pilih Crop --</option> -->
                                <?php foreach($pupuk as $d) { ?>
                                <option value="<?php echo $d->id ?>"><?php echo $d->kode ?> - <?php echo $d->nama_pupuk ?></option>
                                <?php } ?>
                            </select>
                        </div>
                                       
                    </div>                    
                    
                    <div class="col-md-6">
                         <div class="form-group">
                            <label>Larutan Stock</label>
                            <input type="number" name="larutan_stock" class="form-control" placeholder="Larutan Stock" value="<?php echo set_value('larutan_stock') ?>" required>
                        </div> 
                        <div class="form-group">
                            <label>Komponen</label>
                           <select name="komponen" class="form-control">
                               <option value="A">A</option>
                               <option value="B">B</option>
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

