<?php
require_once("includes/includes.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<title>ماکان</title>
<script src="js/jquery-1.10.2.js"></script>
<link href="css/aboutus.css" rel="stylesheet" />
<script src="js/aboutus.js"></script>

</head>
<body onload="bodycontentload()">
<div id="logocontainer">
<a href="makan1.php">
<img src="img/logo.png" alt="logo" title="دفتر طراحی و  پیاده سازی سایت  های اینترنتی ماکان" />
</a>
</div>  
<div id="wrapper">
<div id="menuthispage">
<div id="main">
<div id="home" class="menu" onmouseenter="select1()"><a href="#" id="subhome" class="submenu"></a><p>خانه</p></div>
<div id="aboutus" class="menu" onmouseenter="select2()" ><a href="#" id="subaboutus" class="submenu"></a><p>درباره ما</p></div>
<div id="service" class="menu" onmouseenter="select3()"><a href="#" id="subservice"  class="submenu"></a><p>خدمات ما</p></div>
<div id="products" class="menu" onmouseenter="select4()"><a href="#" id="subproducts"class="submenu"></a><p>نمونه کارها</p></div>
<div id="blog" class="menu" onmouseenter="select5()"><a href="#" id="subblog" class="submenu"></a><p>خانه</p></div>
<div id="mail" class="menu" onmouseenter="select6()"><a href="#" id="submail" class="submenu"></a><p>ارتباط با ما</p></div>
</div>
<div id="beforepagemain">
<div id="homebefor" class="menu"></div>
<div id="aboutusbefor" class="menu"></div>
<div id="servicebefor" class="menu"></div>
<div id="productsbefor" class="menu"></div>
<div id="blogbefor" class="menu"></div>
<div id="mailbefor" class="menu"></div>
</div>
</div>

    <?php
        $aboutus1 = aboutus1::getAllaboutus1();
        $aboutus2 = aboutus2::getAllaboutus2();
    ?>
<div id="content">
<div id="aboutuscontent1" class="aboutuscontent">
    <div class="aboutuscontenttitle"><?php echo $aboutus1[0]->title ?></div>
    <div id="aboutuscontent1pictrue" class="aboutuscontent1"><img src="<?php echo $aboutus1[0]->picturelink ?>"/></div>
    <div id="aboutuscontent1text" class="aboutuscontent1"><?php echo $aboutus1[0]->textcontent ?></div>
</div>
<div id="aboutuscontent2" class="aboutuscontent">
    <div class="aboutuscontenttitle"><?php echo $aboutus2[0]->title ?></div>
    <div>
        <div class="aboutusconten2"><img src="<?php echo $aboutus2[0]->piclink1 ?>" /></div>
        <div class="aboutusconten2"><img src="<?php echo $aboutus2[0]->piclink2 ?>" /></div>
        <div class="aboutusconten2"><img src="<?php echo $aboutus2[0]->piclink3 ?>" /></div>
        <div class="aboutusconten2"><img src="<?php echo $aboutus2[0]->piclink4 ?>" /></div>
    </div>
</div>

</div>
</div>
<p  class="footer" id="footername">تمام حققوق مادی و معنوی این سایت متعلق به دفتر خدمات طراحی وب سایت ماکان است</p>
<p class="footer" id="footeraddress"><br />آدرس:اصفهان خیابان میرداماد بعد از چهارراه زاهد طبقه فوقانی دفتر اسناد رسمی 410 </p>
<p class="footer" id="footertelefon">تلفن:32352016-031 تلفکس:32362237-031</p>
</body>
</html>
