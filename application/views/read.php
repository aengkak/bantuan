
                <div class="blog-list-wrapper">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="p-20">

                                <!-- Image Post -->
                                <div class="blog-post m-b-30">
                                    <div class="post-image">
                                        <img src="<?php echo base_url();?>assets/images/blog/0.png" alt="" class="img-responsive">
                                        <span class="label label-danger"><?php echo $read->nama;?></span>
                                    </div>
                                    <div class="text-muted"><span>by <a class="text-dark font-secondary"><?php echo $read->username;?></a>,</span> <span>Sep 10, 2016</span></div>
                                    <div class="post-title">
                                        <h3><a href="#"><?php echo $read->judul;?></a></h3>
                                    </div>
                                    <div>
                                        <p><?php echo $read->isi;?>
                                        </p>
                                    </div>

                                </div>

                                <div class="m-t-50">
                                    <h4 class="text-uppercase">Penulis</h4>
                                    <div class="border m-b-20"></div>

                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#"> <img class="media-object m-r-10" alt="64x64" src="<?php echo base_url();?>assets/images/happy.png" style="width: 96px; height: 96px;"> </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"><?php echo $read->username;?></h4>
                                            <p>
                                                Penulis di web faq Karunia Travel
                                            </p>

                                           </div>
                                    </div>
                                </div>

                                <hr/>


                            </div> <!-- end p-20 -->
                        </div> <!-- end col -->

                        <div class="col-sm-4">
                            <div class="p-20">

                                <div class="m-t-50">
                                    <h4 class="text-uppercase">Kategori</h4>
                                    <div class="border m-b-20"></div>

                                    <ul class="blog-categories-list list-unstyled">
                                        <?php foreach ($kategori as $key) { ?>
										<li><a href="#"> <?php echo $key->nama;?> </a></li>
										<?php } ?>
                                    </ul>
                                </div>

                                <div class="m-t-50">
                                    <h4 class="text-uppercase">Latest Post</h4>
                                    <div class="border m-b-20"></div>

                                    <?php foreach ($post as $keyp) { ?>
                                    <div class="media latest-post-item">
                                        <div class="media-left">
                                            <a href="<?php echo base_url()."read/".$keyp->slug;?>"> <img class="media-object" alt="64x64" src="<?php echo base_url();?>assets/images/small/img-1.jpg" style="width: 100px; height: 66px;"> </a>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="media-heading"><a href="<?php echo base_url()."read/".$keyp->slug;?>"><?php echo $keyp->judul;?></a> </h5>
                                            <p class="font-13 text-muted">
                                                <?php echo $keyp->tgl;?> | <?php echo $keyp->username;?>
                                            </p>
                                        </div>
                                    </div>
									<?php } ?>

                                </div>


                            </div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>