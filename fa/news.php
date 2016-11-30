
<?php

$file_name = $routes[$len-1];
if (!is_numeric($file_name)){
    print "The requested URL is not valid";
    exit();
}
$conn = mysqli_connect("127.0.0.1", "your user", "############################your password######################################", "your db");
$sSQL= 'SET CHARACTER SET utf8';

mysqli_query($conn,$sSQL);
if (!$conn) {
    exit;
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM record where a_id=$file_name";
$result = $conn->query($sql);

$agency="";
$news_url ="";
$news_title ="";
$news_description="";
$news_keywords="";

if ($result->num_rows > 0) {
    mysqli_query($conn,"
    UPDATE record 
    SET visit = visit + 1
    WHERE a_id = '".$file_name."'
    ");
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $agency=$row["agency"];
        $news_url=$row["url"];
        $news_title=$row["title"];
        $news_description=$row["description"];
        $topimage=$row["topimage"];
    }
} else {
    $agency=$routes[$len-2];
    $handle = fopen("/var/www/atozpython/".$routes[$len-3]."/".$routes[$len-2]."/desc/".$routes[$len-1], "r");
    if ($handle) {
        $news_url=fgets($handle);
        $news_title=fgets($handle);
        $news_description=fgets($handle);
        $news_keywords=fgets($handle);
        while (ctype_space($news_keywords)) {
            $news_keywords=fgets($handle);

        }

        $related_link=array();
        $related_title=array();

        while (!feof($handle)) {
            $related_title[] = fgets($handle);
            $related_link[] = fgets($handle);
        }
        $topimage=$related_title[count($related_title)-1];

        fclose($handle);
    }

}
$conn->close();

?>

<head>
    <meta property="og:image" content="<?php print $topimage;?>" />

    <link rel="stylesheet" href="http://ifont.ir/apicode/17">
<meta http-equiv="content-language" content="fa" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="<?php print $news_description ?> خواندن خبر در AtoZdaily">
<meta name="keywords" content="<?php print $news_keywords ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />

<meta name="author" content="atozdaily">
<link rel="icon" href="../../favicon.ico">

<title><?php print $news_title ?> - The AtoZdaily</title>

<!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="../../css/core-fa.css?2" rel="stylesheet">

</head>

<body>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-84256637-1', 'auto');
    ga('send', 'pageview');

</script>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header navbar-right">
            <a class="navbar-brand" href="/fa">
                <img style="height: 100%;" alt="Brand" src="../../logo/atoz.png">
            </a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <p class="navbar-text navbar-right">آخرین اخبار را یکجا در اینجا بخوانید</p>

            </ul>

        </div><!--/.nav-collapse -->
    </div>
</nav>



<section class="container">
    <!-- Main component for a primary marketing message or call to action -->

    <div class="row">
        <div class="col-xs-12 col-md-9">

        <main class="<?php print $agency; ?> jumbotron">
            <h1 style="display: inline;" class="headline">
                <?php print $news_title?></h1>

            <blockquote>

                <img id="logo"  src="<?php print "../../logo/".$routes[$len-2].".png"?>" />

                <h3><?php print $news_description ?>

            </h3>
            </blockquote>
            <hr style="clear:both;">
            <div id="content">

            <?php
            $file = file_get_contents("/var/www/atozpython/".$routes[$len-3]."/".$routes[$len-2]."/news/".$routes[$len-1]);

            print $file;

            ?>
            </div>
            <hr>
            <p>مقاله اصلی را  <a href="<?php print $news_url?>">اینجا</a> بخوانید </p>

        </main>
        </div>

        <div class="related col-xs-12 col-md-3">
        <?php
        $file = file_get_contents("/var/www/atozpython/fa/last");

        print $file;

        ?>


        </div>
    </div>
</section> <!-- /container -->


</body>
