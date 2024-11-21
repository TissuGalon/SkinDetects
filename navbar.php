 <?php
 session_start();
 if (isset($_SESSION['LoginInfo'])) {
     $isLogin = true;
 } else {
     $isLogin = false;
 }
 ?>
 
 <header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">
            
            <!-- Logo container-->
            <div class="logo">
                <!-- Text Logo -->
                <a href="index.html" class=" text-dark">
                    GlowSkincare
                </a>
                <!-- Image Logo -->
                <!--  <a href="index.html" class="logo">
                    <img src="assets/images/logo-sm.png" alt="" height="22" class="logo-small">
                    <img src="assets/images/logo.png" alt="" height="16" class="logo-large">
                </a> -->
                
            </div>
            <!-- End Logo container-->
            
            
            <div class="menu-extras topbar-custom">
                
                <ul class="list-inline float-right mb-0">
                    
                    
                    <!-- User-->
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        <img src="assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5>Welcome</h5>
                        </div>
                        <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                        <div class="dropdown-divider"></div>
                        <?php
                        if ($isLogin) {
                            ?>
                                            <a class="dropdown-item" href="auth/logout.php"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>                                
                            <?php } else { ?>
                                                <a class="dropdown-item" href="auth/login_page.php"><i class="mdi mdi-login m-r-5 text-muted"></i> Login</a>
                                <?php }
                        ?>
                                
                            </div>
                        </li>
                        <li class="menu-item list-inline-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>
                        
                    </ul>
                </div>
                <!-- end menu-extras -->
                
                <div class="clearfix"></div>
                
            </div> <!-- end container -->
        </div>
        <!-- end topbar-main -->
        
        <!-- MENU Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu d-flex justify-content-center">
                        
                        <li class="has-submenu">
                            <a href="dashboard.php"><i class="mdi mdi-home"></i>Dashboard</a>
                        </li>
                        <li class="has-submenu">
                            <a href="product.php"><i class="mdi mdi-basket"></i>Produk</a>
                        </li>
                        <li class="has-submenu">
                            <a href="detect.php"><i class="mdi mdi-face-recognition"></i>Deteksi Wajah</a>
                        </li>
                        <li class="has-submenu">
                            <a href="transaction.php"><i class="mdi mdi-cart-outline"></i>Transaksi</a>
                        </li>                                            
                    </ul>
                    <!-- End navigation menu -->
                </div> <!-- end #navigation -->
            </div> <!-- end container -->
        </div> <!-- end navbar-custom -->
    </header>