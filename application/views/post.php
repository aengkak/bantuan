<!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li>
                                        <a href="<?php echo base_url();?>">Beranda</a>
                                    </li>
                                    <li>
                                        <a href="#">Post</a>
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">Post</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title">
								<b>
								<a href="<?php echo base_url();?>addpost" class="btn btn-custom waves-effect waves-light m-b-5">
									<span class="ion-ios7-plus-empty"></span></a>
								</b>
							</h4>

                            <table id="datatable" class="display table table-striped table-bordered">
                                <thead>
									<tr>
										<th>Judul</th>
										<th>User</th>
										<th>Tanggal</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
                            </table>
                        </div>
                    </div>
                </div>

				<!-- sample modal content -->
                            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Form</h4>
                                        </div>
										<form class="form-horizontal" role="form" id="form">
                                        <div class="modal-body" id="modalbody">
                                        </div>
                                        <div class="modal-footer" id="loading">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                                        </div>
										</form>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

	<!-- init -->
        <script src="<?php echo base_url();?>assets/pages/jquery.datatables.init.js"></script>
	<script type="text/javascript">
			var table;
 
            $(document).ready(function() {
                //datatables
                table = $('#datatable').DataTable({
					//keys: true,
                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    "order": [], //Initial no order.
                    // Load data for the table's content from an Ajax source
                    "ajax": {
                        "url": '<?php echo base_url('jsonpost'); ?>',
                        "type": "POST"
                    },
                    //Set column definition initialisation properties.
                    "columns": [
                        {"data": "judul"},
						{"data": "username"},
						{"data": "tgl"},
						{"data": "action"}
                    ],
 
                });
				//TableManageButtons.init();
            });
	  function hapus(id) {
		  swal({
                title: "Yakin Menghapus?",
                text: "Data akan dihapus",
                type: "error",
                showCancelButton: true,
                confirmButtonClass: 'btn-danger waves-effect waves-light',
                confirmButtonText: "Ya",
                closeOnConfirm: false
            }, function () {
				$.ajax({
					url : "<?php echo site_url('deletepost')?>/"+id,
					type: "POST",
					dataType: "JSON",
					success: function(data)
					{
						table.ajax.reload();
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
						swal("Error", "", "error");
					}
				});
                swal("Sukses!", "", "success");
            });
	  }
        </script>