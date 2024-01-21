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
            <th><center>NAMA</center></th>
            <th><center>USERNAME</center></th> 
            <th><center>AKSES LEVEL</center></th>                   
            <th width="130px"><center>AKSI</center></th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($user as $data) { ?>
        <tr class="odd gradeX">
            <td><?= $i; ?></td>            
            <td><center><?= $data->nama ?></center></td>
            <td><?= $data->username ?></td>
            <td><?= $data->akses_level ?></td>
            <td><center> 
                <a href="<?php echo base_url('user/update/'.$data->id_user) ?> " class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Update</a>

                <?php include('delete.php'); ?>

            </center></td>
        </tr>  
        <?php $i++; } ?>                                      
    </tbody>
</table>