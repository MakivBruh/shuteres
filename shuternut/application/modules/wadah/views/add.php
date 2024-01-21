
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
                    echo form_open(base_url('wadah'));
                ?>
                <div class="row">
                    <div class="col-md-6">                        
                        <div class="form-group">
                            <label>Ukuran Wadah</label>
                            <input type="text" name="wadah" class="form-control"  placeholder="Ukuran Wadah" value="<?= set_value('wadah')?>" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Lubang</label>
                            <input type="number" name="jml_lubang" class="form-control"  placeholder="Jumlah Lubang" value="<?= set_value('jml_lubang')?>" required>
                        </div>
                        <div class="form-group">
                            <label>Luas Permukaan</label>
                            <input type="number" name="luas_permukaan" class="form-control"  placeholder="Luas Permukaan" value="<?= set_value('luas_permukaan')?>" required>
                        </div>
                        <div class="form-group">
                            <label>Bobot Tanah Kering Angin Perlubang</label>
                            <input type="number" name="bbt_tnh_krg_angin_l" class="form-control"  placeholder="Bobot Tanah Kering Angin Perlubang" value="<?= set_value('bbt_tnh_krg_angin_l')?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Bobot Tanah Kering Mutlak Perlubang</label>
                            <input type="number" name="bbt_tnh_krg_mutlak_l" class="form-control"  placeholder="Bobot Tanah Kering Mutlak Perlubang" value="<?= set_value('bbt_tnh_krg_mutlak_l')?>" required>
                        </div>
                        <div class="form-group">
                            <label>Bobot Tanah Kering Mutlak Pertray</label>
                            <input type="number" name="bbt_tnh_krg_angin_t" class="form-control"  placeholder="Bobot Tanah Kering Angin pertray" value="<?= set_value('bbt_tnh_krg_angin_t')?>">
                        </div>
                        <div class="form-group">
                            <label>Bobot Tanah Kering Mutlak Pertray</label>
                            <input type="number" name="bbt_tnh_krg_mutlak_t" class="form-control"  placeholder="Bobot Tanah Kering Mutlak pertray" value="<?= set_value('bbt_tnh_krg_mutlak_t')?>">
                        </div>
                        <div class="form-group">
                            <label>Kadar Air Kapasitas Lapang Pertray</label>
                            <input type="number" name="ka_kps_lpg_t" class="form-control"  placeholder="Kadar Air Kapasitas Lapang Pertray" value="<?= set_value('ka_kps_lpg_t')?>">
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

