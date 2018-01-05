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
                  <a href="#">Aktivitas</a>
               </li>
            </ol>
         </div>
         <h4 class="page-title">Aktivitas</h4>
      </div>
   </div>
</div>
<!-- end page title end breadcrumb -->
<div class="row">
   <div class="col-sm-12">
      <div class="card-box table-responsive">
         <h4 class="m-t-0 header-title">
            <b>
            </b>
         </h4>
         <table id="datatable" class="display table table-striped table-bordered">
            <thead>
               <tr>
                  <th>Keterangan</th>
                  <th>Username</th>
                  <th>Waktu</th>
               </tr>
            </thead>
            <tbody>
            </tbody>
         </table>
      </div>
   </div>
</div>
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
                        "url": '<?php echo base_url('jsonaktivitas'); ?>',
                        "type": "POST"
                    },
                    //Set column definition initialisation properties.
                    "columns": [
                        {"data": "ket"},
						{"data": "username"},
						{"data": "tgl"}
                    ],
   
                });
   	//TableManageButtons.init();
            });
   
        
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