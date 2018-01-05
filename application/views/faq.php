<script>
   $(document).ready(function () {
     var projects = <?php echo $res;?>;
   var myVar;
   
     $( "#search" ).autocomplete({
       minLength: 0,
       source: projects,
       /*focus: function( event, ui ) {
         $( "#tempattujuan" ).val( ui.item.label );
         return false;
       },*/
       select: function( event, ui ) {
         $( "#search" ).val( ui.item.value );
         $( "#project-id" ).val( ui.item.label );
         $( "#project-description" ).html( ui.item.desc );
         $( "#project-icon" ).attr( "src", "images/" + ui.item.icon );
   
   $.ajax({
     url : "<?php echo base_url()."faq/".$linkpost;?>",
     type: "POST",
     data: $('#cari').serialize(),
     success: function(data)
     {
   	$("#ganti").html(data);
     },
     error: function (jqXHR, textStatus, errorThrown)
     {
     }
    });
   
   //document.getElementById("tempattujuan").blur();
   //myVar = setInterval(alertFunc, 1);
   //$('#tempattujuan').autocomplete('disable');
   //document.getElementById("tempattujuan").readOnly = true;
   
       },
   
     })
     .autocomplete( "instance" )._renderItem = function( ul, item ) {
       return $( "<li>" )
         .append( "<div class=\"bobordergrey pad15\"><span class=\"font16\">" + item.label + "</span>&nbsp;&nbsp;<sup><font class=\"floatright marginsmalltop\"><small class=\"bluebg white labels\">&nbsp;" + item.desc + "&nbsp;</small></font></sup><br><div class=\"mt5 mb5\">" + item.addr +  "</div></div>" )
         .appendTo( ul );
     };
   
   $("input#search").focus(function(e) {
   if(!e.isTrigger) {
   $(this).autocomplete("search", "");
   
   }
   return false;
   });
   //console.log = $("#search").autocomplete();
   } );
</script>
<div class="row">
   <div class="col-xs-12">
      <div class="page-title-box" style="padding-bottom: 0px; padding-top: 10px;">
         <h4 class="page-title"></h4>
         <ol class="breadcrumb p-0 m-0">
            <li class="active">
               <h4><b><?php echo strtoupper($this->uri->segment('2')) ;?></b></h4>
            </li>
         </ol>
         <div class="clearfix"></div>
      </div>
   </div>
</div>
<!-- end row -->
<div class="">
   <div class="row">
      <div class="col-sm-8">
         <div class="p-20">
            <div class="row blog-column-wrapper" id="ganti">
               <div class="panel-group" id="accordion">
                  <?php if($post == NULL) { echo "Tidak Ditemukan"; } else {
                     $no = 1; foreach ($post as $key) { ?>
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <h4 class="panel-title">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $no;?>">
                              <div class="down"><?php echo $key->judul;?></div>
                           </a>
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
                  <?php if($no == 3) { break; } $no++; } } ?>
               </div>
            </div>
            <!-- end row -->
         </div>
      </div>
      <!-- end col -->
      <div class="col-sm-4">
         <div class="p-20">
            <div class="">
               <h4 class="text-uppercase">
                  <button onclick="reset()" class="btn "><i class="fa fa-refresh"></i></button>
                  <?php
                     $cekd = $this->session->userdata('divisi_id');
                     $resd = explode(',',$cekd);
                     foreach($resd as $keyd => $valued) {
                     	if($valued == $divisi->id_divisi) { ?>
                  <a href="<?php echo base_url();?>addpost" class="btn btn-custom waves-effect waves-light m-b-5">Tambah Post</a>
                  <?php break; }
                     } ?>
               </h4>
               <div class="border m-b-20"></div>
               <div class="form-group search-box">
                  <form id="cari" action="" method="post">
                     <input type="text" onclick="this.select();" name="judul" id="search" class="form-control" placeholder="Pencarian">
                     <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                  </form>
               </div>
            </div>
            <div class="m-t-50">
               <h4 class="text-uppercase">Kategori</h4>
               <div class="border m-b-20"></div>
               <ul class="blog-categories-list list-unstyled" >
                  <div class="buka">
                     <?php $n = 1; foreach ($kategori as $key) { ?>
                     <li>
                        <a id="kebuka<?php echo $n;?>" style="cursor:pointer" onclick="gerbang(this.id)"><b> <?php echo $key->nama;?> </b></a>
                     </li>
                     <?php $n++; } ?>
                  </div>
                  <?php $nn = 1; foreach ($kategori as $key) { ?>
				  <div class="kebuka<?php echo $nn;?>" style="display:none">
				  <li>
				  <a style="cursor:pointer" class="fa fa-arrow-left" onclick="kembali(<?php echo $nn;?>)" > Kembali </a>
				  </li>
                  <li >
                     
                     <?php foreach ($tag as $keyt) {
                        if($keyt->kategori_id == $key->id_kategori) { ?>
                     <a style="cursor:pointer" onclick="penanda(<?php echo $keyt->id_tag ;?>)" ><b> <?php echo $keyt->tag ;?> </b></a>
                     <?php }
                        } ?>
                  </li>
				  </div>
                  <?php $nn++; } ?>
               </ul>
            </div>
         </div>
      </div>
      <!-- end col -->
   </div>
   <!-- end row -->
</div>

 <div class="modal fade" id="enlargeImageModal" tabindex="-1" role="dialog" aria-labelledby="enlargeImageModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <img src="" class="enlargeImageModalSource" style="width: 100%;">
        </div>
      </div>
    </div>
</div>

<script>
   function penanda(id) {
   	$.ajax({
             method: "POST",
             url: "<?php echo base_url()."faq/".$linkpost;?>",
             data: { id: id },
             success: function(data){
                 $("#ganti").html(data);
             }
      });
   }
   function reset() {
   	document.getElementById("cari").reset();
   	$.ajax({
        url : "<?php echo base_url()."faq/".$linkpost;?>",
        type: "POST",
        data: $('#cari').serialize(),
        success: function(data)
        {
      	$("#ganti").html(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
        }
       });
   }
   $("#cari").on('submit',(function(e) {
   			e.preventDefault();
   			$.ajax({
        url : "<?php echo base_url()."faq/".$linkpost;?>",
        type: "POST",
        data: $('#cari').serialize(),
        success: function(data)
        {
      	$("#ganti").html(data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
        }
       });
   }));
</script>
<script>
   function gerbang(id) {
   $(".buka").fadeOut();
     $("."+id).fadeIn();
   }
   function kembali(id) {
	   $(".kebuka"+id).fadeOut();
	   $(".buka").fadeIn();
   }
</script>
<script type="text/javascript">
    $(document).ready(function() {
		$("img").addClass("img-responsive");
});
</script>
<script>
$(function() {
	$('img').on('click', function() {
			if($(this).attr("id") != "logok" && $(this).attr("id") != "gambar") {
			$('.enlargeImageModalSource').attr('src', $(this).attr('src'));
			$('#enlargeImageModal').modal('show');
			}
	});
});
</script>