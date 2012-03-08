<?php
include 'class/database.php';
$db = new database();
$uri = $_SERVER['REQUEST_URI'];
 if($uri) {
     $link = explode("/?", $uri);
     $db->counter($link[1]);
     header("Location: ".$db->returnUrl($link[1])."");
}
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
            <form action="create.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="url" value="" class="login_textbox" />
                <input type="submit" value="create shorten url" class="button" />
            </form>
        </div>
    </body>
</html>
