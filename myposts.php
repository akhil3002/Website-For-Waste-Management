<?php
include("include/auth.php");
include('include/dbConnect.php');
include('include/helper.php');
if ($_SESSION['SESS_USER_TYPE'] != 'admin' && $_SESSION['SESS_USER_TYPE'] != 'vendor') {
?>
    <script>
        window.location.href = 'myaccount.php';
    </script>
<?php
}
$qry_plus = '';
$title = 'MY POSTS';
if (isset($_GET['filter']) && trim($_GET['filter']) != '') {
    $filter = trim($_GET['filter']);
    if ($filter == 'accepted') {
        $qry_plus = " AND accepted = 1";
        $title = 'ACCEPTED POSTS';
    }
}
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
        <section class="contact-section pt_150 pb_150">
            <div class="auto-container">
                <div class="row">
                    <div class="card overflow-hidden p-0">
                        <div class="card-header bg-vanblue  ">
                            <h3 class="cw">
                                <a href="myposts.php" class="mr-2"><i class="fa fa-arrow-left"></i></a>
                                MY POSTS
                            </h3>
                        </div>
                        <div class="contact-middle" style="padding: 0;">
                            <form action="create-post.php" method="post" enctype="multipart/form-data">
                                <div class="card-body"><br>
                                    <table id="example" class="bg-white table table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Waste&nbsp;Type</th>
                                                <th>Title</th>
                                                <th width="400">Description</th>
                                                <th>Address</th>
                                                <th width="150">Image</th>
                                                <th>Dated</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $qry = $db->prepare("SELECT * FROM posts WHERE created_by = '$user' $qry_plus  ORDER BY id DESC");
                                            $qry->execute();
                                            if ($qry->rowcount() > 0) {
                                                for ($i = 0; $rows = $qry->fetch(); $i++) {
                                                    $post_token = $rows['token'];
                                                    $qry_waste_process = $db->prepare("SELECT * FROM waste_process WHERE post_token = '$post_token'");
                                                    $qry_waste_process->execute();
                                                    $accepted = $qry_waste_process->rowcount();
                                                    if ($accepted > 0) {
                                                        $row_waste_process = $qry_waste_process->fetch();
                                                        if ($row_waste_process['accept_type'] == 'buyer' || $row_waste_process['accept_type'] == 'admin') {
                                                            $qry_byer = $db->prepare("SELECT * FROM users WHERE token = '" . $row_waste_process['accepted_by'] . "'");
                                                            $qry_byer->execute();
                                                            $row_byer = $qry_byer->fetch();

                                                            $collection = 'Collection date:' . date_convert($row_waste_process['collection_date']) . '<br>By: ' . $row_byer['name'];
                                                        } elseif ($row_waste_process['accept_type'] == 'buyer_admin' && $row_waste_process['collection_date'] == '') {
                                                            $collection = 'Collect by Waste Catalogue.';
                                                        } elseif ($row_waste_process['accept_type'] == 'buyer_admin') {
                                                            $collection = 'Collection date:' . date_convert($row_waste_process['collection_date']) . ' by Waste Catalogue.';
                                                        }
                                                    }
                                            ?>
                                                    <tr>
                                                        <td>
                                                        <?php echo ucwords($rows['waste_type']) ?>
                                                        </td>
                                                        <td>
                                                            <?php echo ucwords($rows['title']) ?>
                                                        </td>
                                                        <td><?php
                                                            if (strlen($rows['description']) > 200) {
                                                                echo substr($rows['description'], 0, 200) . '...';
                                                            } else {
                                                                echo $rows['description'];
                                                            } ?>
                                                        </td>
                                                        <td><?php echo ($rows['address']) ?></td>
                                                        <td><img src="<?php echo 'images/' . $rows['image'] ?>" width="150px"></td>
                                                        <td><?php echo ucwords($rows['created_at']) ?></td>
                                                        <td><?php
                                                            if ($accepted == 0) {
                                                                if ($rows['status'] == 1) {
                                                                    echo '<span class="text-success bold">PUBLISHED</span>';
                                                                } else {
                                                                    echo '<span class="text-danger bold">NOT PUBLISHED</span>';
                                                                }
                                                            } else {
                                                                if ($row_waste_process['status'] == 1) {
                                                                    echo '<span class="text-success bold">ACCEPTED</span>';
                                                                    echo '<br>' . $collection;
                                                                } else if ($row_waste_process['status'] == 2) {
                                                                    $qry_invoice = $db->prepare("SELECT * FROM invoice WHERE post_token = '$post_token'");
                                                                    $qry_invoice->execute();
                                                                    $row_invoice = $qry_invoice->fetch();

                                                                    echo '<span class="text-success bold">INVOICED</span>';
                                                                    echo '<br>' . 'Rs. ' . $row_invoice['total'];
                                                                } else if ($row_waste_process['status'] == 3) {
                                                                    echo '<span class="text-success bold">TRANSIT</span>';
                                                                    echo '<br>' . $collection;
                                                                } else if ($row_waste_process['status'] == 0) {
                                                                    echo '<span class="text-danger bold">CLOSED</span>';
                                                                    echo '<br>' . $collection;
                                                                }
                                                            }
                                                            ?></td>
                                                        <td class="text-center">
                                                            <div class="btn-group btn-group-vertical">
                                                                <?php if ($rows['closed'] == 0) {
                                                                ?>
                                                                    <?php
                                                                    if ($rows['approved'] == 0) {
                                                                        if ($rows['status'] == 1) {
                                                                    ?>
                                                                            <a href="actions/myposts/status.php?token=<?php echo $rows['token'] ?>" class="btn btn-danger btn-sm cw">UNPUBLISH</a>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <a href="actions/myposts/status.php?token=<?php echo $rows['token'] ?>" class="btn btn-success btn-sm cw">PUBLISH</a>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                        <a href="edit-post.php?token=<?php echo $rows['token'] ?>" class="btn btn-primary btn-sm cw">EDIT</a>
                                                                <?php
                                                                    }
                                                                } ?>
                                                                <a href="post-details.php?token=<?php echo $rows['token'] ?>" class="btn btn-success btn-sm cw">VIEW</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php }
                                            } else { ?>
                                                <tr>
                                                    <td colspan="6" class="text-center text-danger">
                                                        <h3 class="mt-2 mb-2">NO POSTS FOUND</h3>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Address</th>
                                                <th>Image</th>
                                                <th>Dated</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <button type="button" onclick="location.href = 'create-post.php';" class="btn btn-success btn-lg pull-left me-2">NEW POST</button>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
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