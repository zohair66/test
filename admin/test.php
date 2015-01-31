<?php
require_once("../includes/includes.php");
//$test_array = array(
//    'Fname'=> "پیمان",
//    'Lname'=> "سینی",
//    'username'=>"peyman",
//    'password'=> 123456,
//    'email'=> "peyman.sheikh@yahoo.com"
//);
//
//$result = Users::InsertUser($test_array);
//var_dump($result);

// echo $_SERVER['HTTP_REFERER'];

$Services = Services::getAllServiceRecordes();
var_dump($Services);
