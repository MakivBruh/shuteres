<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete<?php echo $data->id ?>"><i class="fa fa-trash-o"></i> Delete
</button>
<!-- Modal -->
<div class="modal fade" id="Delete<?php echo $data->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Hapus Data Lokasi : <?php echo $data->id ?></h4>
            </div>
            <div class="modal-body">
                <p class="alert alert-danger"><i class="fa fa-warning"></i> Yakin ingin menghapus data ini : <?php echo $data->nama_lokasi ?></p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url('lokasi/delete/'.$data->id) ?> " class="btn btn-danger"><i class="fa fa-trash-o"></i> Hapus Data</a>
                <a href="<?php echo base_url('lokasi/update/'.$data->id) ?> " class="btn btn-warning"><i class="fa fa-edit"></i> Update Data</a>
                <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->