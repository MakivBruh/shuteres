<?php 

	
	//Form Open 
	echo form_open(base_url('kalkulasi/hitung'));
?>
<div class="col-md-6">
	<div class="form-group">
		<label>Lokasi</label>
		<select name="id_lokasi" class="form-control">
			<!-- <option value="">-- Pilih Lokasi --</option> -->
			<?php foreach($lokasi as $d) { ?>
			<option value="<?php echo $d->id ?>"><?php echo $d->id ?> - <?php echo $d->nama_lokasi ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label>Media</label>
		<select name="id_media" class="form-control">
			<!-- <option value="">-- Pilih Media --</option> -->
			<?php foreach($media as $d) { ?>
			<option value="<?php echo $d->id ?>"><?php echo $d->id ?> - <?php echo $d->jenis_media ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label>Wadah</label>
		<select name="id_wadah" class="form-control">
			<!-- <option value="">-- Pilih Wadah --</option> -->
			<?php foreach($wadah as $d) { ?>
			<option value="<?php echo $d->id ?>"><?php echo $d->id ?> - <?php echo $d->wadah ?></option>
			<?php } ?>
		</select>
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label>Crop</label>
		<select name="id_crop" class="form-control">
			<!-- <option value="">-- Pilih Crop --</option> -->
			<?php foreach($crop as $d) { ?>
			<option value="<?php echo $d->id ?>"><?php echo $d->id ?> - <?php echo $d->nama_crop ?></option>
			<?php } ?>
		</select>
	</div>
	<!-- <?php input_select('id_crop', 'Crop', $options_crop, $selected = '', $required = '', $disabled = false); ?> -->
	
	<div class="form-group">
		<label>Suhu</label>
		<input type="number" name="suhu" id="suhu" class="form-control" placeholder="Masukkan Suhu" required>
	</div>

	<div class="form-group">
		<label>Kelembaban</label>
		<input type="number" name="kelembaban" id="kelembaban" class="form-control" placeholder="Masukkan Kelembaban" required>
	</div>	
</div>

<div class="col-md-12">	
	<div class="form-group">
		<center>		
			<input type="submit" name="submit" class="btn btn-success" value="Hitung"> &nbsp;
			<input type="reset" name="reset" class="btn btn-dafault" value="Reset"> 
		</center>	
	</div>
</div>
<?php 
	//Form Close
	echo form_close();
?>