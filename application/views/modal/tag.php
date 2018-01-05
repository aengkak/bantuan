<?php if($cek == 0) { ?>
	<div class="form-group">
		<label class="col-md-2 control-label">Nama Pendanda</label>
		<div class="col-md-10">
			<input class="form-control" name="tag" type="text" placeholder="Nama" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Kategori</label>
		<div class="col-md-10">
			<select class="form-control" name="kategori_id">
			<?php $sesdev = $this->session->userdata('divisi_id');
			$resd = explode(',',$sesdev);
			foreach ($kategori as $key) { 
			foreach($resd as $keyresd => $valueresd) { 
			if($valueresd == $key->divisi_id) { ?>
				<option value="<?php echo $key->id_kategori;?>"><?php echo $key->nama." ~ ".$key->divisi;?></option> 
			<?php } } } ?>
			</select>
		</div>
	</div>
<?php } else { ?>
	<input type="hidden" name="id_tag" value="<?php echo $tag->id_tag;?>">
	<div class="form-group">
		<label class="col-md-2 control-label">Nama Pendanda</label>
		<div class="col-md-10">
			<input class="form-control" value="<?php echo $tag->tag;?>" name="tag" type="text" placeholder="Nama" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Kategori</label>
		<div class="col-md-10">
			<select class="form-control" name="kategori_id">
			<?php $sesdev = $this->session->userdata('divisi_id');
			$resd = explode(',',$sesdev);
			foreach ($kategori as $key) { 
			foreach($resd as $keyresd => $valueresd) { 
			if($valueresd == $key->divisi_id) { ?>
				<option <?php if ($key->id_kategori == $tag->kategori_id) echo 'selected = "selected"'; ?> value="<?php echo $key->id_kategori;?>"><?php echo $key->nama." ~ ".$key->divisi;?></option> 
			<?php } } } ?>
			</select>
		</div>
	</div>
<?php } ?>
