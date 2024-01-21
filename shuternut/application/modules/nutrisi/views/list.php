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
            <th><center>CROP</center></th>
            <th><center>KOMPONEN</center></th>
            <th><center>CODE</center></th>                 
            <th><center>NAMA PUPUK</th>
            <th><center>LARUTAN STOCK (100.000 L)</th>
            <th><center>LARUTAN APLIKASI</th>
            <th><center>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach($nutrisi as $data) { ?>
        <tr class="odd gradeX">
            <td><?= $i; ?></td>
            <td><?= $data->nama_crop ?></td>
            <td><?= $data->komponen ?></td>
            <td><?= $data->kode ?></td>
            <td><?= $data->nama_pupuk ?></td>
            <td class="text-right"><?= $data->larutan_stock ?> mg</td>
            <td class="text-right"><?= $data->larutan_aplikasi ?> mg/L</td>         
            <td width="200px"><center>
                
                <a href="<?php echo base_url('nutrisi/update/'.$data->id) ?> " class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Update</a>

                <?php include('delete.php'); ?>


            </center></td>
        </tr>  
        <?php $i++; } ?>                                      
    </tbody>
</table>