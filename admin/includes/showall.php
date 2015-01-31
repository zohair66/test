<?php
require_once('/../../includes/includes.php');
$username = $_SESSION['user'];
$fullname = $_SESSION['fname'] . " " . $_SESSION['lname'];
?>
<html>
<header></header>
<body id="adminloginshowrisult">
<div id="wrapper">
    <div id="adminlogoutlink">
        <p><a  class="button" href="index.php">صفحه اصلی مدیریت</a></p>
        <p><a  class="button" href="index.php?action=logout">خروج</a></p>
    </div>
    <div id="main">

        <div id="welcomepanel">
            <p> خوش آمدید ،</p>
            <p><strong><?php echo $fullname . " "?></strong> عزیز شما به پنل مدیریتی وب سایت شرکت ماکان فناور وارد شدید</p>
        </div>
        <div id="rightpanel">
            <ul id="adminmenu">
                <li>
                    <a href="?action=dashboard">پیشخوان</a>
                </li>
                <li>
                    <a href="?action=HomeEdit">صفحه خانه</a>
                </li>
                <li>
                    <a href="?action=AboutusEdit">صفحه درباره ما</a>
                </li>
                <li>
                    <a href="?action=ServicesEdit">صفحه خدمات ما</a>
                </li>
                <li>
                    <a href="?action=KhadamatEdit">صفحه محصولات ما</a>
                </li>
                <li>
                    <a href="?action=ContactUsEdit">صفحه پنجم</a>
                </li>
                <li>
                    <a href="?action=ContactUsEdit">صفحه ارتباط با ما</a>
                </li>
                <li>
                    <a  href="?action=UsersEdit">کاربران</a>
                </li>
                <li>
                    <a  href="?action=NewUser">افزودن کاربر جدید</a>
                </li>
                <li>
                    <a  href="?action=forms">فرم ها </a>
                </li>
            </ul>

        </div>

        <?php
            if (isset( $_GET["action"]) and $_GET["action"] == "dashboard"){
                include('dashboard.php');
            }elseif (isset( $_GET["action"]) and $_GET["action"] == "HomeEdit") {
//                AA
            }elseif (isset( $_GET["action"]) and $_GET["action"] == "AboutusEdit"){
//                BB
            }elseif (isset( $_GET["action"]) and $_GET["action"] == "ServicesEdit"){
//                CC
            }elseif (isset( $_GET["action"]) and $_GET["action"] == "KhadamatEdit"){
//                DD
            }elseif (isset( $_GET["action"]) and $_GET["action"] == "5PageEdit"){
//                EE
            }elseif (isset( $_GET["action"]) and $_GET["action"] == "ContactUsEdit"){
//                FF
            }elseif (isset( $_GET["action"]) and $_GET["action"] == "UsersEdit"){
//                GG
            }elseif (isset( $_GET["action"]) and $_GET["action"] == "NewUser"){
//                HH
            } elseif (isset( $_GET["action"]) and $_GET["action"] == "forms") {
                include('showforms.php');
            }else{
                include('dashboard.php');
            }
        ?>

        <br/>
    </div>

</div>
</body>
</html>

