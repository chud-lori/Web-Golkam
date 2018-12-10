<!DOCTYPE html>
<html>

<head>
    <!-- Site made with Mobirise Website Builder v4.8.8, https:/mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.8.8, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="/golkam/assets/frontend/assets/images/index.png" type="image/x-icon">
    <meta name="description" content="Web Builder Description">
    <title>Lesson</title>
    <link rel="stylesheet" href="/golkam/assets/frontend/assets/tether/tether.min.css">
    <link rel="stylesheet" href="/golkam/assets/frontend/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/golkam/assets/frontend/assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/golkam/assets/frontend/assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/golkam/assets/frontend/assets/animatecss/animate.min.css">
    <link rel="stylesheet" href="/golkam/assets/frontend/assets/socicon/css/styles.css">
    <link rel="stylesheet" href="/golkam/assets/frontend/assets/theme/css/style.css">
    <link rel="stylesheet" href="/golkam/assets/frontend/assets/mobirise/css/mbr-additional.css" type="text/css">



</head>

<body>
    <section class="menu cid-rbxbpQrx3u" once="menu" id="menu1-2g">



        <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm bg-color transparent">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="menu-logo">
                <div class="navbar-brand">
                    <span class="navbar-logo">
                        <a href="/golkam">
                            <img src="/golkam/assets/frontend/assets/images/index.png" alt="Mobirise" title="" style="height: 3.8rem;">
                        </a>
                    </span>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                            <li class="nav-item">
                                <a class="nav-link link text-white display-4" href="#"></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link text-white display-7" href="/golkam">

                                    Home<br></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link text-white display-7" href="/golkam#about">
                                    About Us
                                </a></li>
                            <li class="nav-item">
                                <a class="nav-link link text-white display-7" href="/golkam/blog">
                                    Article</a></li>
                            <li class="nav-item">
                                <a class="nav-link link text-white display-7" href="/golkam/lesson">
                                    Lesson</a></li>
                            <li class="nav-item"><a class="nav-link link text-white display-7" href="/golkam#contact">
                                    Contact Us&nbsp;</a></li>
                        </ul>

                    </div>
                </div>
            </div>
            <?php
session_start();
// Check cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    // Initiaion to variable
    $id  = $_COOKIE['id'];
    $key = $_COOKIE['key'];
  
    // Get user data from id
    $result = mysqli_query($con, "select * from users where id_user = '$id' and role='member'");
    $row    = mysqli_fetch_array($result);
  
    // Check cookie and username
    if ($key === hash('sha256', $row['username'])) {
      // Duplicate session
      $_SESSION['login_user'] =  $row['username'];
    }
  }
  
  if(isset($_SESSION['login_user'])){
    ?>

            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-7" href="/golkam/profile">Profile</a></div>
            <?php
}
else{
    ?>
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-7" href="/golkam/login">Sign
                    In</a></div>
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-7" href="/golkam/register">Sign
                    Up</a></div>
            <?php
}
?>
        </nav>
    </section>

    <section class="mbr-section content4 cid-rby44sNwo3 pt-5 pb-5" id="content4-2s">
        <div class="container">
            <div class="media-container-row">
                <div class="title col-12 col-md-8">
                    <h2 class="align-center pb-3 mbr-fonts-style display-1">
                        Lesson List</h2>
                    <h3 class="mbr-section-subtitle align-center mbr-light mbr-fonts-style display-5">
                        Shape Yourself by taking lesson we offer</h3>

                </div>
            </div>
        </div>
    </section>


    <section class="features4 cid-rbt9YmwG4H" id="features4-1e">

    </section>

    <section class="features4 cid-rbt9Z7wv7X" id="features4-1f">

        <div class="container">
            <div class="media-container-row">
                <?php
                // Pagination
                require_once '../con.php';
                $jumlahDataPerhalaman = 3;
                $result = mysqli_query($con, "select * from lessons");
                $jumlahData = mysqli_num_rows($result);
                $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
                $halamanAktif = isset($_GET['page']) ? $halamanAktif = $_GET['page'] : 1;
                $awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;
        $query = "select * from lessons order by id_lesson desc limit $awalData, $jumlahDataPerhalaman";
        $result = mysqli_query($con, $query);

        while ($data = mysqli_fetch_array($result)) {
            ?>
                <div class="card p-3 col-12 col-md-6 col-lg-4">
                    <div class="card-wrapper media-container-row media-container-row">
                        <div class="card-box">
                            <h4 class="card-title pb-3 mbr-fonts-style display-7">
                                <?php echo $data['lesson_name'] ?>
                            </h4>
                            <p class="mbr-text mbr-fonts-style display-7">
                                <?php echo $data['lesson_desc'] ?>
                            </p>
                            <a href="lesson.php?id=<?php echo $data['id_lesson'] ?>"" class=" btn-sm btn-primary">detail</a>

                        </div>
                    </div>
                </div>

                <?php
        }

    ?>
            </div>
        </div>
        <div class="container">
            <div class="media-container-row">
                <div class="card p-3 col-12 col-md-6 col-lg-4">
                    <nav aria-label="...">
                        <!-- Navigasi pagination -->
    <ul class="pagination">
    <?php 
    // Panah balik
        if ($halamanAktif > 1) {?>
            <a class="page-link" href="?page=<?= $halamanAktif - 1; ?>" tabindex="-1">Previous</a>
        <?php
        }
        for ($i=1; $i <= $jumlahHalaman ; $i++) { 

            if ($i == $halamanAktif) {?>
                <li class="page-item active"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
            <?php
            }
            else{?>
                <li class="page-item"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
            <?php
            }
        
        }
    // Panah kanan
    if ($halamanAktif < $jumlahHalaman) {?>
        <a class="page-link" href="?page=<?= $halamanAktif + 1; ?>">Next</a>
    <?php
    }
    ?>
    </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="cid-rbta6wTIuT" id="social-buttons3-1j">
    <div class="container">
        <div class="media-container-row">
            <div class="col-md-8 align-center">
                <h2 class="pb-3 mbr-section-title mbr-fonts-style display-2">
                    SHARE THIS PAGE!
                </h2>
                <div>
                    <div class="mbr-social-likes">
                        <span class="btn btn-social socicon-bg-facebook facebook mx-2" title="Share link on Facebook">
                            <i class="socicon socicon-facebook"></i>
                        </span>
                        <span class="btn btn-social twitter socicon-bg-twitter mx-2" title="Share link on Twitter">
                            <i class="socicon socicon-twitter"></i>
                        </span>
                        <span class="btn btn-social plusone socicon-bg-googleplus mx-2" title="Share link on Google+">
                            <i class="socicon socicon-googleplus"></i>
                        </span>
                        <span class="btn btn-social vkontakte socicon-bg-vkontakte mx-2" title="Share link on VKontakte">
                            <i class="socicon socicon-vkontakte"></i>
                        </span>
                        <span class="btn btn-social odnoklassniki socicon-bg-odnoklassniki mx-2" title="Share link on Odnoklassniki">
                            <i class="socicon socicon-odnoklassniki"></i>
                        </span>
                        <span class="btn btn-social pinterest socicon-bg-pinterest mx-2" title="Share link on Pinterest">
                            <i class="socicon socicon-pinterest"></i>
                        </span>
                        <span class="btn btn-social mailru socicon-bg-mail mx-2" title="Share link on Mailru">
                            <i class="socicon socicon-mail"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

    <section class="mbr-section article content10 cid-rbta2cS8pP" id="content10-1g">



        <div class="container">
            <div class="inner-container" style="width: 80%;">
                <hr class="line" style="width: 100%;">
                <div class="section-text align-center mbr-white mbr-fonts-style display-5">“My number one piece of
                    advice is: You should learn how to program.” - Mark Zuckerberg</div>
                <hr class="line" style="width: 100%;">
            </div>
        </div>
    </section>

    <section once="" class="cid-rbsoAOGMvC mbr-reveal" id="footer7-1b">
        <div class="container">
            <div class="media-container-row align-center mbr-white">


                <div class="row row-copirayt">
                    <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                        © Copyright 2018 Golkam - All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
    </section>


    <script src="/golkam/assets/frontend/assets/web/assets/jquery/jquery.min.js"></script>
    <script src="/golkam/assets/frontend/assets/popper/popper.min.js"></script>
    <script src="/golkam/assets/frontend/assets/tether/tether.min.js"></script>
    <script src="/golkam/assets/frontend/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/golkam/assets/frontend/assets/smoothscroll/smooth-scroll.js"></script>
    <script src="/golkam/assets/frontend/assets/viewportchecker/jquery.viewportchecker.js"></script>
    <script src="/golkam/assets/frontend/assets/sociallikes/social-likes.js"></script>
    <script src="/golkam/assets/frontend/assets/theme/js/script.js"></script>


    <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i></i></a></div>
    <input name="animation" type="hidden">
</body>

</html>