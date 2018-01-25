<!-- Page-Title -->
<div class="row">
   <div class="col-sm-12">
      <div class="page-title-box">
         <div class="btn-group pull-right">
            <ol class="breadcrumb hide-phone p-0 m-0">
               <li>
                  <a style="cursor: pointer;" onclick="pindah('pilih');">Beranda</a>
               </li>
               <li>
                  <a href="#">Akses</a>
               </li>
            </ol>
         </div>
         <h4 class="page-title">Akses</h4>
      </div>
   </div>
</div>
<!-- end page title end breadcrumb -->
<div class="row">
   <div class="col-sm-12">
      <div class="card-box table-responsive">
         <h4 class="m-t-0 header-title">
            <b>
            <button onclick="tambah()" class="btn btn-custom waves-effect waves-light m-b-5">
            <span class="ion-ios7-plus-empty"></span></button>
            </b>
         </h4>
         <table id="datatable" class="display table table-striped table-bordered">
            <thead>
               <tr>
                  <th>Akses</th>
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
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- init -->
<script src="<?php echo base_url();?>assets/pages/jquery.datatables.init.js"></script>
<script type="text/javascript">
   var table;
   var simpan;
   
            $(document).ready(function() {
                //datatables
                table = $('#datatable').DataTable({
   		//keys: true,
                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    "order": [], //Initial no order.
                    // Load data for the table's content from an Ajax source
                    "ajax": {
                        "url": '<?php echo base_url('jsonakses'); ?>',
                        "type": "POST"
                    },
                    //Set column definition initialisation properties.
                    "columns": [
                        {"data": "akses"},
   			{"data": "action"}
                    ],
   
                });
   	//TableManageButtons.init();
            });
   
   function tambah() {
   simpan = 'tambah';
   $('#form')[0].reset(); // reset form on modals
   $('#myModal').modal('show'); // show bootstrap modal
   $("#modalbody").load("<?php echo base_url();?>modalakses/",function(data){
        $("#modalbody").html(data);
     });
   /*$("#form").on('submit',(function(e) {
   e.preventDefault();
   $.ajax({
          url: "<?php echo base_url();?>addakses",
          type: "POST",
          data:  new FormData(this),
          contentType: false,
          cache: false,
          processData:false,
          success: function(data)
            {
     $('#myModal').modal('hide');
     swal("Sukses!", "", "success")
              table.ajax.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal("Error", "", "error");
            }
         });
   return false;
   }));*/
   }
   function ganti(id) {
    simpan = 'update';
    $('#form')[0].reset(); // reset form on modals
   $('#myModal').modal('show'); // show bootstrap modal
   $("#modalbody").load("<?php echo base_url();?>editakses/"+id,function(data){
        $("#modalbody").html(data);
     });
   /*$("#form").on('submit',(function(e) {
   e.preventDefault();
   $.ajax({
          url: "<?php echo base_url();?>updateakses",
          type: "POST",
          data:  new FormData(this),
          contentType: false,
          cache: false,
          processData:false,
          success: function(data)
            {
     $('#myModal').modal('hide');
     swal("Sukses!", "", "success")
              table.ajax.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal("Error", "", "error");
            }
         });
   }));*/
   }
   $("#form").on('submit',(function(e) {
   e.preventDefault();
   var url;
      if(simpan == 'tambah')
      {
          url = "<?php echo base_url();?>addakses";
      }
      else
      {
        url = "<?php echo base_url();?>updateakses";
      }
   $.ajax({
          url: url,
          type: "POST",
          data:  new FormData(this),
          contentType: false,
          cache: false,
          processData:false,
          success: function(data)
            {
     $('#myModal').modal('hide');
     swal("Sukses!", "", "success")
              table.ajax.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal("Error", "", "error");
            }
         });
   return false;
   }));
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
   		url : "<?php echo site_url('deleteakses')?>/"+id,
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
		<script>
		var myVar;
		$(window).on('load',function(){
			myVar = setInterval(alertFunc, 15 * 60 * 1000);
		});
		function alertFunc() {
			$.ajax({
		  type: "POST",
		  url: "<?php echo base_url('checkses')?>",
		  success: function(data){
		     if (data == 1) {

		     } else {
		     	alert("Sesi Masuk Habis");
					window.location.href="<?php echo base_url();?>login";
		     }
		  }
		  });
		}
		</script>