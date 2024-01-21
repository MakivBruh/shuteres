
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
                <h4 class="modal-title" id="myModalLabel">Form Tambah Data Crop</h4>
            </div>
            <div class="modal-body">
                <?php 
                    //Notifikasi kalau ada inpu error
                     echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');

                    //Form Open 
                    echo form_open(base_url('crop'));
                ?>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>ID crop</label>
                            <input type="text" name="id" class="form-control"  placeholder="ID Crop" value="<?= set_value('id')?>" required>
                        </div>
                        <div class="form-group">
                            <label>Konstanta KC Awal</label>
                            <input type="number" name="kc_awal" class="form-control"  placeholder="Konstanta KC Awal" value="<?= set_value('kc_awal')?>" required>
                        </div>
                        <div class="form-group">
                            <label>Konstanta KC Menengah</label>
                            <input type="number" name="kc_tengah" class="form-control"  placeholder="Konstanta KC Tengah" value="<?= set_value('kc_tengah')?>" required>
                        </div>
                        <div class="form-group">
                            <label>Konstanta KC Akhir</label>
                            <input type="number" name="kc_akhir" class="form-control"  placeholder="Konstanta KC Akhir" value="<?= set_value('kc_akhir')?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nama crop</label>
                            <input type="text" name="nama_crop" class="form-control"  placeholder="Nama Crop" value="<?= set_value('nama_crop')?>" required>
                        </div>
                        <div class="form-group">
                            <label>Periode Hari Awal</label>
                            <input type="text" name="hr_awal" class="form-control"  placeholder="Periode Hari Awal" value="<?= set_value('hr_awal')?>" required>
                        </div>
                        <div class="form-group">
                            <label>Periode Hari Menengah</label>
                            <input type="text" name="hr_tengah" class="form-control"  placeholder="Periode Hari Tengah" value="<?= set_value('hr_tengah')?>" required>
                        </div>
                        <div class="form-group">
                            <label>Periode Hari Awal</label>
                            <input type="text" name="hr_akhir" class="form-control"  placeholder="Periode Hari Akhir" value="<?= set_value('hr_akhir')?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>p Tabel</label>
                            <input type="number" name="p" class="form-control"  placeholder="p Tabel" value="<?= set_value('p')?>" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Hari Awal</label>
                            <input type="text" name="j_awal" class="form-control"  placeholder="Jumlah Periode Hari Awal" value="<?= set_value('j_awal')?>" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Hari Menengah</label>
                            <input type="number" name="j_tengah" class="form-control"  placeholder="Jumlah Periode Hari Tengah" value="<?= set_value('j_tengah')?>" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Hari Awal</label>
                            <input type="number" name="j_akhir" class="form-control"  placeholder="Jumlah Periode Hari Akhir" value="<?= set_value('j_akhir')?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
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

