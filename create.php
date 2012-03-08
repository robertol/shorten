<?php
include 'class/database.php';
$db = new database();
$db->connect();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>carlit.us - shorten url</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <br /><br /><br />
        <div align="center">
            <img src="img/logo.png" alt="logo"/>
            <br /><br />
            <?php
            echo $db->createShorten($_POST['url']);
            ?>
        </div>
    </body>
</html>
