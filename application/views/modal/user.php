<?php if($cek == 0) { ?>
	<div class="form-group">
		<label class="col-md-2 control-label">Username</label>
		<div class="col-md-10">
			<input class="form-control" name="username" type="text" placeholder="Username" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Password</label>
		<div class="col-md-10">
			<input class="form-control" name="password" type="text" placeholder="Password" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Akses</label>
		<div class="col-md-10">
			<?php foreach ($akses as $key) {?>
    <label>
        <input type="checkbox" name="akses_id[]" class="minimal" value="<?php echo $key->id_akses;?>">
          <?php echo $key->akses;?>
    </label>

  <?php } ?>
		</div>
	</div>
<?php } else { ?>
	<input type="hidden" name="id_user" value="<?php echo $user->id_user;?>">
	<div class="form-group">
		<label class="col-md-2 control-label">Username</label>
		<div class="col-md-10">
			<input class="form-control" value="<?php echo $user->username;?>" name="username" type="text" placeholder="Username" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Password</label>
		<div class="col-md-10">
			<input class="form-control" name="password" type="text" placeholder="Password">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Akses</label>
		<div class="col-md-10">
		<?php $res = $user->akses_id;
  $res1 = explode(',',$res);
  foreach ($akses as $key) {?>
    <label>
          <?php foreach ($res1 as $key1 => $value1) { ?>
        <input type="checkbox" <?php if ($value1 == $key->id_akses) echo 'checked = "checked"'; }?> name="akses_id[]" class="minimal" value="<?php echo $key->id_akses;?>">
          <?php echo $key->akses;?>
    </label>
  <?php } ?>
		</div>
	</div>
<?php } ?>
