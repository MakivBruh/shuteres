
<!-- Button trigger modal -->
<p><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-money"></i> Biaya
</button></p>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Biaya Nutrisi Pertanaman</h4>
            </div>
            <div class="modal-body">
                
                <table class="table table-striped table-bordered table-hover table-responsive">
                        <thead>
                            <tr>                                     
                                <th><center>NAMA PUPUK</th>                            
                                <th><center>JUMLAH</th>
                                <th><center>HARGA</th>
                                <th><center>TOTAL</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data2 as $r) : ?>
                            <tr class="odd gradeX">
                                <td><?= $r->nama_pupuk ?></td>                            
                                <td class="text-right"><?= $r->jumlah ?> g</td>
                                <td class="text-right"><?= ($r->harga_pupuk) ? 'Rp '.$r->harga_pupuk.' ,-' : ' -'; ?></td>
                                <td class="text-right"><?= ($r->total) ? 'Rp '.$r->total.' ,-' : ' -'; ?></td>
                            </tr>
                              
                            <?php endforeach; ?>                                      
                        </tbody>                        
                    </table>  
                                              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

