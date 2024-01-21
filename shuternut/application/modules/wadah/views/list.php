<?php
//Proteksi Halaman
if($this->session->userdata('akses_level') == ""){
    $this->session->set_flashdata('sukses', 'Silakan login dahulu');
    redirect(base_url('login'),'refresh');
}
?>

<?php 
    include('add.php');
?>

<?php 
    //Notifikasi
    if($this->session->flashdata('sukses')){
        echo '<div class="alert alert-success"><i class="fa fa-check"></i> ';
        echo $this->session->flashdata('sukses');
        echo '</div>';
    }
?>

<table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
    <thead>
        <tr>
            <th><center>#</center></th>            
            <th width="80px"><center>WADAH</center></th>
            <th><center>LUAS PERMUKAAN</center></th>
            <th><center>BOBOT KERING ANGIN (LUBANG)</center></th>
            <th><center>BOBOT KERING MUTLAK (LUBANG)</center></th> 
            <th><center>BOBOT KERING ANGIN (TRAY)</center></th>
            <th><center>BOBOT KERING MUTLAK (TRAY)</center></th>            
            <th width="130px"><center>AKSI</center></th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($wadah as $data) { ?>
        <tr class="odd gradeX">
            <td><?= $i; ?></td>            
            <td><?= $data->wadah ?></td>
            <td class="text-right"><?= $data->luas_permukaan ?> cm<sup>2</sup></td>
            <td class="text-right"><?= $data->bbt_tnh_krg_angin_l ?> g</td>
            <td class="text-right"><?= $data->bbt_tnh_krg_mutlak_l ?> g</td>
            <td class="text-right"><?= ($data->bbt_tnh_krg_angin_t) ? $data->bbt_tnh_krg_angin_t.' g':''; ?></td>
            <td class="text-right"><?= ($data->bbt_tnh_krg_mutlak_t) ? $data->bbt_tnh_krg_mutlak_t.' g':''; ?></td>            
            <td><center> 
                <a href="<?php echo base_url('wadah/update/'.$data->id) ?> " class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Update</a>

                <?php include('delete.php'); ?>

            </center></td>
        </tr>  
        <?php $i++; } ?>                                      
    </tbody>
</table>