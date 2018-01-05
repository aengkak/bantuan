<?php if ($cek > 0) { ?>

<?php if ($post != NULL) { ?>
<div class="panel-group" id="accordion">
   <?php $no = 1; foreach ($post as $key) { ?>
   <div class="panel panel-default">
      <div class="panel-heading">
         <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $no;?>">
				<div class="down"><?php echo str_ireplace($kata, '<span style="color: #1A8CF3;">'.$kata.'</span>', $key->judul); ?></div>
			</a>
         </h4>
      </div>
      <div id="collapse<?php echo $no;?>" class="panel-collapse collapse <?php /*if($no == 1){ echo "in"; }*/?>">
         <div class="panel-body">
		 <?php echo str_ireplace($kata, '<span style="color: #1A8CF3;">'.$kata.'</span>', $key->isi); ?>
		 <?php
							$cekd = $this->session->userdata('divisi_id');
							$resd = explode(',',$cekd);
							foreach($resd as $keyd => $valued) {
								if($valued == $divisi->id_divisi) { ?>
								<br><br>
							<div class="col-md-11"></div>
							<div class="col-md-1">
							<a href="<?php echo base_url();?>editpost/<?php echo $key->id_post; ?>" class="btn btn-custom waves-effect waves-light m-b-5">Edit</a>
							</div>
							<?php break; }
							} ?>
		 </div>
      </div>
   </div>
   <?php if($no == 3) { break; } $no++; } ?>
</div>
<?php } else { echo "Tidak Ditemukan"; } ?>
	
<?php } else { ?>

<?php if ($post != NULL) { ?>
<div class="panel-group" id="accordion">
   <?php $no = 1; foreach ($post as $key) { ?>
   <div class="panel panel-default">
      <div class="panel-heading">
         <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $no;?>"><div class="down"><?php echo $key->judul;?></div></a>
         </h4>
      </div>
      <div id="collapse<?php echo $no;?>" class="panel-collapse collapse <?php /*if($no == 1){ echo "in"; }*/?>">
         <div class="panel-body">
			<?php echo $key->isi;?>
			<?php
							$cekd = $this->session->userdata('divisi_id');
							$resd = explode(',',$cekd);
							foreach($resd as $keyd => $valued) {
								if($valued == $divisi->id_divisi) { ?>
								<br><br>
							<div class="col-md-11"></div>
							<div class="col-md-1">
							<a href="<?php echo base_url();?>editpost/<?php echo $key->id_post; ?>" class="btn btn-custom waves-effect waves-light m-b-5">Edit</a>
							</div>
							<?php break; }
							} ?>
		</div>
      </div>
   </div>
   <?php if($no == 3) { break; } $no++; } ?>
</div>
<?php } else { echo "Tidak Ditemukan"; } ?>
<?php } ?>
<script type="text/javascript">
    $(document).ready(function() {
        $("img").addClass("img-responsive");
});
</script>