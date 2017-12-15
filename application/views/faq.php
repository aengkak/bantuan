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
     url : "<?php echo base_url();?>search",
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
<div class="">
   <div class="row">
      <div class="col-sm-8">
         <div class="p-20">
            <div class="row blog-column-wrapper" id="ganti">
               <div class="panel-group" id="accordion">
                  <?php $no = 1; foreach ($post as $key) { ?>
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
							if($this->session->userdata('status') == "login"){ ?>
								<br>
							<div class="col-md-11"></div>
							<div class="col-md-1">
							<a href="<?php echo base_url()."editpost/".$key->id_post;?>" class="btn btn-custom waves-effect waves-light m-b-5">Edit</a>
							</div>
							<?php }
							?>
							
						</div>
                     </div>
                  </div>
                  <?php if($no == 10) { break; } $no++; } ?>
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
				if($this->session->userdata('status') == "login"){ ?>
				<a href="<?php echo base_url();?>addpost" class="btn btn-custom waves-effect waves-light m-b-5">Tambah Post</a>
				<?php } ?>
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
               <ul class="blog-categories-list list-unstyled">
                  <?php $n = 1; foreach ($kategori as $key) { ?>
                  <li>
                     <a data-toggle="collapse" data-parent="#accordion1" href="#bg-default<?php echo $n;?>"><b> <?php echo $key->nama;?> </b></a>
                     <div id="bg-default<?php echo $n;?>" class="panel-collapse collapse">
                        <div class="portlet-body">
                           <?php foreach ($tag as $keyt) {
                              if($keyt->kategori_id == $key->id_kategori) { ?>
                           <a href="#" onclick="penanda(<?php echo $keyt->id_tag ;?>)" > <?php echo $keyt->tag ;?> </a>
                           <?php }
                              } ?>
                        </div>
                     </div>
                  </li>
                  <?php $n++; } ?>
               </ul>
            </div>
         </div>
      </div>
      <!-- end col -->
   </div>
   <!-- end row -->
</div>
<script>
   function penanda(id) {
   	$.ajax({
             method: "POST",
             url: "<?php echo base_url(); ?>filtertag",
             data: { id: id },
             success: function(data){
                 $("#ganti").html(data);
             }
      });
   }
   function reset() {
   	document.getElementById("cari").reset();
   	$.ajax({
             method: "POST",
             url: "<?php echo base_url(); ?>search",
             success: function(data){
                 $("#ganti").html(data);
             }
      });
   }
   $("#cari").on('submit',(function(e) {
   			e.preventDefault();
   			$.ajax({
        url : "",
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