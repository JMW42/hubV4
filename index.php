
<?php

    $url = "/content/login.php";
    $location = 'https://' . $_SERVER['HTTP_HOST'] . $url; #$_SERVER['REQUEST_URI'];
    echo("<p>".$location."</p>");
    header('Location: ' . $location);
    exit;

?>


<p><b>We are currently having technical difficulties, so try it later again :-)</b></p>