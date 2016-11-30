<head>
    <link rel="stylesheet" href="http://ifont.ir/apicode/17">
    <meta http-equiv="content-language" content="fa" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Read latest news from different sources here">
    <meta name="keywords" content="newsreader, news, atozdaily">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />

    <meta name="author" content="atozdaily">
    <link rel="icon" href="../../favicon.ico">

    <title>آخرین اخبار را یکجا در اینجا بخوانید - The AtoZdaily</title>

    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="../css/core-fa.css?2" rel="stylesheet">

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
            <a class="navbar-brand" href="/fa/">
                <img style="height: 100%;" alt="Brand" src="../logo/atoz.png">
            </a>

        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <p class="navbar-text navbar-right">آخرین اخبار را یکجا در اینجا بخوانید</p>

            </ul>

        </div><!--/.nav-collapse -->
    </div>
</nav>
<section id="maincontent" class="list-group">

    <div id="topstories" class="row">
<?php
        $file = file_get_contents("/var/www/atozpython/fa/top");

        print $file;
    ?></div>

    <?php
    $start=0;
    if ($routes[$len-1]!="fa"){
        if($routes[$len-1]>=9){
            $start=9;
        }elseif ($routes[$len-1]>=9){
            $start=0;
        }else{
            $start=$routes[$len-1];
        }
    }
    $start=$start*40;
   // $file = file_get_contents("/var/www/atozpython/fa/index");
    $file = new SplFileObject('/var/www/atozpython/fa/index');
    $file->seek($start);
    for($i = 0; !$file->eof() && $i < 40; $i++) {
        print $file->current();
        $file->next();
    }

    //print $file;

    ?>
</section>
<div style="margin-left: auto;margin-right: auto;">
   <div  class="pagenav" >
        <a  href="<?php print "/fa/".max($start/40-1,0); ?>" class="btn btn-primary btn-lg active" <?php if ($start/40==0) print 'disabled="disabled"';?> role="button">صفحه قبل</a>
    </div>
    <div class="pagenav" >
        <a href="<?php print "/fa/".min($start/40+1,9); ?>" class="btn btn-primary btn-lg active" <?php if ($start/40==9) print 'disabled="disabled"';?> role="button">صفحه بعد</a>
    </div>
</div>
</body>
