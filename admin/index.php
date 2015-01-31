<?php
require_once('/../includes/includes.php');

//require 'config.php';
include('includes/header.php');
session_start();
if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if ($admins = Users::getUserByUserPass($user,$pass)){
        $_SESSION['user'] = $user;
        $_SESSION['fname'] = $admins[0]->Fname;
        $_SESSION['lname'] = $admins[0]->Lname;
        include('includes/showall.php');
    }else{
        Users::DisplayWar("نام کاربری و رمز عبور اشتباه می باشد");
        include('includes/login.php');
    }
}elseif (isset( $_GET["action"]) and $_GET["action"] == "logout") {
    Users::LogOut();
    include('includes/login.php');
//}elseif (isset($_GET['delete'])) {
//    if(Forms::DelFormById($_GET['delete'])){
//    Users::DisplayWar("فرم مورد نظر با موفقیت حذف گردید");
//    include('includes/showall.php');
//    }
//}elseif (isset($_GET['dropAllmakan'])){
//    if (Forms::DelAllforms()) {
//        Users::DisplayWar("تمامی فرم ها با موفقیت حذف گردیدند");
//        include('includes/showall.php');
} elseif(isset( $_SESSION["user"])){
    include('includes/showall.php');
}else{
    include('includes/login.php');
}
