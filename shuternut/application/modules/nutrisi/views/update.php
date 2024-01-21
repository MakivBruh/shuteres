<?php 
//Notifikasi kalau ada inpu error
	echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');

	//Form Open 
	echo form_open(base_url('nutrisi/update/'.$nutrisi->id));

?>

<div class="row">
         <div class="col-md-6">
             <div class="form-group">
                <label>Crop</label>
                <select name="crop_id" class="form-control">
                    <!-- <option value="">-- Pilih Crop --</option> -->
                    <?php foreach($crop as $crop) { ?>
                    <option value="<?php echo $crop->id ?>"
                        <?php if($nutrisi->crop_id == $crop->id) { echo "selected"; } ?>
                        ><?php echo $crop->id ?> - <?php echo $crop->nama_crop ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Pupuk</label>
                <select name="pupuk_id" class="form-control">
                    <!-- <option value="">-- Pilih Crop --</option> -->
                    <?php foreach($pupuk as $pupuk) { ?>
                    <option value="<?php echo $pupuk->id ?>"
                    <?php if($nutrisi->pupuk_id == $pupuk->id) { echo "selected"; } ?>
                        ><?php echo $pupuk->kode ?> - <?php echo $pupuk->nama_pupuk ?></option>
                    <?php } ?>
                </select>
            </div>
                           
        </div>                    
        
        <div class="col-md-6">
             <div class="form-group">
                <label>Larutan Stock</label>
                <input type="number" name="larutan_stock" class="form-control" placeholder="Larutan Stock" value="<?php echo $nutrisi->larutan_stock ?>" required>
            </div> 
            <div class="form-group">
                <label>Komponen</label>
               <select name="komponen" class="form-control">
                   <option value="A" <?php if($nutrisi->komponen == "A") { echo "selected"; } ?>>A</option>
                   <option value="B" <?php if($nutrisi->komponen == "B") { echo "selected"; } ?>>B</option>
               </select>
            </div>            
        </div>  
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group text-center">
            <input type="submit" name="submit" class="btn btn-success" value="Update Data">
            <a href="<?php echo base_url('nutrisi') ?> " class="btn btn-default"> Back</a>
        </div>
    </div>
</div>
<?php 
	//Form Close
	echo form_close();
?>