<!DOCTYPE html>
<html >
<head>
  <!-- Site made with Mobirise Website Builder v4.8.8, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.8.8, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="/golkam/assets/frontend/assets/images/index.png" type="image/x-icon">
  <meta name="description" content="Homepage">
  <title>Golkam E-Learning</title>
  <link rel="stylesheet" href="/golkam/assets/frontend/assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="/golkam/assets/frontend/assets/tether/tether.min.css">
  <link rel="stylesheet" href="/golkam/assets/frontend/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/golkam/assets/frontend/assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="/golkam/assets/frontend/assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="/golkam/assets/frontend/assets/dropdown/css/style.css">
  <link rel="stylesheet" href="/golkam/assets/frontend/assets/animatecss/animate.min.css">
  <link rel="stylesheet" href="/golkam/assets/frontend/assets/socicon/css/styles.css">
  <link rel="stylesheet" href="/golkam/assets/frontend/assets/theme/css/style.css">
  <link rel="stylesheet" href="/golkam/assets/frontend/assets/mobirise/css/mbr-additional.css" type="text/css">



</head>
<body id="top">
  <section class="menu cid-rbxbpQrx3u" once="menu" id="menu1-2g">



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
                <span class="navbar-logo">
                    <a href="#top">
                         <img src="/golkam/assets/frontend/assets/images/index.png" alt="Mobirise" title="" style="height: 3.8rem;">
                    </a>
                </span>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-white display-7" href="#top">

                        Home<br></a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link link text-white display-7" href="#about">
                        About Us
                        </a></li>
                    <li class="nav-item">
                        <a class="nav-link link text-white display-7" href="#article">
                        Article</a></li>
                        <li class="nav-item">
                            <a class="nav-link link text-white display-7" href="#tabs4-2j">
                        Lesson</a></li>
                        <li class="nav-item"><a class="nav-link link text-white display-7" href="#contact">
                        Contact Us&nbsp;</a></li></ul>

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
    <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-7" href="/golkam/login">Sign In</a></div>
    <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-7" href="/golkam/register">Sign Up</a></div>
<?php
}
?>
    </nav>
</section>

<section class="engine"><a href="https://mobirise.info/n">free simple web templates</a></section><section class="cid-rbxbqM4fod mbr-fullscreen mbr-parallax-background" id="header2-2h">

    <div class="container align-center">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                 <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1">Your Favorite E-Learning Website</h1>
                 <hr>
                  <p class="mbr-text align-center pb-3 display-5 text-faded">
Golkam E-Learning help you learn your daily need of code and also help you interact with other users.</p>
                <div class="mbr-section-btn align-center"><a class="btn btn-md btn-primary display-4" href="/golkam/lesson">
                    <span class="">Start Your Journey</span></a>
                </div>
            </div>
            </div>
        </div>
    <div class="mbr-arrow hidden-sm-down" aria-hidden="true">
        <a href="#next">
            <i class="mbri-down mbr-iconfont"></i>
        </a>
    </div>
</section>

<section class="features1 cid-rbt12aMAD4" id="about">




    <div class="container">
        <h2 class="mbr-section-title align-center pb-5 mbr-fonts-style display-2">
           About Us
        </h2>

    </div>
        <div class="media-container-row pt-5">
 <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-img pb-3">
                    <span class="mbr-iconfont mbri-globe"></span>
                </div>
                <div class="card-box">
                    <h4 class="card-title py-3 mbr-fonts-style display-5">
                        Online Course
                    </h4>
                    <p class="mbr-text mbr-fonts-style display-7">
                        Online learning program using a variety of learning method based on professional paths and expertise.
                    </p>
                </div>
            </div>
            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-img pb-3">
                    <span class="mbri-touch"></span>
                </div>
                <div class="card-box">
                    <h4 class="card-title py-3 mbr-fonts-style display-5">
                        Mobile Friendly
                    </h4>
                    <p class="mbr-text mbr-fonts-style display-7">
                        Any places you want even in the bathroom with ur phone you still can acsess Golkam E-Learning with ease. You don't always have to use your laptop when golkam can be accessed in your smarthphone.
                    </p>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-img pb-3">
                    <span class=" mbri-hearth"></span>
                </div>
                <div class="card-box">
                    <h4 class="card-title py-3 mbr-fonts-style display-5">
                        Made With Love
                    </h4>
                    <p class="mbr-text mbr-fonts-style display-7">
                        Golkam offers many learning program in several way, and though these are free, we still made it to the content of our heart.
                    </p>
                </div>
            </div>
            </div>
    </div>
</section>

<section class="mbr-section info2 cid-rbt2QQK0HB" id="article">
    <div class="container">
        <div class="row main justify-content-center">
            <div class="media-container-column col-12 col-lg-3 col-md-4">
                <div class="mbr-section-btn align-left py-4">
                    <a class="btn btn-primary display-4" href="/golkam/blog">
                    <span class="mbri-preview mbr-iconfont"></span>
                    SEE MORE
                    </a>
                </div>
            </div>
            <div class="media-container-column title col-12 col-lg-7 col-md-6">
                <h2 class="align-right mbr-bold mbr-white pb-3 mbr-fonts-style display-2">
                    Article List</h2>
                <h3 class="mbr-section-subtitle align-right mbr-light mbr-white mbr-fonts-style display-5">
                    Read some article by our users and get faedah.</h3>
            </div>
        </div>
    </div>
</section>

<section class="tabs4 cid-rbxfAwsysr" id="tabs4-2j">
    <div class="container">
        <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
            Lesson List</h2>
        <h3 class="mbr-section-subtitle align-center mbr-light mbr-fonts-style display-5">        </h3>
        <div class="media-container-row mt-5 pt-3">
            <div class="mbr-figure" style="width: 60%;">
                <img src="/golkam/assets/frontend/assets/images/lesson.jpg" alt="Mobirise" title="">
            </div>
            <div class="tabs-container">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link mbr-fonts-style active show display-7" role="tab" data-toggle="tab" href="#tabs4-2j_tab0" aria-selected="true">
                            HTML</a></li>
                    <li class="nav-item"><a class="nav-link mbr-fonts-style active show display-7" role="tab" data-toggle="tab" href="#tabs4-2j_tab1" aria-selected="true">
                            PHP</a></li>
                    <li class="nav-item"><a class="nav-link mbr-fonts-style active show display-7" role="tab" data-toggle="tab" href="#tabs4-2j_tab2" aria-selected="true">
                            CSS</a></li>
                    <li class="nav-item"><a class="nav-link mbr-fonts-style active show display-7" role="tab" data-toggle="tab" href="#tabs4-2j_tab5" aria-selected="true">Python</a></li>
                    <a class="nav-link mbr-fonts-style active show display-7" href="/golkam/lesson" aria-selected="true">
                            Read More</a>
                </ul>
                <div class="tab-content">
                    <div id="tab1" class="tab-pane in active" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mbr-text py-5 mbr-fonts-style display-7">
                                    Hypertext Markup Language is the standard markup language for creating web pages and web applications. With Cascading Style Sheets and JavaScript, it forms a triad of cornerstone technologies for the World Wide Web. <a href="">Read More..</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div id="tab2" class="tab-pane" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mbr-text py-5 mbr-fonts-style display-7">
                                    PHP: Hypertext Preprocessor is a server-side scripting language designed for Web development, and also used as a general-purpose programming language. It was originally created by Rasmus Lerdorf in 1994; the PHP reference implementation is now produced by The PHP Group. <a href="">Read More..</a> </p>
                            </div>
                        </div>
                    </div>
                    <div id="tab3" class="tab-pane" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mbr-text py-5 mbr-fonts-style display-7">
                                    Cascading Style Sheets is a style sheet language used for describing the presentation of a document written in a markup language like HTML. CSS is a cornerstone technology of the World Wide Web, alongside HTML and JavaScript. <a href="">Read More..</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div id="tab4" class="tab-pane" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mbr-text py-5 mbr-fonts-style display-7">
                                    Python is an interpreted high-level programming language for general-purpose programming. Created by Guido van Rossum and first released in 1991, Python has a design philosophy that emphasizes code readability, notably using significant whitespace. <a href="">Read More..</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div id="tab5" class="tab-pane" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mbr-text py-5 mbr-fonts-style display-7">
                                   <a href="lesson.html">Click me to continue</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div id="tab6" class="tab-pane" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="mbr-text py-5 mbr-fonts-style display-7">
                                    Choose from the large selection of latest pre-made blocks - full-screen intro, bootstrap carousel, content slider, responsive image gallery with lightbox, parallax scrolling, video backgrounds, hamburger menu, sticky header and more.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="features16 cid-rbt25T0hOe" id="team">



    <div class="container align-center">
        <h2 class="pb-3 mbr-fonts-style mbr-section-title display-2">
            OUR AWESOME TEAM
        </h2>
        <h3 class="pb-5 mbr-section-subtitle mbr-fonts-style mbr-light display-5"></h3>
        <div class="row media-row">

        <div class="team-item col-lg-4 col-md-6">
                <div class="item-image">
                    <img src="/golkam/assets/frontend/assets/images/nchudlori.jpg" alt="" title="" style="filter: grayscale(0.5);">
                </div>
                <div class="item-caption py-3">
                    <div class="item-name px-2">
                        <p class="mbr-fonts-style display-5">
                           N Chud Lori</p>
                    </div>
                    <div class="item-role px-2">
                        <p>Ceo &amp; Founder</p>
                    </div>
                    <div class="item-social pt-2">
                        <a href="https://twitter.com/mobirise" target="_blank">
                            <span class="p-1 socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                        <a href="https://www.facebook.com/pages/Mobirise/1616226671953247" target="_blank">
                            <span class="p-1 socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                        <a href="https://plus.google.com/u/0/+Mobirise" target="_blank">
                            <span class="p-1 socicon-googleplus socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                        <a href="https://www.linkedin.com/in/mobirise" target="_blank">
                            <span class="p-1 socicon-linkedin socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                        <a href="https://www.instagram.com/mobirise/" target="_blank">

                        </a>
                        <a href="https://www.youtube.com/channel/UCt_tncVAetpK5JeM8L-8jyw" target="_blank">

                        </a>
                    </div>
                </div>
            </div><div class="team-item col-lg-4 col-md-6">
                <div class="item-image">
                    <img src="/golkam/assets/frontend/assets/images/shinta.jpg" alt="" title="" style="filter: grayscale(0.5);">
                </div>
                <div class="item-caption py-3">
                    <div class="item-name px-2">
                        <p class="mbr-fonts-style display-5">
                           Shinta Dwidanti</p>
                    </div>
                    <div class="item-role px-2">
                        <p>Developer</p>
                    </div>
                    <div class="item-social pt-2">
                        <a href="https://twitter.com/mobirise" target="_blank">
                            <span class="p-1 socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                        <a href="https://www.facebook.com/pages/Mobirise/1616226671953247" target="_blank">
                            <span class="p-1 socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                        <a href="https://plus.google.com/u/0/+Mobirise" target="_blank">
                            <span class="p-1 socicon-googleplus socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                        <a href="https://www.linkedin.com/in/mobirise" target="_blank">
                            <span class="p-1 socicon-linkedin socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                        <a href="https://www.instagram.com/mobirise/" target="_blank">

                        </a>
                        <a href="https://www.youtube.com/channel/UCt_tncVAetpK5JeM8L-8jyw" target="_blank">

                        </a>
                    </div>
                </div>
            </div><div class="team-item col-lg-4 col-md-6">
                <div class="item-image">
                    <img src="/golkam/assets/frontend/assets/images/ahmdyasir.jpg" alt="" title="" style="filter: grayscale(0.5);">
                </div>
                <div class="item-caption py-3">
                    <div class="item-name px-2">
                        <p class="mbr-fonts-style display-5">
                           Ahmad Yasir</p>
                    </div>
                    <div class="item-role px-2">
                        <p>Web Designer</p>
                    </div>
                    <div class="item-social pt-2">
                        <a href="https://twitter.com/mobirise" target="_blank">
                            <span class="p-1 socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                        <a href="https://www.facebook.com/pages/Mobirise/1616226671953247" target="_blank">
                            <span class="p-1 socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                        <a href="https://plus.google.com/u/0/+Mobirise" target="_blank">
                            <span class="p-1 socicon-googleplus socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                        <a href="https://www.linkedin.com/in/mobirise" target="_blank">
                            <span class="p-1 socicon-linkedin socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                        <a href="https://www.instagram.com/mobirise/" target="_blank">

                        </a>
                        <a href="https://www.youtube.com/channel/UCt_tncVAetpK5JeM8L-8jyw" target="_blank">

                        </a>
                    </div>
                </div>
            </div></div>
    </div>
</section>

<section class="mbr-section form1 cid-rbwKc4gr0z" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                    CONTACT FORM
                </h2>
                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                    Easily add subscribe and contact forms without any server-side integration.
                </h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" data-form-type="formoid">
                    <div data-form-alert="" hidden="">
                        Thanks for filling out the form!
                    </div>

                    <form class="mbr-form" action="https://mobirise.com/" method="post" data-form-title="Mobirise Form"><input type="hidden" name="email" data-form-email="true" value="FyPKFBHwsjgcVAK0mVF2YdSk1gb5HPkfojqIjUEb00O7VKai4/EmGiNSTOyLCxO0Ch9Bri/DxWRZsPMzHEbkh/vOUJpXRWlis+4tA1cB7Ymzz+JotI53pKDtMXuzI64a">
                        <div class="row row-sm-offset">
                            <div class="col-md-4 multi-horizontal" data-for="name">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="name-form1-2a">Name</label>
                                    <input type="text" class="form-control" name="name" data-form-field="Name" required="" id="name-form1-2a">
                                </div>
                            </div>
                            <div class="col-md-4 multi-horizontal" data-for="email">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="email-form1-2a">Email</label>
                                    <input type="email" class="form-control" name="email" data-form-field="Email" required="" id="email-form1-2a">
                                </div>
                            </div>
                            <div class="col-md-4 multi-horizontal" data-for="phone">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="phone-form1-2a">Phone</label>
                                    <input type="tel" class="form-control" name="phone" data-form-field="Phone" id="phone-form1-2a">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" data-for="message">
                            <label class="form-control-label mbr-fonts-style display-7" for="message-form1-2a">Message</label>
                            <textarea type="text" class="form-control" name="message" rows="7" data-form-field="Message" id="message-form1-2a"></textarea>
                        </div>

                        <span class="input-group-btn">
                            <button href="" type="submit" class="btn btn-primary btn-form display-4">SEND FORM</button>
                        </span>
                    </form>
            </div>
        </div>
    </div>
</section>

<section class="cid-rbsUDEJNcE" id="social-buttons3-w">
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
</section>

<section once="" class="cid-rbsoAOGMvC mbr-reveal" id="footer7-g">





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
  <script src="/golkam/assets/frontend/assets/dropdown/js/script.min.js"></script>
  <script src="/golkam/assets/frontend/assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="/golkam/assets/frontend/assets/viewportchecker/jquery.viewportchecker.js"></script>
  <script src="/golkam/assets/frontend/assets/parallax/jarallax.min.js"></script>
  <script src="/golkam/assets/frontend/assets/mbr-tabs/mbr-tabs.js"></script>
  <script src="/golkam/assets/frontend/assets/sociallikes/social-likes.js"></script>
  <script src="/golkam/assets/frontend/assets/theme/js/script.js"></script>
  <script src="/golkam/assets/frontend/assets/formoid/formoid.min.js"></script>


 <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i></i></a></div>
    <input name="animation" type="hidden">
  </body>
</html>
