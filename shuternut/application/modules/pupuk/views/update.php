<?php 
//Notifikasi kalau ada inpu error
	echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');

	//Form Open 
	echo form_open(base_url('pupuk/update/'.$pupuk->id));
?>

<div class="row">
    <div class="col-md-6">
         <div class="form-group">
            <label>Kode Pupuk</label>
            <input type="text" name="kode" class="form-control" placeholder="Kode Pupuk" value="<?php echo $pupuk->kode ?>" required>
        </div>
        <div class="form-group">
            <label>Nama Pupuk</label>
            <input type="text" name="nama_pupuk" class="form-control" placeholder="Nama Pupuk" value="<?php echo $pupuk->nama_pupuk ?>" required>
        </div>                       
    </div>
    <div class="col-md-6">
         <div class="form-group">
            <label>Kemasan</label>
            <input type="number" name="kemasan" class="form-control" placeholder="Kemasan" value="<?php echo $pupuk->kemasan ?>">
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga_pupuk" class="form-control" placeholder="Harga" value="<?php echo $pupuk->harga_pupuk ?>">
        </div>                        
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group text-center">
            <input type="submit" name="submit" class="btn btn-success" value="Update Data">
            <a href="<?php echo base_url('pupuk') ?> " class="btn btn-default"> Back</a>
        </div>
    </div>
</div>
<?php 
	//Form Close
	echo form_close();
?>