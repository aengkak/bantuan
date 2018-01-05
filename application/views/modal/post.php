<?php if($cek == 0) { ?>
<div class="row">
   <div class="col-xs-12">
      <div class="page-title-box">
         <h4 class="page-title"Tambah Post </h4>
         <ol class="breadcrumb p-0 m-0">
            <li>
               <a style="cursor: pointer;" onclick="pindah('pilih');">Beranda</a>
            </li>
            <li>
               <a style="cursor: pointer;" onclick="pindah('post');">Post </a>
            </li>
            <li class="active">
               Tambah Post
            </li>
         </ol>
         <div class="clearfix"></div>
      </div>
   </div>
</div>
<!-- end row -->
<div class="row">
   <div class="col-md-10 col-md-offset-1">
      <div class="card-box">
         <div class="">
            <form role="form" id="formpost" action="" method="post">
               <input type="hidden" value="0" name="cek">
               <div class="form-group m-b-20">
                  <label for="exampleInputEmail1">Judul</label>
                  <input type="text" name="judul" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Judul" required>
               </div>
               <div class="form-group m-b-20">
                  <label class="m-b-10">Kategori</label>
                  <br/>
                  <?php $sesdev = $this->session->userdata('divisi_id');
                     $resd = explode(',',$sesdev);
                     foreach ($kategori as $key) { 
                     foreach($resd as $keyresd => $valueresd) { 
                     if($valueresd == $key->divisi_id) { ?>
                  <div class="radio radio-info radio-inline">
                     <input type="radio" name="kategori_id" id="kategori" value="<?php echo $key->id_kategori;?>"
                        name="radioInline" required>
                     <label for="kategori.<?php echo $key->id_kategori;?>"> <?php echo $key->nama." ~ ".$key->divisi;?> </label>
                  </div>
                  <?php } } } ?>
               </div>
               <div id="penanda"></div>
               <div class="form-group m-b-20">
                  <label>Isi</label>
                  <textarea required name="isi" id="isi" class="ckeditor"><br><br><br><p style="text-align:center"><b>- PELAJARI | PAHAMI | PRAKTEKAN -</b></p>
                  </textarea>
               </div>
               <button type="submit" class="btn btn-success waves-effect waves-light">Simpan</button>
               <a href="<?php echo base_url();?>postingan" type="button" class="btn btn-danger waves-effect waves-light">Batal</a>
            </form>
         </div>
      </div>
      <!-- end p-20 -->
   </div>
   <!-- end col -->
</div>
<!-- end row -->

<?php } else { ?>
<div class="row">
   <div class="col-xs-12">
      <div class="page-title-box">
         <h4 class="page-title">Edit Post </h4>
         <ol class="breadcrumb p-0 m-0">
            <li>
               <a style="cursor: pointer;" onclick="pindah('pilih');">Beranda</a>
            </li>
            <li>
               <a style="cursor: pointer;" onclick="pindah('post');">Post </a>
            </li>
            <li class="active">
               Edit Post
            </li>
         </ol>
         <div class="clearfix"></div>
      </div>
   </div>
</div>
<!-- end row -->
<div class="row">
   <div class="col-md-10 col-md-offset-1">
      <div class="card-box">
         <div class="">
            <form role="form" id="formpost" action="" method="post">
               <input type="hidden" value="1" name="cek">
               <input type="hidden" name="id_post" value="<?php echo $post->id_post;?>">
               <div class="form-group m-b-20">
                  <label for="exampleInputEmail1">Judul</label>
                  <input type="text" name="judul" value="<?php echo $post->judul;?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Judul" required>
               </div>
               <div class="form-group m-b-20">
                  <label class="m-b-10">Kategori</label>
                  <br/>
                  <?php $sesdev = $this->session->userdata('divisi_id');
                     $resd = explode(',',$sesdev);
                     foreach ($kategori as $key) { 
                     foreach($resd as $keyresd => $valueresd) { 
                     if($valueresd == $key->divisi_id) { ?>
                  <div class="radio radio-info radio-inline">
                     <input type="radio" id="kategori" name="kategori_id" value="<?php echo $key->id_kategori;?>" <?php if ($key->id_kategori == $post->kategori_id) echo 'checked = "checked"'; ?> required>
                     <label for="inlineRadio1"> <?php echo $key->nama." ~ ".$key->divisi;?> </label>
                  </div>
                  <?php } } } ?>
               </div>
               <div id="penanda"></div>
               <div class="form-group m-b-20">
                  <label>Isi</label>
                  <textarea required name="isi" id="isi" class="ckeditor"><?php echo $post->isi;?>
                  </textarea>
               </div>
               <button type="submit" class="btn btn-success waves-effect waves-light">Simpan</button>
               <a href="<?php echo base_url();?>postingan" type="button" class="btn btn-danger waves-effect waves-light">Batal</a>
            </form>
         </div>
      </div>
      <!-- end p-20 -->
   </div>
   <!-- end col -->
</div>
<!-- end row -->
<script>
   $(window).on('load',function(){
         if($('input[id="kategori"]').is(":checked")){
             $.ajax({
             method: "POST",
             url: "<?php echo base_url(); ?>posttag",
             data: $('#formpost').serialize(),
             success: function(data){
                 $("#penanda").html(data);
             }
      });
         }
   });
</script>
<?php } ?>
<script>
   CKEDITOR.replace( 'isi', {
   	// Pressing Enter will create a new <div> element.
   	enterMode: CKEDITOR.ENTER_BR,
   	// Pressing Shift+Enter will create a new <p> element.
   	shiftEnterMode: CKEDITOR.ENTER_P
   } );
</script>
<script type="text/javascript">
   $(document).ready(function(){
    $('input[id="kategori"]').click(function(){
      if($(this).is(":checked")){
          $.ajax({
          method: "POST",
          url: "<?php echo base_url(); ?>posttag",
          data: $('#formpost').serialize(),
          success: function(data){
              $("#penanda").html(data);
          }
   });
      }
   });
   });
</script>
<!--<script type="text/javascript">
   window.onbeforeunload = function () {
    return 'Are you really want to perform the action?';
   }
   </script>-->