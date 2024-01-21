   <p><a href="<?php echo base_url('karakter') ?> " class="btn btn-default"><i class="fa fa-refresh"></i> Back</a></p>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>#</th>
                <th><center>CROP</center></th>
                <th><center>JENIS MEDIA</center></th>
                <!-- <th><center>LUAS PERMUKAAN</center></th> -->                 
                <th><center>BOBOT TANAH KERING ANGIN PERLUBANG</th>
                <th><center>BOBOT TANAH KERING MUTLAK PERLUBANG</th>
                <th><center>BOBOT TANAH KERING ANGIN PERTRAY</th>
                <th><center>BOBOT TANAH KERING MUTLAK PERTRAY</th>
                <th><center>KADAR AIR KERING ANGIN PERTRAY</th>
                <th><center>KADAR AIR KERING ANGIN PERLUBANG</th>
                <th><center>KADAR AIR KAPASITAS LAPANG PERLUBANG</th>
                <th><center>KADAR AIR KAPASITAS LAPANG PERTRAY</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach($karakter as $data) { ?>
            <tr class="odd gradeX">
                <td><?= $i; ?></td>                            
                    <td><center><?= $data->crop_id ?></center></td>
                    <td width="180px"><?= $data->jenis_media ?></td>
                    <!-- <td class="text-right"><?= $data->luas_permukaan ?> cm<sup>2</sup></td> -->
                    <td class="text-right"><?= $data->bbt_tnh_krg_angin_l ?> g</td>
                    <td class="text-right"><?= $data->bbt_tnh_krg_mutlak_l ?> g</td>
                    <td class="text-right"><?= ($data->bbt_tnh_krg_angin_t) ? $data->bbt_tnh_krg_angin_t.' g':' -'; ?></td>                
                    <td class="text-right"><?= ($data->bbt_tnh_krg_mutlak_t) ? $data->bbt_tnh_krg_mutlak_t.' g':' -'; ?></td> 
                    <td class="text-right"><?= ($data->ka_krg_angin_t) ? $data->ka_krg_angin_t.' g':' -'; ?></td>
                    <td class="text-right"><?= $data->ka_krg_angin_l ?> ml</td>
                    <td class="text-right"><?= $data->ka_kps_lpg_l ?> ml</td>
                    <td class="text-right"><?= ($data->ka_kps_lpg_t) ? $data->ka_kps_lpg_t.' g' : ' -'; ?></td> 
            </tr>  
            <?php $i++; } ?>                                      
        </tbody>
    </table>
            