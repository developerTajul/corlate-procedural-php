<?php 
function is_user_loggedin(){
    if( isset( $_SESSION['email'] ) ){
        return true;
    }
}

function home_url(){
    $server_name = $_SERVER['SERVER_NAME'];
    $server_path = dirname($_SERVER['PHP_SELF']);
    $server_url = '//'.$server_name.$server_path;
    $website_url = str_replace('admin', '', $server_url);
    return $website_url; 
}



