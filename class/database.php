<?php

class database {

    var $hostname = "xxx";
    var $username = "xxx";
    var $password = "xxx";
    var $bd = "shorten_link";

    public function connect() {
        mysql_connect($this->hostname, $this->username, $this->password);
        mysql_select_db($this->bd) or die(mysql_error());
    }

    public function desconnect() {
        mysql_close();
    }

    public function createShorten($url) {

        if (empty($url)) {
            header("Location: index.php");
        } else {
            if (!preg_match("/http/i", $url)) {
                $urlNova = "http://";
                $urlNova .= $url;
                $url = $urlNova;
            }

            $a = str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890');
            $tiny = substr($a, 0, 6);
            $this->connect();

            mysql_query("INSERT INTO link(url,tiny) VALUES('$url','$tiny')");

            echo "Your shorten url:<br><br><b>http://carlit.us/?" . $tiny . "</b>";
        }
    }

    public function returnUrl($tiny) {

        $this->connect();

        $query = mysql_query("SELECT * FROM link WHERE tiny = '$tiny'");
        $dados = mysql_fetch_array($query);

        return $dados['url'];
    }

    public function counter($tiny) {

        $this->connect();

        $query = mysql_query("SELECT * FROM link WHERE tiny = '$tiny'");
        $dados = mysql_fetch_array($query);

        $count = $dados['counter'] + 1;

        mysql_query("UPDATE link set counter = $count WHERE id = $dados[id]");
    }

}

?>
