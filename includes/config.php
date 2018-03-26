<?php 
// defined('BASEPATH') OR exit('No direct script access allowed');

/*****
****  Database Connection
*****/
$hostname    = 'localhost';
$username    = 'msar_public';
$password    = '..@#Akash%6727';
$database    = 'msar_public_4';
$con = mysqli_connect($hostname, $username, $password, $database);
if(!$con){
    echo 'Database Connection Failed';
}

/*****
****  Default Configuration
*****/

$sql = "SELECT * FROM settings WHERE data_key='ws_name'";
$result = mysqli_query($con, $sql);
if($result){
    $data = mysqli_fetch_assoc($result);
}else{
    echo mysqli_error($con);
}
$name = $data['data_value']!=null ? $data['data_value'] : 'Akash';
define("APP_NAME", $name); // App Name Display in header title
define("APP_ENV", "dev"); 
// use dev or prod. dev for development, prod for Production


