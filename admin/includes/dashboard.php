<?php
$fullname = $_SESSION['fname'] . " " . $_SESSION['lname'];
$user_name = $_SESSION['user'];
$newDate = convertDate(time());
$dateString = "امروز ".$newDate['weekday_name']." ".$newDate['day']." ".$newDate['month_name']." ".$newDate['year'] ." ساعت" . " ".$newDate['hour'] .":" .$newDate['minute'] .":" .$newDate['second'];
$admins_num = (Users::getAllUsers()) ? count(Users::getAllUsers()) : 0;

?>
<div class = "centerpanel">
<div class = "centerpanelheader">داشبورد</div>
    <article id="dashboard">
        <header>
    پنل کاربری <span><?php echo $fullname ?></span>
    </header>
    <table>
        <tr>
            <td width="180">
                کاربر فعلی :
            </td>
            <td>
                <?php echo $user_name ?>
            </td>
        </tr>

        <tr>
            <td>
                تعداد کاربران :
            </td>
            <td>
                <?php echo $admins_num ?> نفر
            </td>
        </tr>

    </table>
    <footer>
        <?php echo $dateString ?>
    </footer>
    </article>
</div>