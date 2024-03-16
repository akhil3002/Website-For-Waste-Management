<!-- main header -->
<header class="main-header">
    <!-- header-top -->
    <div class="header-top">
        <div class="top-inner">
            <div class="top-left">
                <ul class="info-list clearfix">
                    <li><i class="icon-1"></i>Open Hours: <span>8:00 am-6:00 pm</span></li>
                    <li><i class="icon-2"></i>Email: <a href="mailto:info@example.com">info@example.com</a></li>
                    <li><i class="icon-3"></i>Address: <span>8302 Preston Rd. Maine 9380</span></li>
                </ul>
            </div>
            <div class="top-right">
                <ul class="social-links clearfix">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- header-lower -->
    <div class="header-lower">
        <div class="outer-box">
            <div class="logo-box">
                <figure class="logo"><a href="../"><img src="assets/images/logo.png" alt=""></a></figure>
            </div>
            <div class="menu-area">
                <!--Mobile Navigation Toggler-->
                <div class="mobile-nav-toggler">
                    <i class="icon-bar"></i>
                    <i class="icon-bar"></i>
                    <i class="icon-bar"></i>
                </div>
                <nav class="main-menu navbar-expand-md navbar-light clearfix">
                    <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                        <ul class="navigation clearfix">
                            <li><a href="../">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Service</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </nav>
                <ul class="menu-right-content">
                    <li class="support-box">
                        <i class="icon-4"></i>
                        <a href="tel:+91 1800 02 1568">+91 1800 02 1568</a>
                    </li>
                    <!-- <li class="search-box-outer search-toggler">
                                <i class="icon-5"></i>
                            </li> -->
                    <li class="btn-box">
                        <?php if (isset($_SESSION['SESS_USER_TOKEN'])) { ?>
                            <a href="myaccount.php" class="theme-btn btn-one"><span>My Account</span></a>
                        <?php } else { ?>
                            <a href="register.php" class="theme-btn btn-one"><span>Register</span></a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="outer-container">
            <div class="outer-box">
                <div class="logo-box">
                    <figure class="logo"><a href="index-2.html"><img src="assets/images/logo.png" alt=""></a></figure>
                </div>
                <div class="menu-area">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                    <ul class="menu-right-content">
                        <li class="support-box">
                            <i class="icon-4"></i>
                            <a href="tel:+91 1800 02 1568">+91 1800 02 1568</a>
                        </li>
                        <!-- <li class="search-box-outer search-toggler">
                                    <i class="icon-5"></i>
                                </li> -->
                        <li class="btn-box">
                        <?php if (isset($_SESSION['SESS_USER_TOKEN'])) { ?>
                            <a href="myaccount.php" class="theme-btn btn-one"><span>My Account</span></a>
                        <?php } else { ?>
                            <a href="register.php" class="theme-btn btn-one"><span>Register</span></a>
                        <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->

<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>

    <nav class="menu-box">
        <div class="nav-logo"><a href="index-2.html"><img src="assets/images/logo-2.png" alt="" title=""></a></div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                <li>Chicago 12, Melborne City, USA</li>
                <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                <li><a href="mailto:info@example.com">info@example.com</a></li>
            </ul>
        </div>
        <div class="social-links">
            <ul class="clearfix">
                <li><a href="index-2.html"><span class="fab fa-twitter"></span></a></li>
                <li><a href="index-2.html"><span class="fab fa-facebook-square"></span></a></li>
                <li><a href="index-2.html"><span class="fab fa-pinterest-p"></span></a></li>
                <li><a href="index-2.html"><span class="fab fa-instagram"></span></a></li>
                <li><a href="index-2.html"><span class="fab fa-youtube"></span></a></li>
            </ul>
        </div>
    </nav>
</div><!-- End Mobile Menu -->