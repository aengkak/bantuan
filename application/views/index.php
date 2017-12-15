                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    
                                </ol>
                            </div>
                            <h4 class="page-title">Pilih Divisi Anda</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                    <div class="col-sm-12">
                        <div class="timeline">
                            <article class="timeline-item alt">
                                <div class="text-right">
                                    <div class="time-show first">
                                        <a href="#" class="btn btn-danger w-lg">Divisi</a>
                                    </div>
                                </div>
                            </article>
							<?php $no = 1; foreach($divisi as $key) { ?>
							<article class="timeline-item <?php if($no%2==0) { echo ""; } else { echo "alt"; } ?>">
                                <div class="timeline-desk">
                                    <div class="panel">
                                        <div class="timeline-box">
                                            <span class="arrow<?php if($no%2==0) { echo ""; } else { echo "-alt"; } ?>"></span>
                                            <span class="timeline-icon"><i class="mdi mdi-checkbox-blank-circle-outline"></i></span>
                                            <h4 class=""><a href="<?php echo base_url()."faq/".strtolower($key->divisi);?>" class="btn btn-danger"><?php echo $key->divisi;?></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </article>
							<?php $no++; } ?>
                            
                        </div>
                    </div>
                </div>
                <!-- end row -->