<?php
include("include/auth.php");
include('include/dbConnect.php');
include('include/helper.php');
$token = $_GET['token'];
$qry = $db->prepare("SELECT * FROM posts WHERE token = '$token'");
$qry->execute();
if ($qry->rowcount() > 0) {
    $rows = $qry->fetch();
    $created_by = $rows['created_by'];
    $qryadmn = $db->prepare("SELECT * FROM users WHERE token = '$created_by'");
    $qryadmn->execute();
    $rowadmn = $qryadmn->fetch();
    $posted_by = $rowadmn['user_type'];
} else {
?>
    <script>
        window.location.href = 'myaccount.php';
    </script>
<?php
}

$qryactive = $db->prepare("SELECT * FROM posts WHERE expire_on > '$current_date_time_local'");
$qryactive->execute();
$post_active = $qryactive->rowcount();
$accepted_by_you = 0;
if (trim($_SESSION['SESS_USER_TYPE']) == 'admin' || trim($_SESSION['SESS_USER_TYPE']) == 'agent' || trim($_SESSION['SESS_USER_TYPE']) == 'buyer' || $created_by == $user) {
} else { ?>
    <script>
        window.location.href = 'myaccount.php';
    </script>
<?php }
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Wastix</title>

    <!-- Fav Icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;0,9..144,500;0,9..144,600;0,9..144,700;0,9..144,800;0,9..144,900;1,9..144,300;1,9..144,400;1,9..144,500;1,9..144,600;1,9..144,700;1,9..144,800;1,9..144,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="assets/css/font-awesome-all.css" rel="stylesheet">
    <link href="assets/css/flaticon.css" rel="stylesheet">
    <link href="assets/css/owl.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/nice-select.css" rel="stylesheet">
    <link href="assets/css/elpath.css" rel="stylesheet">
    <link href="assets/css/color/theme-color.css" id="jssDefault" rel="stylesheet">
    <link href="assets/css/switcher-style.css" rel="stylesheet">
    <link href="assets/css/rtl.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/module-css/banner.css" rel="stylesheet">
    <link href="assets/css/module-css/feature.css" rel="stylesheet">
    <link href="assets/css/module-css/about.css" rel="stylesheet">
    <link href="assets/css/module-css/service.css" rel="stylesheet">
    <link href="assets/css/module-css/skills.css" rel="stylesheet">
    <link href="assets/css/module-css/funfact.css" rel="stylesheet">
    <link href="assets/css/module-css/team.css" rel="stylesheet">
    <link href="assets/css/module-css/cta.css" rel="stylesheet">
    <link href="assets/css/module-css/news.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">

</head>


<!-- page wrapper -->

<body>


    <div class="boxed_wrapper ltr">


        <!-- preloader -->
        <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close">close</div>
                <div id="handle-preloader" class="handle-preloader">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        <div class="txt-loading">
                            <span data-text-preloader="w" class="letters-loading">
                                w
                            </span>
                            <span data-text-preloader="a" class="letters-loading">
                                a
                            </span>
                            <span data-text-preloader="s" class="letters-loading">
                                s
                            </span>
                            <span data-text-preloader="t" class="letters-loading">
                                t
                            </span>
                            <span data-text-preloader="i" class="letters-loading">
                                i
                            </span>
                            <span data-text-preloader="x" class="letters-loading">
                                x
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- preloader end -->


        <!--Search Popup-->
        <div id="search-popup" class="search-popup">
            <div class="popup-inner">
                <div class="upper-box clearfix">
                    <figure class="logo-box pull-left"><a href="index-2.html"><img src="assets/images/logo.png" alt=""></a></figure>
                    <div class="close-search pull-right"><span class="far fa-times"></span></div>
                </div>
                <div class="overlay-layer"></div>
                <div class="auto-container">
                    <div class="search-form">
                        <form method="post" action="https://azim.hostlin.com/Wastix/index.html">
                            <div class="form-group">
                                <fieldset>
                                    <input type="search" class="form-control" name="search-input" value="" placeholder="Type your keyword and hit" required>
                                    <button type="submit"><i class="far fa-search"></i></button>
                                </fieldset>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include("include/header.php"); ?>
        <!-- contact-section -->
        <section class="contact-section pt_150d pb_150">
            <div class="auto-container">
                <div class="row">
                    <section class="sidebar-page-container blog-details pt_150 pb_150">
                        <div class="auto-container">
                            <div class="row clearfix">
                                <div class="col-lg-8 offset-lg-2 col-md-12 col-sm-12 content-side">
                                    <div class="blog-details-content">
                                        <div class="news-block-one">
                                            <div class="inner-box">
                                                <div class="image-box">
                                                    <figure class="image shadow"><img src="images/<?php echo $rows['image'] ?>" alt=""></figure>
                                                    <!-- <div class="post-date"> -->
                                                    <!-- <h3>08 Dec</h3> -->
                                                    <!-- </div> -->
                                                </div>
                                                <div class="lower-content">
                                                    <ul class="post-info mb_6 clearfix">
                                                        <li><i class="icon-24"></i><a href="blog-details.html">by <?php echo ucwords($rowadmn['name']) ?></a></li>
                                                        <li><i class="icon-25"></i><?php echo time_convert($rows['created_at']) ?></li>
                                                    </ul>
                                                    <span class="btn btn-success btn-sm rounded-pill mb-2"><?php echo $rows['waste_type']; ?></span><br>
                                                    <h3><?php echo ucfirst($rows['title']) ?></h3>
                                                    <p><?php echo nl2br(ucfirst($rows['description'])) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <?php
                                    if ($_SESSION['SESS_USER_TYPE'] == 'admin') {
                                        if ($rows['approved'] == 0) {
                                    ?>
                                            <a href="actions/post/approve.php?token=<?php echo $token ?>" class="btn btn-success">APPROVE</a>
                                        <?php
                                        }

                                        if ($rows['accepted'] == 1 && $rows['closed'] == 1 && $rows['price'] != '') {
                                            echo '<h4>Scrap is sold for INR ' . $rows['price'] . '</h4>';
                                        } else {
                                            echo '<h4 class="text-danger">CLOSED</h4>';
                                        }
                                    }
                                    if ($rows['approved'] == 1 && $_SESSION['SESS_USER_TYPE'] == 'buyer') {
                                        if ($rows['accepted'] == 0) {
                                        ?>
                                            <form action="actions/post/accept.php" method="post">
                                                <input type="hidden" name="token" value="<?php echo $token ?>">
                                                <div class="col-md-6">
                                                    <p>Choose a date to visit & accept the post</p>
                                                    <div class="input-group mb-3">
                                                        <input type="date" class="form-control form-control-lg" aria-describedby="button-addon2" name="visiting_date" required>
                                                        <button class="btn btn-success btn-lg" type="submit" id="button-addon2">Accept</button>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php
                                        }
                                        // echo $rows['accepted'].'/'.$rows['accepted_by'];
                                        if ($rows['accepted'] == 1 && $rows['accepted_by'] == $user && $rows['closed'] == 0) {
                                            echo '<h4>You Accepted this Post. You can fix a price now.</h4>';
                                        ?>
                                            <form action="actions/post/pricing.php" method="post">
                                                <input type="hidden" name="token" value="<?php echo $token ?>">
                                                <div class="col-md-6 mt-5">
                                                    <div class="input-group mb-3">
                                                        <input type="number" placeholder="enter amount" class="form-control form-control-lg" aria-describedby="button-addon2" name="price" required>
                                                        <button class="btn btn-success btn-lg" type="submit" id="button-addon2">Fix Price</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php
                                        }
                                        if ($rows['accepted'] == 1 && $rows['accepted_by'] == $user && $rows['closed'] == 1) {
                                            echo '<h4>Scrap is collected for INR ' . $rows['price'] . '</h4>';
                                        }
                                    }
                                    if ($_SESSION['SESS_USER_TYPE'] == 'vendor') {
                                        if ($rows['approved'] == 0) {
                                            if ($rows['status'] == 1) {
                                            ?>
                                                <a href="actions/post/status.php?token=<?php echo $token ?>&status=0" class="btn btn-dark">UN PUBLISH</a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="actions/post/status.php?token=<?php echo $token ?>&status=1" class="btn btn-success">PUBLISH</a>
                                            <?php
                                            }
                                            ?>
                                            <h5 class="mt-4">WAITING FOR APPROVAL FROM ADMIN</h5>
                                        <?php
                                        }
                                        if ($rows['accepted'] == 1 && $rows['closed'] == 0) {
                                        ?>
                                            <a href="actions/post/close.php?token=<?php echo $token ?>" class="btn btn-dark">CLOSE THIS POST</a>
                                    <?php
                                        }
                                        if ($rows['accepted'] == 1 && $rows['closed'] == 1 && $rows['price'] != '') {
                                            echo '<h4>Scrap is sold for INR ' . $rows['price'] . '</h4>';
                                        } else {
                                            echo '<h4 class="text-danger">CLOSED</h4>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
        <!-- contact-section end -->


        <!-- main-footer -->
        <footer class="main-footer">
            <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-13.png);"></div>
            <div class="footer-upper">
                <div class="auto-container">
                    <div class="upper-inner">
                        <figure class="footer-logo"><a href="index-2.html"><img src="assets/images/logo-2.png" alt=""></a></figure>
                        <div class="right-column">
                            <h3>Subscribe now</h3>
                            <div class="form-inner">
                                <form method="post" action="https://azim.hostlin.com/Wastix/contact.html">
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Your email" required>
                                        <button type="submit" class="theme-btn btn-one"><span>Subscribe</span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-top">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget about-widget mr_60">
                                <div class="widget-title">
                                    <h3>About</h3>
                                </div>
                                <div class="text-box">
                                    <p>Lorem ipsum dolor sit amet consectetur diam ultricies leo etiam nibh tristique.</p>
                                    <p>odio feugiat vitae libero vestibu viverra elementum luctus.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget ml_40">
                                <div class="widget-title">
                                    <h3>Links</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="index-2.html">About Us</a></li>
                                        <li><a href="index-2.html">Services</a></li>
                                        <li><a href="index-2.html">Case</a></li>
                                        <li><a href="index-2.html">Request Pickup</a></li>
                                        <li><a href="index-2.html">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget schedule-widget ml_60 mr_70">
                                <div class="widget-title">
                                    <h3>Working Hours</h3>
                                </div>
                                <div class="widget-content">
                                    <p>Tincidunt neque pretium lectus donec risus.</p>
                                    <ul class="schedule-list clearfix">
                                        <li>Mon - Fri: 9:00AM - 6:00PM</li>
                                        <li>Sat - Sun: 8:00AM - 4:00PM</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget contact-widget">
                                <div class="widget-title">
                                    <h3>Get In Touch</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="info-list mb_30 clearfix">
                                        <li><i class="icon-3"></i>Add: New Hyde Park, NY 11040</li>
                                        <li><i class="icon-2"></i>Email: <a href="mailto:example@info.com">example@info.com</a></li>
                                        <li><i class="icon-4"></i>Phone: <a href="tel:3336660000">333 666 0000</a></li>
                                    </ul>
                                    <ul class="social-links clearfix">
                                        <li><a href="index-4.html"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="index-4.html"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="index-4.html"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="index-4.html"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom centred">
                <div class="auto-container">
                    <div class="copyright">
                        <p>Copyright 2023 by <a href="index-2.html">wastix</a> template All Right Reserved.</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- main-footer -->



        <!--Scroll to top-->
        <div class="scroll-to-top">
            <div>
                <div class="scroll-top-inner">
                    <div class="scroll-bar">
                        <div class="bar-inner"></div>
                    </div>
                    <div class="scroll-bar-text">Go To Top</div>
                </div>
            </div>
        </div>
        <!-- Scroll to top end -->

    </div>


    <!-- jequery plugins -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/validation.js"></script>
    <script src="assets/js/jquery.fancybox.js"></script>
    <script src="assets/js/appear.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/parallax-scroll.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jQuery.style.switcher.min.js"></script>
    <!-- main-js -->
    <script src="assets/js/script.js"></script>

</body><!-- End of .page_wrapper -->


</html>