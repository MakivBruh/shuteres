                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="<?= base_url(); ?>assets/sb-admin-v2/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?= base_url(); ?>assets/sb-admin-v2/js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="<?= base_url(); ?>assets/sb-admin-v2/js/sb-admin.js"></script>

    
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>
    
    <script>
    $(document).ready(function() {
        $('#dataTables-example1').dataTable({
            "paging" : false,
            "ordering" : false,
            "info"  : false,
            "search" : false
        });
    });
    </script>
    

    <!-- Page-Level Demo Scripts - Notifications - Use for reference -->
    <script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

    // popover demo
    $("[data-toggle=popover]")
        .popover()
    </script>

    

</body>

</html>
