<!-- Footer -->
<footer class="footer text-right">
   <div class="container">
      <div class="row">
         <div class="col-xs-12 text-center">
            © <?php echo date("Y");?>. All rights reserved.
         </div>
      </div>
   </div>
</footer>
<!-- End Footer -->
</div>
</div>
<!-- sample modal content -->
<div id="modalpass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalpassLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalpassLabel">Form</h4>
         </div>
         <form class="form-horizontal" role="form" id="formpass">
            <div class="modal-body" id="modalbody">
               <div class="form-group">
                  <label class="col-md-2 control-label">Password Lama</label>
                  <div class="col-md-10">
                     <input class="form-control" name="lama" type="password" placeholder="******" required>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-2 control-label">Password Baru</label>
                  <div class="col-md-10">
                     <input class="form-control" id="baru1" name="password" type="password" placeholder="******" required>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-2 control-label">Ulangi Password Baru</label>
                  <div class="col-md-10">
                     <input class="form-control" id="baru2" name="baru" type="password" placeholder="******" required>
                  </div>
               </div>
            </div>
            <div class="modal-footer" id="loading">
               <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
               <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
            </div>
         </form>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- jQuery  -->
<script src="<?php echo base_url();?>assets/js/detect.js"></script>
<script src="<?php echo base_url();?>assets/js/fastclick.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.blockUI.js"></script>
<script src="<?php echo base_url();?>assets/js/waves.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.slimscroll.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/switchery/switchery.min.js"></script>
<!-- Counter js  -->
<script src="<?php echo base_url();?>assets/plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/counterup/jquery.counterup.min.js"></script>
<!-- App js -->
<script src="<?php echo base_url();?>assets/js/jquery.core.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.app.js"></script>
<script>
	function gantipass() {
		$('#formpass')[0].reset();
		$("#modalpass").modal('show');
		$("#formpass").on('submit', (function (e) {
			e.preventDefault();
			$.ajax({
				url: "<?php echo base_url();?>cekpass",
				type: "POST",
				data: $('#formpass').serialize(),
				success: function (data) {
					if (data > 0) {
						if ($("#baru1").val() == $("#baru2").val()) {
								$.ajax({
									url: "<?php echo base_url();?>updatepass",
									type: "POST",
									data: $('#formpass').serialize(),
									success: function (data) {
										swal("Sukses!", "", "success");
										$("#modalpass").modal('hide');
									},
									error: function (jqXHR, textStatus, errorThrown) {}
								});
						} else {
							swal("Password baru tidak sama", "", "error");
						}
					} else {
						swal("Password Salah", "", "error");
					}
				},
				error: function (jqXHR, textStatus, errorThrown) {}
			});
		}));
	} 
</script>
<script>
function divisi(val) {
	$.get("<?php echo base_url();?>faq/"+val, function(data, status){
            $("#pindah").html(data);
     });
}
function pindah(val) {
	$.get("<?php echo base_url();?>"+val, function(data, status){
            $("#pindah").html(data);
     });
}
function postingan(val) {
	$.get("<?php echo base_url();?>editpostlg/"+val, function(data, status){
            $("#pindah").html(data);
     });
}
</script>
</body>
</html>