<?php 
//Notifikasi kalau ada inpu error
	echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');

	//Form Open 
	echo form_open(base_url('media/update/'.$media->id));
?>

<div class="row">
    <div class="col-md-6">
         <div class="form-group">
            <label>ID Media</label>
            <input type="text" name="id" class="form-control" placeholder="ID Media" value="<?php echo $media->id ?>" readonly>
        </div>
        <div class="form-group">
            <label>Jenis Media</label>
            <input type="text" name="jenis_media" class="form-control" placeholder="Jenis Media" value="<?php echo $media->jenis_media ?>" required>
        </div>
        <div class="form-group">
            <label>Kering Angin</label>
            <input type="number" name="kering_angin" class="form-control" placeholder="Kering Angin" value="<?php echo $media->kering_angin ?>" required>
        </div>
        <div class="form-group">
            <label>Kapasitas Lapang</label>
            <input type="number" name="kapasitas_lapang" class="form-control" placeholder="Kapasitas Lapang" value="<?php echo $media->kapasitas_lapang ?>" required>
        </div>
    </div>
    <div class="col-md-6">
         <div class="form-group">
            <label>Titik Layu Permanen</label>
            <input type="number" name="titik_layu_permanen" class="form-control" placeholder="Titik Layu Permanen" value="<?php echo $media->titik_layu_permanen ?>" required>
        </div>
        <div class="form-group">
            <label>Air Tanah Tersedia</label>
            <input type="number" name="air_tanah_tersedia" class="form-control" placeholder="Air Tanah Tersedia" value="<?php echo $media->air_tanah_tersedia ?>" required>
        </div>
        <div class="form-group">
            <label>Berat Jenis</label>
            <input type="number" name="berat_jenis" class="form-control" placeholder="Berat Jenis" value="<?php echo $media->berat_jenis ?>" required>
        </div>
        <div class="form-group">
            <label>Porositas</label>
            <input type="number" name="porositas" class="form-control" placeholder=Porositas" value="<?php echo $media->porositas ?>" required>
        </div>
    </div>       
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group text-center">
            <input type="submit" name="submit" class="btn btn-success" value="Update Data">
            <a href="<?php echo base_url('media') ?> " class="btn btn-default"> Back</a>
        </div>
    </div>
</div>
<?php 
	//Form Close
	echo form_close();
?>