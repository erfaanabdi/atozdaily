<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/3/16
 * Time: 3:01 PM
 */
$token = $_GET['token'];
$time = $_GET['time'];
$n = $_GET['n'];
if (!(is_numeric($token) and is_numeric($time) and is_numeric($n)) or $n > 10 or $time > 3600*240  or $token != 190345871238985){
    print "The requested URL is not valid";
    exit();
}

$conn = mysqli_connect("127.0.0.1", "root", "newsharper#", "db");
$sSQL= 'SET CHARACTER SET utf8';

mysqli_query($conn,$sSQL);
if (!$conn) {
    exit;
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$t = time()*1000 -$time * 1000 ;
$sql = "select lang,agency, a_id,topimage,title,description from record where a_id>$t and topimage<>'' order by visit desc limit $n";
$result = $conn->query($sql);

$agency="";
$news_url ="";
$news_title ="";
$news_description="";
$news_keywords="";

if ($result->num_rows > 0) {
    print '{"res":[<br>';
    $cnt=0;
    while ($row = $result->fetch_assoc()) {
        if ($cnt>0){
            print ',<br>';
        }
        $cnt=$cnt+1;
        print '{"url": "http://www.atozdaily.com/'.$row["lang"].'/'.$row["agency"].'/'.$row["a_id"].'", "image" : "'.$row["topimage"].'"'.', "title" : "'.$row["title"].'"'.', "desc" : "'.$row["description"].'"}';
        ;

    }
    print ']}';
}
?>