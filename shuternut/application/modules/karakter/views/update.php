<?php 
//Notifikasi kalau ada inpu error
	echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');

	//Form Open 
	echo form_open(base_url('karakter/update/'.$karakter->id));
    // var_dump($karakter);
    // die();
   
?>

<div class="row">
   <div class="col-md-6">
         <div class="form-group">
            <label>Crop</label>
            <select name="crop_id" class="form-control">
                <!-- <option value="">-- Pilih Crop --</option> -->
                <?php foreach($crop as $crop) { ?>
                <option value="<?php echo $crop->id ?>"
                    <?php if($karakter->crop_id == $crop->id) { echo "selected"; } ?>
                    ><?php echo $crop->id ?> - <?php echo $crop->nama_crop ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Lokasi</label>
            <select name="lokasi_id" class="form-control">
                <!-- <option value="">-- Pilih Lokasi --</option> -->
                <?php foreach($lokasi as $lokasi) { ?>
                <option value="<?php echo $lokasi->id ?>"
                    <?php if($karakter->lokasi_id == $lokasi->id) { echo "selected"; } ?>
                    ><?php echo $lokasi->id ?> - <?php echo $lokasi->nama_lokasi ?></option>
                <?php } ?>
            </select>
        </div>                   
    </div>                    
    
    <div class="col-md-6">
        <div class="form-group">
            <label>Media</label>
            <select name="media_id" class="form-control">
                <!-- <option value="">-- Pilih Media --</option> -->
                <?php foreach($media as $media) { ?>
                <option value="<?php echo $media->id ?>"
                    <?php if($karakter->media_id == $media->id) { echo "selected"; } ?>
                    ><?php echo $media->id ?> - <?php echo $media->jenis_media ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Wadah</label>
            <select name="wadah_id" class="form-control">
                <!-- <option value="">-- Pilih Wadah --</option> -->
                <?php foreach($wadah as $wadah) { ?>
                <option value="<?php echo $wadah->id ?>"
                    <?php if($karakter->wadah_id == $wadah->id) { echo "selected"; } ?>
                    ><?php echo $wadah->id ?> - <?php echo $wadah->wadah ?></option>
                <?php } ?>
            </select>
        </div>               
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group text-center">
            <input type="submit" name="submit" class="btn btn-success" value="Update Data">
            <a href="<?php echo base_url('karakter') ?> " class="btn btn-default"> Back</a>
        </div>
    </div>
</div>
<?php 
	//Form Close
	echo form_close();
?>