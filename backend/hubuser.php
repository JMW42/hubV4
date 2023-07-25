<?php

// IF SESSION IS NOT RUNNIG START IT
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


//

$KEY_HUBUSER = "HUBUSER";
$KEY_HUBUSER_ID = "ID";
$KEY_HUBUSER_STATUS = "STATUS";
$KEY_HUBUSER_CREATED = "CREATED";
$KEY_HUBUSER_USERNAME = "NAME";
$KEY_HUBUSER_PASSWORD = "PASSWORD";


function set_hubuser_session($DATA){
    global $KEY_HUBUSER;
    $_SESSION[$KEY_HUBUSER]=$DATA;
}


function get_hubuser_name(){
    return $_SESSION[$KEY_HUBUSER][$KEY_HUBUSER_USERNAME];
}


?>