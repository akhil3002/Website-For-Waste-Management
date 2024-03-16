<?php
$token = $_SESSION['SESS_USER_TOKEN'];
$qry = $db->prepare("SELECT * FROM posts WHERE accepted_by = '$token'");
$qry->execute();
$mypost_count = $qry->rowcount();

$qry = $db->prepare("SELECT * FROM waste_process WHERE accept_type = 'buyer_admin' AND accepted_by = '$token'");
$qry->execute();
$forwardpost_count = $qry->rowcount();

$qry_ncount = $db->prepare("SELECT * FROM notification WHERE noti_to = '" . $_SESSION['SESS_USER_TOKEN'] . "' AND status = 0");
$qry_ncount->execute();
$nCountUnread = $qry_ncount->rowCount();

$qry_ncount = $db->prepare("SELECT * FROM notification WHERE noti_to = '" . $_SESSION['SESS_USER_TOKEN'] . "'");
$qry_ncount->execute();
$nCount = $qry_ncount->rowCount();
?>
<section class="feature-style-two centred">
    <div class="auto-container">
        <div class="sec-title mb_50">
            <h3 class="text-light">Hi <?php echo ucwords($_SESSION['SESS_USER_NAME']) ?><br>Welcome back to Wastix.</h3>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12 feature-block mt-5">
                <div class="feature-block-two wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="icon-box">
                            <div class="static-shape" style="background-image: url(assets/images/shape/shape-18.png);"></div>
                            <div class="overlay-shape" style="background-image: url(assets/images/shape/shape-19.png);"></div>
                            <div class="icon"><i class="icon-12"></i></div>
                        </div>
                        <h3>
                        <?php echo $mypost_count ?><br>
                            <a href="accepted-posts.php?filter=accepted">ACCEPTED POSTS</a>
                        </h3>
                        <div class="link">
                            <a href="accepted-posts.php?filter=accepted"><i class="icon-7"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 feature-block mt-5">
                <div class="feature-block-two wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="icon-box">
                            <div class="static-shape" style="background-image: url(assets/images/shape/shape-18.png);"></div>
                            <div class="overlay-shape" style="background-image: url(assets/images/shape/shape-19.png);"></div>
                            <div class="icon"><i class="icon-12"></i></div>
                        </div>
                        <h3>
                        &nbsp;<br>
                            <a href="posts.php">ALL POSTS</a>
                        </h3>
                        <div class="link">
                            <a href="posts.php"><i class="icon-7"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 feature-block mt-5">
                <div class="feature-block-two wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="icon-box">
                            <div class="static-shape" style="background-image: url(assets/images/shape/shape-18.png);"></div>
                            <div class="overlay-shape" style="background-image: url(assets/images/shape/shape-19.png);"></div>
                            <div class="icon"><i class="icon-12"></i></div>
                        </div>
                        <h3>
                        <?php echo $nCountUnread . '/' . $nCount ?><br>
                            <a href="notification.php">NOTIFICATIONS</a>
                        </h3>
                        <div class="link">
                            <a href="notification.php"><i class="icon-7"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-4 col-md-6 col-sm-12 feature-block mt-5">
                <div class="feature-block-two wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="icon-box">
                            <div class="static-shape" style="background-image: url(assets/images/shape/shape-18.png);"></div>
                            <div class="overlay-shape" style="background-image: url(assets/images/shape/shape-19.png);"></div>
                            <div class="icon"><i class="icon-12"></i></div>
                        </div>
                        <h3>
                        &nbsp;<br>
                            <a href="report.php">REPORT</a>
                        </h3>
                        <div class="link">
                            <a href="report.php"><i class="icon-7"></i></a>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-4 col-md-6 col-sm-12 feature-block mt-5">
                <div class="feature-block-two wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="icon-box">
                            <div class="static-shape" style="background-image: url(assets/images/shape/shape-18.png);"></div>
                            <div class="overlay-shape" style="background-image: url(assets/images/shape/shape-19.png);"></div>
                            <div class="icon"><i class="icon-12"></i></div>
                        </div>
                        <h3>
                        &nbsp;<br>
                            <a href="complaints.php">COMPLAINT/FEEDBACK</a>
                        </h3>
                        <div class="link">
                            <a href="complaints.php"><i class="icon-7"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 feature-block mt-5">
                <div class="feature-block-two wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="icon-box">
                            <div class="static-shape" style="background-image: url(assets/images/shape/shape-18.png);"></div>
                            <div class="overlay-shape" style="background-image: url(assets/images/shape/shape-19.png);"></div>
                            <div class="icon"><i class="icon-12"></i></div>
                        </div>
                        <h3>
                        &nbsp;<br>
                            <a href="update-password.php">UPDATE</a>
                        </h3>
                        <div class="link">
                            <a href="update-password.php"><i class="icon-7"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 feature-block mt-5">
                <div class="feature-block-two wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="icon-box">
                            <div class="static-shape" style="background-image: url(assets/images/shape/shape-18.png);"></div>
                            <div class="overlay-shape" style="background-image: url(assets/images/shape/shape-19.png);"></div>
                            <div class="icon"><i class="icon-12"></i></div>
                        </div>
                        <h3>
                        &nbsp;<br>
                            <a href="logout.php">LOGOUT</a>
                        </h3>
                        <div class="link">
                            <a href="logout.php"><i class="icon-7"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>