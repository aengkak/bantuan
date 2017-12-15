    <body>


        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- Logo container-->
                    <div class="logo">
                        <!-- Text Logo -->
                        <!--<a href="<?php echo base_url();?>" class="logo">-->
                            <!--Zircos-->
                        <!--</a>-->
                        <!-- Image Logo -->
                        <a href="<?php echo base_url();?>" class="logo">
                            <img src="<?php echo base_url();?>assets/images/logo.png" alt="" height="30">
                        </a>

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras">
                        <ul class="nav navbar-nav navbar-right pull-right">
                            <!--<li class="navbar-c-items">
                                <form role="search" class="navbar-left app-search pull-left hidden-xs">
                                     <input type="text" placeholder="Search..." class="form-control">
                                     <a href=""><i class="fa fa-search"></i></a>
                                </form>
                            </li>-->

                            <!--<li class="dropdown navbar-c-items">
                                 <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                                    <i class="mdi mdi-email"></i>
                                    <span class="badge up bg-danger">8</span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                                    <li class="text-center">
                                        <h5>Messages</h5>
                                    </li>
                                    <li>
                                        <a href="#" class="user-list-item">
                                            <div class="avatar">
                                                <img src="<?php echo base_url();?>assets/images/users/avatar-2.jpg" alt="">
                                            </div>
                                            <div class="user-desc">
                                                <span class="name">Patricia Beach</span>
                                                <span class="desc">There are new settings available</span>
                                                <span class="time">2 hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="user-list-item">
                                            <div class="avatar">
                                                <img src="<?php echo base_url();?>assets/images/users/avatar-3.jpg" alt="">
                                            </div>
                                            <div class="user-desc">
                                                <span class="name">Connie Lucas</span>
                                                <span class="desc">There are new settings available</span>
                                                <span class="time">2 hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="user-list-item">
                                            <div class="avatar">
                                                <img src="<?php echo base_url();?>assets/images/users/avatar-4.jpg" alt="">
                                            </div>
                                            <div class="user-desc">
                                                <span class="name">Margaret Becker</span>
                                                <span class="desc">There are new settings available</span>
                                                <span class="time">2 hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="all-msgs text-center">
                                        <p class="m-0"><a href="#">See all Messages</a></p>
                                    </li>
                                </ul>
                            </li>-->

                            <!--<li class="dropdown navbar-c-items">
                                 <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                    <span class="badge up bg-success">4</span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                                    <li class="text-center">
                                        <h5>Notifications</h5>
                                    </li>
                                    <li>
                                        <a href="#" class="user-list-item">
                                            <div class="icon bg-info">
                                                <i class="mdi mdi-account"></i>
                                            </div>
                                            <div class="user-desc">
                                                <span class="name">New Signup</span>
                                                <span class="time">5 hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="user-list-item">
                                            <div class="icon bg-danger">
                                                <i class="mdi mdi-comment"></i>
                                            </div>
                                            <div class="user-desc">
                                                <span class="name">New Message received</span>
                                                <span class="time">1 day ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="user-list-item">
                                            <div class="icon bg-warning">
                                                <i class="mdi mdi-settings"></i>
                                            </div>
                                            <div class="user-desc">
                                                <span class="name">Settings</span>
                                                <span class="time">1 day ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="all-msgs text-center">
                                        <p class="m-0"><a href="#">See all Notification</a></p>
                                    </li>
                                </ul>
                            </li>-->

                            <li class="dropdown navbar-c-items">
							<?php if($this->session->userdata('status') == "login") { ?>
                                <a href="" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true">
								<img src="<?php echo base_url();?>assets/images/user.png" alt="user-img" class="img-circle"> 
								</a>
                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li class="text-center">
                                        <h5>Hi, <?php echo $this->session->userdata('username') ;?></h5>
                                    </li>
                                    <li><a href="#" onclick="gantipass()"><i class="ti-settings m-r-5"></i> Ganti password</a></li>
                                    <li><a href="<?php echo base_url();?>logout"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                </ul>
							<?php } else { ?>
								<a href="<?php echo base_url();?>login" class="waves-effect waves-light fa fa-sign-in"></a>
							<?php } ?>
                            </li>
                        </ul>
                        <div class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </div>
                    </div>
                    <!-- end menu-extras -->

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->
			<?php if ($this->session->userdata('status') != NULL) { ?>
            <div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <!--<li class="has-submenu">
                                <a href="#"><i class="mdi mdi-view-dashboard"></i>Dashboard</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="<?php echo base_url();?>">Dashboard 01</a>
                                    </li>
                                    <li>
                                        <a href="dashboard_2.html">Dashboard 02</a>
                                    </li>
                                </ul>
                            </li>-->

							<li class="has-submenu">
                                <a href="<?php echo base_url();?>"><i class="mdi mdi-view-dashboard"></i>Beranda</a>
							</li>
							
							<?php $akses_id = $this->session->userdata('akses_id');
							$res1 = explode(',',$akses_id);
							foreach ($akses as $key) {
								foreach ($res1 as $keya => $value) {
									if ($value == $key->id_akses) { ?>
							<li class="has-submenu">
                                <a href="<?php echo base_url().strtolower($key->akses);?>"><i class="mdi mdi-google-pages"></i><?php echo ucfirst($key->akses);?></a>
							</li>
									<?php } } } ?>
                            <!--<li class="has-submenu">
                                <a href="#"><i class="mdi mdi-google-pages"></i>Pages</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="page-starter.html">Starter Page</a></li>
                                            <li><a href="page-login.html">Login</a></li>
                                            <li><a href="page-register.html">Register</a></li>
                                            <li><a href="page-logout.html">Logout</a></li>
                                            <li><a href="page-recoverpw.html">Recover Password</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><a href="page-lock-screen.html">Lock Screen</a></li>
                                            <li><a href="page-confirm-mail.html">Confirm Mail</a></li>
                                            <li><a href="page-404.html">Error 404</a></li>
                                            <li><a href="page-404-alt.html">Error 404-alt</a></li>
                                            <li><a href="page-500.html">Error 500</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="mdi mdi-book-multiple"></i>Extras</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="extras-profile.html">Profile</a></li>
                                            <li><a href="extras-sitemap.html">Sitemap</a></li>
                                            <li><a href="extras-about.html">About Us</a></li>
                                            <li><a href="extras-contact.html">Contact</a></li>
                                            <li><a href="extras-members.html">Members</a></li>
                                            <li><a href="extras-timeline.html">Timeline</a></li>
                                            <li><a href="extras-invoice.html">Invoice</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><a href="extras-search-result.html">Search Result</a></li>
                                            <li><a href="extras-emailtemplate.html">Email Template</a></li>
                                            <li><a href="extras-maintenance.html">Maintenance</a></li>
                                            <li><a href="extras-coming-soon.html">Coming Soon</a></li>
                                            <li><a href="extras-faq.html">FAQ</a></li>
                                            <li><a href="extras-gallery.html">Gallery</a></li>
                                            <li><a href="extras-pricing.html">Pricing</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="mdi mdi-comment-text"></i>Blog</a>
                                <ul class="submenu">
                                    <li><a href="blogs-dashboard.html">Dashboard</a></li>
                                    <li><a href="blogs-blog-list.html">Blog List</a></li>
                                    <li><a href="blogs-blog-column.html">Blog Column</a></li>
                                    <li><a href="blogs-blog-post.html">Blog Post</a></li>
                                    <li><a href="blogs-blog-add.html">Add Blog</a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="mdi mdi-home-map-marker"></i>Real Estate</a>
                                <ul class="submenu">
                                    <li><a href="real-estate-dashboard.html">Dashboard</a></li>
                                    <li><a href="real-estate-list.html">Property List</a></li>
                                    <li><a href="real-estate-column.html">Property Column</a></li>
                                    <li><a href="real-estate-detail.html">Property Detail</a></li>
                                    <li><a href="real-estate-agents.html">Agents</a></li>
                                    <li><a href="real-estate-profile.html">Agent Details</a></li>
                                    <li><a href="real-estate-add.html">Add Property</a></li>
                                </ul>
                            </li>-->
                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
			<?php } ?>
        </header>
        <!-- End Navigation Bar-->
		
		<div class="wrapper">
            <div class="container">