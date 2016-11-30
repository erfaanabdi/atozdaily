
<!DOCTYPE html>
<html lang="fa">


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
    if($routes[$len-1]=="fa" or $routes[$len-2]=="fa")
        include('main.php');
    else
        include('news.php');
    ?>

</html>
