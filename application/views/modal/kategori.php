<?php if($cek == 0) { ?>
<div class="form-group">
   <label class="col-md-2 control-label">Kategori</label>
   <div class="col-md-10">
      <input class="form-control" name="nama" type="text" placeholder="Nama Kategori" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Divisi</label>
   <div class="col-md-10">
      <?php $sesdev = $this->session->userdata('divisi_id');
         $resd = explode(',',$sesdev);
         foreach ($divisi as $keyd) { 
         foreach($resd as $keyresd => $valueresd) { 
         if($keyd->id_divisi == $valueresd) { ?>
      <div class="radio radio-info">
         <input type="radio" name="divisi_id" id="<?php echo $keyd->id_divisi;?>" value="<?php echo $keyd->id_divisi;?>" required>
         <label for="<?php echo $keyd->id_divisi;?>"> <?php echo $keyd->divisi; ?>
         </label>
      </div>
      <?php } } } ?>
   </div>
</div>
<?php } else { ?>
<input type="hidden" name="id_kategori" value="<?php echo $kategori->id_kategori;?>">
<div class="form-group">
   <label class="col-md-2 control-label">Kategori</label>
   <div class="col-md-10">
      <input value="<?php echo $kategori->nama;?>" class="form-control" name="nama" type="text" placeholder="Nama Kategori" required>
   </div>
</div>
<div class="form-group">
   <label class="col-md-2 control-label">Divisi</label>
   <div class="col-md-10">
      <?php $sesdev = $this->session->userdata('divisi_id');
         $resd = explode(',',$sesdev);
         foreach ($divisi as $keyd) { 
         foreach($resd as $keyresd => $valueresd) { 
         if($keyd->id_divisi == $valueresd) { ?>
      <div class="radio radio-info">
         <input type="radio" <?php if ($kategori->divisi_id == $keyd->id_divisi) echo 'checked = "checked"'; ?> name="divisi_id" id="<?php echo $keyd->id_divisi;?>" value="<?php echo $keyd->id_divisi;?>" required>
         <label for="<?php echo $keyd->id_divisi;?>"><?php echo $keyd->divisi; ?>
         </label>
      </div>
      <?php } } } ?>
   </div>
</div>
<?php } ?>