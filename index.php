
<?php
    $CONFIG = parse_ini_file("backend/config.ini");

    print_r($CONFIG);

    $url = $CONFIG["LANDING_PAGE"]; #"/content/login.php"; // go to landing page
    $location = $CONFIG["PROTOCOL"].'://' . $_SERVER['HTTP_HOST'] . $url; #$_SERVER['REQUEST_URI'];
    header('Location: ' . $location); # go to set kocation
    exit;

?>


<p><b>We are currently having technical difficulties, so try it later again :-)</b></p>