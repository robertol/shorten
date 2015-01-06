<?php
include 'class/database.php';
include 'class/BarcodeQR.php';
$db = new database();
$db->connect();
$qr = new BarcodeQR();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?=$_SERVER['HTTP_HOST']?> - shorten url</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <br /><br /><br />
        <div align="center">
            <img src="img/logo.png" alt="logo"/>
            <br /><br />
            <?php
            $tiny = $db->createShorten($_POST['url']);
            echo "http://carlit.us/?".$tiny;
            ?><br /><br />
            <?php
            $qr->url("http://".$_SERVER['HTTP_HOST']."/?".$tiny);
            $qr->draw(150,"qrcode/qr-code.png");
            ?><img src="qrcode/qr-code.png" />
        </div>
    </body>
</html>
