<?php
include('../session.php');
require_once '../con.php';

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
      $_SESSION['name'] =  $row['name'];
      $_SESSION['iduser'] =  $row['id_user'];
    }
  }
  
if(isset($_SESSION['login_user'])){
?>
<!DOCTYPE html>
<html >
<head>
  <!-- Site made with Mobirise Website Builder v4.8.8, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.8.8, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="/golkam/assets/frontend/assets/images/index.png" type="image/x-icon">
  <meta name="description" content="Website Maker Description">
  <title>Lesson</title>
  <link rel="stylesheet" href="/golkam/assets/frontend/assets/tether/tether.min.css">
  <link rel="stylesheet" href="/golkam/assets/frontend/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/golkam/assets/frontend/assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="/golkam/assets/frontend/assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="/golkam/assets/frontend/assets/facebook-plugin/style.css">
  <link rel="stylesheet" href="/golkam/assets/frontend/assets/socicon/css/styles.css">
  <link rel="stylesheet" href="/golkam/assets/frontend/assets/dropdown/css/style.css">
  <link rel="stylesheet" href="/golkam/assets/frontend/assets/animatecss/animate.min.css">
  <link rel="stylesheet" href="/golkam/assets/frontend/assets/theme/css/style.css">
  <link rel="stylesheet" href="/golkam/assets/frontend/assets/mobirise/css/mbr-additional.css" type="text/css">



</head>
<body>
<?php
        session_start();
        if(!empty($_SESSION['lessonGet'])) {
            $message = $_SESSION['lessonGet'];
            echo "<h1>$message</h1>";
            unset($_SESSION['lessonGet']);
        }
        
    ?>
    <?php
        error_reporting(E_ALL); ini_set('display_errors', '1');
        // Get id lesson
        $idLesson = $_GET['id'];

        // Get user Data
        $user = $_SESSION['login_user'];
        $getExe = mysqli_query($con, "select * from users where username='$user'");
        $getDataUser = mysqli_fetch_array($getExe);
        $idUser = $getDataUser['id_user'];

        // Get lesson data
        $queryLesson = "select * from lessons where id_lesson='$idLesson'";
        $resultLesson = mysqli_query($con, $queryLesson);
        $data = mysqli_fetch_array($resultLesson);

        // Check lesson added or not
        $queryCheck = "select * from learn where id_user='$idUser' and id_lesson='$idLesson'";
        $resultCheck = mysqli_query($con, $queryCheck);
        $w = mysqli_fetch_array($resultCheck);
        ?>
  <section class="menu cid-rbt9UdNAm5" once="menu" id="menu1-1q">



    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm bg-color transparent">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">


            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown navbar-nav-top-padding" data-app-modern-menu="true"><li class="nav-item">
                    
                        </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="/golkam">

                        Home<br></a>
                </li><li class="nav-item"><a class="nav-link link text-white display-4" href="/golkam#about">

                        About Us
                    </a></li><li class="nav-item"><a class="nav-link link text-white display-4" href="/golkam/blog">

                        Article</a></li><li class="nav-item"><a class="nav-link link text-white display-4" href="/golkam/lesson">

                        Lesson</a></li><li class="nav-item"><a class="nav-link link text-white display-4" href="/golkam#contact">

                        Contact Us&nbsp;</a></li></ul>
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-4" href="/golkam/profile">Profile</a></div>
        </div>
    </nav>
</section>

<section class="engine"><a href="https://mobirise.info/z">best free html templates</a></section><section class="mbr-section content4 cid-rbteUv3qRX" id="content4-1s">



    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2"><?php echo $data['lesson_name']; ?></h2>
            <?php       
                if(mysqli_num_rows($resultCheck) > 0){
                    ?>
            <h3 class="mbr-section-subtitle align-center mbr-light mbr-fonts-style display-5"><input type="button" disabled class="" value="Taken"></h3>
            <?php
        }
        else{
            ?>
            <h3 class="mbr-section-subtitle align-center mbr-light mbr-fonts-style display-5"><a href="lessonget.php?id=<?php echo $idLesson; ?>" class="btn-sm btn-primary">Take Lesson</a></h3>
            <?php
        }?>


            </div>
        </div>
    </div>
</section>

<!-- <section class="cid-rbtr5tW943" id="image1-1u">



    <figure class="mbr-figure container">
            <div class="image-block" style="width: 70%;">
                <img src="/golkam/assets/frontend/assets/images/1.jpg" width="1400" alt="Mobirise" title="">

            </div>
    </figure>
</section> -->

<section class="mbr-section article content1 cid-rbts9HDOQ3" id="content1-1v">

    <div class="container">
        <div class="media-container-row">
            <div class="mbr-text col-12 col-md-8 mbr-fonts-style display-7"><?php echo $data['lesson_desc']; ?></div>
        </div>
    </div>
</section>

<!-- <section class="mbr-section mbr-section__comments" id="facebook-comments-block-1w" data-rv-view="193" style="background-color: rgb(255, 255, 255); padding-top: 0rem; padding-bottom: 0rem;">

    <div class="mbr-section__container mbr-section__container-isolated addons-container">
        <div class="addons-row">


           <div class="addons-container-inner" data-shortname="ahmdyasir"><div class="disqusPlaceholder" data-numposts=""><h2>DISQUS COMMENTS WILL BE SHOWN ONLY WHEN YOUR SITE IS ONLINE</h2> <img src="/golkam/assets/frontend/assets/images/disqus-comments.jpg"></div></div>
        </div>
    </div>
</section> -->

<section once="" class="cid-rbsoAOGMvC mbr-reveal" id="footer7-1r">





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
  <script src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5"></script>
  <script src="https://apis.google.com/js/plusone.js"></script>
  <script src="/golkam/assets/frontend/assets/facebook-plugin/facebook-script.js"></script>
  <script src="/golkam/assets/frontend/assets/smoothscroll/smooth-scroll.js"></script>
  <script src="/golkam/assets/frontend/assets/viewportchecker/jquery.viewportchecker.js"></script>
  <script src="/golkam/assets/frontend/assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="/golkam/assets/frontend/assets/dropdown/js/script.min.js"></script>
  <script src="/golkam/assets/frontend/assets/theme/js/script.js"></script>


 <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i></i></a></div>
    <input name="animation" type="hidden">
  </body>
</html>

<?php
}
else{
	header("location: ../login");
}
?>