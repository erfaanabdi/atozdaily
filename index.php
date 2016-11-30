<?php
header("Location: http://www.atozdaily.com/fa/"); /* Redirect browser */

/* Make sure that code below does not get executed when we redirect. */
exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Read latest news from different sources here">
    <meta name="keywords" content="newsreader, news, atozdaily">

    <meta name="author" content="atozdaily">
    <link rel="icon" href="../../favicon.ico">

    <title>The AtoZdaily - Read latest news from different sources here</title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/core.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <img style="height: 100%;" alt="Brand" src="logo/atoz.png">
            </a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>

                <p class="navbar-text navbar-right">Read latest news from different sources here</p>
            </ul>

        </div><!--/.nav-collapse -->
    </div>
</nav>

<section class="list-group">

    <?php
    $file = file_get_contents("/var/www/atozpython/en/index");

    print $file;

    ?>
</section>



</body>
</html>
