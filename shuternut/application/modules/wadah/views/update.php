<?php 
//Notifikasi kalau ada inpu error
	echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');

	//Form Open 
	echo form_open(base_url('wadah/update/'.$wadah->id));
?>

<div class="row">
    <div class="col-md-6">                        
        <div class="form-group">
            <label>Ukuran Wadah</label>
            <input type="text" name="wadah" class="form-control"  placeholder="Ukuran Wadah" value="<?= $wadah->wadah ?>" required>
        </div>
        <div class="form-group">
            <label>Jumlah Lubang</label>
            <input type="number" name="jml_lubang" class="form-control"  placeholder="Jumlah Lubang" value="<?= $wadah->jml_lubang?>" required>
        </div>
        <div class="form-group">
            <label>Luas Permukaan</label>
            <input type="number" name="luas_permukaan" class="form-control"  placeholder="Luas Permukaan" value="<?= $wadah->luas_permukaan?>" required>
        </div>
        <div class="form-group">
            <label>Bobot Tanah Kering Angin Perlubang</label>
            <input type="number" name="bbt_tnh_krg_angin_l" class="form-control"  placeholder="Bobot Tanah Kering Angin Perlubang" value="<?= $wadah->bbt_tnh_krg_angin_l ?>" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Bobot Tanah Kering Mutlak Perlubang</label>
            <input type="number" name="bbt_tnh_krg_mutlak_l" class="form-control"  placeholder="Bobot Tanah Kering Mutlak Perlubang" value="<?= $wadah->bbt_tnh_krg_mutlak_l ?>" required>
        </div>
        <div class="form-group">
            <label>Bobot Tanah Kering Mutlak Pertray</label>
            <input type="number" name="bbt_tnh_krg_angin_t" class="form-control"  placeholder="Bobot Tanah Kering Angin pertray" value="<?= $wadah->bbt_tnh_krg_angin_t ?>" >
        </div>
        <div class="form-group">
            <label>Bobot Tanah Kering Mutlak Pertray</label>
            <input type="number" name="bbt_tnh_krg_mutlak_t" class="form-control"  placeholder="Bobot Tanah Kering Mutlak pertray" value="<?= $wadah->bbt_tnh_krg_mutlak_t ?>" >
        </div>
        <div class="form-group">
            <label>Kadar Air Kapasitas Lapang Pertray</label>
            <input type="number" name="ka_kps_lpg_t" class="form-control"  placeholder="Kadar Air Kapasitas Lapang Pertray" value="<?= $wadah->ka_kps_lpg_t ?>" >
        </div>
    </div>  
</div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group text-center">
                <input type="submit" name="submit" class="btn btn-success" value="Update Data">
                <a href="<?php echo base_url('wadah') ?> " class="btn btn-default"> Back</a>
            </div>
        </div>
    </div>
<?php 
	//Form Close
	echo form_close();
?>