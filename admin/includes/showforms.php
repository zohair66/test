<?php
if(isset($_GET['delete'])) {
    if(Forms::DelFormById($_GET['delete'])){
        Users::DisplayWar("فرم مورد نظر با موفقیت حذف گردید");
        require_once('showforms.php');
    }
}elseif (isset($_GET['dropAllmakan'])) {
    if (Forms::DelAllforms()) {
        Users::DisplayWar("تمامی فرم ها با موفقیت حذف گردیدند");
        require_once('showforms.php');
    }
}
    $forms_num = (Forms::getAllForms()) ? count(Forms::getAllForms()) : 0;
    $forms = Forms::getAllForms();
?>
    <div class="centerpanel">
    <div class="centerpanelheader">درخواست های ارسال شده</div>

    <?php
    if ($forms_num > 0) {
        ?>
                <table id="requestform">
                    <tr>
                        <th>شماره پیام</th>
                        <th>نام</th>
                        <th>شماره تماس</th>
                        <th>ایمیل</th>
                        <th>شخص</th>
                        <th>دریافت ایمیل</th>
                        <th>درخواست</th>
                        <th>عملیات</th>
                    </tr>
                    <?php
        foreach ($forms as $form) {
            ?>
            <tr>
                <td><?php echo $form->idforms ?></td>
                <td><?php echo $form->Name ?></td>
                <td><?php echo $form->phoneNum ?></td>
                <td><?php echo $form->email ?></td>
                <td><?php echo $form->haghname ?></td>
                <td><?php
                    $rmail = $form->receivemail;
                    if ($rmail) {
                        echo "بلی";
                    } else {
                        echo "خیر";
                    }?></td>
                <td><?php echo $form->description ?></td>
                <td>
                    <a href="index.php?action=forms&delete=<?php echo $form->idforms ?>">حذف</a>
                </td>
            </tr>
        <?php
        }
        ?>
                </table>
                <p><a href="index.php?action=forms&dropAllmakan">حذف همه درخواست ها</a></p>
            <?php
    } else {
        echo "<p>هیچ درخواستی برای نمایش وجود ندارد</p>";
    }
            ?>
        </div>