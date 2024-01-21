<?php 
//Notifikasi kalau ada inpu error
	echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');

	//Form Open 
	echo form_open(base_url('lokasi/update/'.$lokasi->id));
?>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>ID Lokasi</label>
            <input type="text" name="id" class="form-control" placeholder="ID Lokasi" value="<?php echo $lokasi->id ?>" readonly>
        </div>
        <div class="form-group">
            <label>Nama Lokasi</label>
            <input type="text" name="nama_lokasi" class="form-control" placeholder="Nama Lokasi" value="<?php echo $lokasi->nama_lokasi ?>" required>
        </div>
        
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Konstanta ET Suhu</label>
            <input type="number" name="et_suhu" class="form-control" placeholder="Konstanta ET Suhu" value="<?php echo $lokasi->et_suhu ?>" required>
        </div>
        <div class="form-group">
            <label>Konstanta ET Kelembaban</label>
            <input type="number" name="et_lembab" class="form-control" placeholder="Konstanta ET Kelembaban" value="<?php echo $lokasi->et_lembab ?>" required>
        </div>                                                     
    </div> 
    <div class="col-md-12">
        <div class="form-group">
            <label>Keterangan Lokasi</label>
            <textarea name="ket_lokasi" class="form-control" placeholder="Keterangan Lokasi"><?php echo $lokasi->ket_lokasi ?></textarea>
        </div>
    </div>   
</div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group text-center">
                <input type="submit" name="submit" class="btn btn-success" value="Update Data">
                <a href="<?php echo base_url('lokasi') ?> " class="btn btn-default"> Back</a>
            </div>
        </div>
    </div>
<?php 
	//Form Close
	echo form_close();
?>