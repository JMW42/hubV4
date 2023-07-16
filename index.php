
<?php
    $CONFIG = parse_ini_file("backend/config.ini");

    print_r($CONFIG);

    $url = $CONFIG["LANDING_PAGE"]; #"/content/login.php";
    $location = $CONFIG["PROTOCOL"].'://' . $_SERVER['HTTP_HOST'] . $url; #$_SERVER['REQUEST_URI'];
    #echo("<p>".$location."</p>");
    header('Location: ' . $location);
    exit;

?>


<p><b>We are currently having technical difficulties, so try it later again :-)</b></p>