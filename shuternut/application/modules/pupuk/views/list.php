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
            <th><center>KODE</center></th>
            <th><center>NAMA PUPUK</center></th> 
            <th><center>KEMASAN</center></th>
            <th><center>HARGA PUPUK</center></th>                      
            <th width="130px"><center>AKSI</center></th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($pupuk as $data) { ?>
        <tr class="odd gradeX">
            <td><?= $i; ?></td>            
            <td><center><?= $data->kode ?></center></td>
            <td><?= $data->nama_pupuk ?></td>
            <td class="text-right"><?= ($data->kemasan) ? $data->kemasan.' g':' -'; ?></td>
            <td class="text-right"><?= ($data->harga_pupuk) ? 'Rp '.$data->harga_pupuk.' ,-' : ' -'; ?></td>       
            <td><center> 
                <a href="<?php echo base_url('pupuk/update/'.$data->id) ?> " class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Update</a>

                <?php include('delete.php'); ?>

            </center></td>
        </tr>  
        <?php $i++; } ?>                                      
    </tbody>
</table>