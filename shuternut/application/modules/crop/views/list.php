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
            <th>#</th>
            <th>ID</th>
            <th>NAMA CROP</th>            
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($crop as $data) { ?>
        <tr class="odd gradeX">
            <td  width="30px"><?= $i; ?></td>
            <td><center><?= $data->id ?></center></td>
            <td><?= $data->nama_crop ?></td>            
            <td width="200px"><center> 
                <a href="<?php echo base_url('crop/update/'.$data->id) ?> " class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Update</a>

                <?php include('delete.php'); ?>

            </center></td>
        </tr>  
        <?php $i++; } ?>                                      
    </tbody>
</table>