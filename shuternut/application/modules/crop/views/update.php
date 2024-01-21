<?php 
//Notifikasi kalau ada inpu error
	echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');

	//Form Open 
	echo form_open(base_url('crop/update/'.$crop->id));
?>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>ID</label>
            <input type="text" name="id" class="form-control" placeholder="ID Crop" value="<?php echo $crop->id ?>" readonly>
        </div>
        <div class="form-group">
            <label>Konstanta KC Awal</label>
            <input type="number" name="kc_awal" class="form-control" placeholder="Konstanta KC Awal" value="<?php echo $crop->kc_awal; ?>" required>
        </div>
        <div class="form-group">
            <label>KOnstanta KC Menengah</label>
            <input type="number" name="kc_tengah" class="form-control" placeholder="Konstanta KC Menengah" value="<?php echo $crop->kc_tengah ?>" required>
        </div>
        <div class="form-group">
            <label>Konstanta AC Akhir</label>
            <input type="number" name="kc_akhir" class="form-control" placeholder="Konstanta KC Akhir" value="<?php echo $crop->kc_akhir ?>" required>
        </div>        
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>Nama Crop</label>
            <input type="text" name="nama_crop" class="form-control" placeholder="Nama Crop" value="<?php echo $crop->nama_crop ?>" required>
        </div>
        <div class="form-group">
            <label>Periode Hari Awal</label>
            <input type="text" name="hr_awal" class="form-control" placeholder="Periode Hari Awal" value="<?php echo $crop->hr_awal; ?>" required>
        </div>
        <div class="form-group">
            <label>Periode Hari Menengah</label>
            <input type="text" name="hr_tengah" class="form-control" placeholder="Periode Hari Menengah" value="<?php echo $crop->hr_tengah ?>" required>
        </div>
        <div class="form-group">
            <label>Periode Hari Akhir</label>
            <input type="text" name="hr_akhir" class="form-control" placeholder="Periode Hari Akhir" value="<?php echo $crop->hr_akhir ?>" required>
        </div>  
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label>P Tabel</label>
            <input type="number" name="p" class="form-control" placeholder="Nama Crop" value="<?php echo $crop->p ?>" required>
        </div>
        <div class="form-group">
            <label>Jumlah Hari Periode Awal</label>
            <input type="text" name="j_awal" class="form-control" placeholder="Jumlah Hari Periode Awal" value="<?php echo $crop->j_awal; ?>" required>
        </div>
        <div class="form-group">
            <label>Jumlah Hari Periode Menengah</label>
            <input type="number" name="j_tengah" class="form-control" placeholder="Jumlah Hari Periode Menengah" value="<?php echo $crop->j_tengah ?>" required>
        </div>
        <div class="form-group">
            <label>Jumlah Hari Periode Akhir</label>
            <input type="number" name="j_akhir" class="form-control" placeholder="Jumlah Hari Periode Akhir" value="<?php echo $crop->j_akhir ?>" required>
        </div>  
    </div>    
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group text-center">
            <input type="submit" name="submit" class="btn btn-success" value="Update Data">
            <a href="<?php echo base_url('crop') ?> " class="btn btn-default"> Back</a>
        </div>
    </div>
</div>
<?php 
	//Form Close
	echo form_close();
?>