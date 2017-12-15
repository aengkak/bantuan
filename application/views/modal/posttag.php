<?php if ($cek == 0) {
		if($tag != NULL) { ?>
	<div class="form-group m-b-20">
	<label class="m-b-10">Penanda</label><br/>
		<?php foreach ($tag as $key) { ?>
			<div class="checkbox checkbox-info checkbox-inline">
				<input type="checkbox" name="tag_id[]" value="<?php echo $key->id_tag;?>">
					<label for="inlineRadio1"> <?php echo $key->tag;?> </label>
						</div>
		<?php } ?>
</div>
		<?php } } else { ?>
		<div class="form-group m-b-20">
	<label class="m-b-10">Penanda</label><br/>
		<?php $res = $post->tag_id;
		$res1 = explode(',',$res);
		foreach ($tag as $key) { ?>
			<div class="checkbox checkbox-info checkbox-inline">
				<?php foreach ($res1 as $key1 => $value1) { ?>
				<input <?php if ($value1 == $key->id_tag) echo 'checked = "checked"'; } ?> type="checkbox" name="tag_id[]" value="<?php echo $key->id_tag;?>">
					<label for="inlineRadio1"> <?php echo $key->tag;?> </label>
						</div>
		<?php } ?>
</div>
<?php } ?>
