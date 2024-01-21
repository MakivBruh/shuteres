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
            <th><center>ID</center></th>
            <th width="180px"><center>JENIS MEDIA</center></th>
            <th><center>KERING ANGIN</center></th>
            <th><center>KAPASITAS LAPANG</center></th> 
            <th><center>TITIK LAYU PERMANEN</center></th>
            <th><center>AIR TANAH TERSEDIA</center></th>
            <th><center>BERAT JENIS</center></th>
            <th><center>POROSITAS</center></th>            
            <th width="130px"><center>AKSI</center></th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($media as $data) { ?>
        <tr class="odd gradeX">
            <td><?= $i; ?></td>            
            <td><center><?= $data->id ?></center></td>
            <td><?= $data->jenis_media ?></td>
            <td class="text-right"><?= $data->kering_angin ?> g</td>
            <td class="text-right"><?= $data->kapasitas_lapang ?> %</td>
            <td class="text-right"><?= $data->titik_layu_permanen ?> %</td>
            <td class="text-right"><?= $data->air_tanah_tersedia ?> %</td>
            <td class="text-right"><?= $data->berat_jenis ?> g/cm<sup>3</sup></td>
            <td class="text-right"><?= $data->porositas ?> %</td>            
            <td><center> 
                <a href="<?php echo base_url('media/update/'.$data->id) ?> " class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Update</a>

                <?php include('delete.php'); ?>

            </center></td>
        </tr>  
        <?php $i++; } ?>                                      
    </tbody>
</table>