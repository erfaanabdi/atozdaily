
<!DOCTYPE html>
<html lang="en">
<head>

    <?php

    function getCurrentUri()
    {
        $uri = $_SERVER['REQUEST_URI'];
        if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
        $uri = '/' . trim($uri, '/');
        return $uri;
    }

    $base_url = getCurrentUri();
    $routes = array();
    $routes = explode('/', $base_url);
    $len = count($routes);
    $news_url ="";
    $news_title ="";
    $news_description="";
    $news_keywords="";
    $handle = fopen("/var/www/atozpython/".$routes[$len-3]."/".$routes[$len-2]."/desc/".$routes[$len-1], "r");
    if ($handle) {
        $news_url=fgets($handle);
        $news_title=fgets($handle);
        $news_description=fgets($handle);
        $news_keywords=fgets($handle);


        fclose($handle);
    } else {
        print $routes[$len-1];
        // error opening the file.
    }
    ?>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="The article in AtoZdaily, <?php print $news_description ?>">
    <meta name="keywords" content="<?php print $news_keywords ?>">

    <meta name="author" content="atozdaily">
    <link rel="icon" href="../../favicon.ico">

    <title><?php print $news_title ?> - The AtoZdaily</title>

    <!-- Bootstrap core CSS -->

    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/core-en.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">
                <img style="height: 100%;" alt="Brand" src="../../logo/atoz.png">
            </a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <p class="navbar-text navbar-right">Read latest news from different sources here</p>
            </ul>

        </div><!--/.nav-collapse -->
    </div>
</nav>




<section class="container">
    <!-- Main component for a primary marketing message or call to action -->
    <main class="jumbotron">

        <img id="logo"  src="<?php print "../../logo/".$routes[$len-2].".png"?>" />
        <h1 style="display: inline" class="headline">
            <?php print $news_title?></h1>
        <h3 style="font-weight: bold;"><span style="float:left;" class="glyphicon glyphicon glyphicon-align-left" aria-hidden="true"></span>
             <?php print $news_description ?>
            <span style="float:right;" class="glyphicon glyphicon glyphicon-align-right" aria-hidden="true"></span>
        </h3>
        <hr style="clear:both;">

        <?php
        $file = file_get_contents("/var/www/atozpython/".$routes[$len-3]."/".$routes[$len-2]."/news/".$routes[$len-1]);

        print $file;

        ?>
        <hr>
        <p>Read the original article <a href="<?php print $news_url?>">here</a> </p>
    </main>

</section> <!-- /container -->


</body>
</html>
