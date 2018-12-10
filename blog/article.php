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
  <title>Article</title>
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
// Get article data
require_once '../con.php';
$article       = abs((int) $_GET['id']);
$contentQuery  = "select * from contents where id_content='$article'";
$contentExe    = mysqli_query($con, $contentQuery);
$contentResult = mysqli_fetch_array($contentExe);
// Get writer
    $userQuery  = "select users.name from contents, users where users.id_user = contents.id_user and id_content='$article'";
    $userExe    = mysqli_query($con, $userQuery);
    $userResult = mysqli_fetch_array($userExe);
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

            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-4" href="/golkam/login">Profile</a></div>
            <?php
}
else{
    ?>
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-4" href="/golkam/login">Sign In</a></div>
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-4" href="/golkam/register">Sign Up</a></div>
            <?php
}
?>
        </div>
    </nav>
</section>
<?php
if (mysqli_num_rows($contentExe) > 0) {
    ?>
    <section class="engine"></section><section class="mbr-section content4 cid-rbteUv3qRX" id="content4-1s">
    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2"><?php echo $contentResult['title']; ?></h2>
                <h3 class="mbr-section-subtitle align-center mbr-light mbr-fonts-style display-5">by <?php echo $userResult['name']; ?></h3>                
            </div>
        </div>
    </div>
</section>

<section class="cid-rbtr5tW943" id="image1-1u">    
    <figure class="mbr-figure container">
            <div class="image-block" style="width: 70%;">
                <img src="../images/content/<?php echo $contentResult['image']; ?>" width="1400" alt="Tumbnail" title="">
            </div>
    </figure>
</section>

<section class="mbr-section article content1 cid-rbts9HDOQ3" id="content1-1v">
    <div class="container">
        <div class="media-container-row">
            <div class="mbr-text col-12 col-md-8 mbr-fonts-style display-7"><?php echo $contentResult['body']; ?>
        </div>
    </div>
</section>
    <?php
} else {
    include '../404.php';
}
?>
    

<section class="mbr-section mbr-section__comments" id="facebook-comments-block-1w" data-rv-view="193" style="background-color: rgb(255, 255, 255); padding-top: 0rem; padding-bottom: 0rem;">
         
    <div class="mbr-section__container mbr-section__container--isolated addons-container">
        <div class="addons-row">
            
            
           <!-- <div id="disqus_thread"></div> -->
    <script>
        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function () { // DON'T EDIT BELOW THIS LINE
            var d = document,
                s = d.createElement('script');
            s.src = 'https://localhost-tctndk5iou.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by
            Disqus.</a></noscript>

    <script id="dsq-count-scr" src="//localhost-tctndk5iou.disqus.com/count.js" async></script>
        </div>
    </div>
</section>

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