<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>

<body>
    <?php
// Get article data
require_once '../con.php';
$article       = abs((int) $_GET['id']);
$contentQuery  = "select * from contents where id_content='$article'";
$contentExe    = mysqli_query($con, $contentQuery);
$contentResult = mysqli_fetch_array($contentExe);
if (mysqli_num_rows($contentExe) > 0) {
    ?>
    <img src="../images/content/<?php echo $contentResult['image']; ?>" alt="image">
    <?php
echo $contentResult['body'];
    // Get writer
    $userQuery  = "select users.name from contents, users where users.id_user = contents.id_user and id_content='$article'";
    $userExe    = mysqli_query($con, $userQuery);
    $userResult = mysqli_fetch_array($userExe);
    echo "<br/>Ditulis oleh " . $userResult['name'];
} else {
    include '../404.php';
}
?>
    <div id="disqus_thread"></div>
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
</body>

</html>