<?php
require '../config.php';

if (isset($_POST['send'])) {
    $name = $_POST['Name'];
    $phoneNum = $_POST['phonenum'];
    $email = $_POST['email'];
    $haghhogh = $_POST['haghhogh'];
    if (isset($_POST['receivemail'])){
        $rmail=true;
    }
    else{
        $rmail=false;
    }
//    $rmail = $_POST['receivemail'];
    $desc = $_POST['description'];
    $query = "INSERT INTO forms (`Name`,phoneNum,email,haghhogh,receivemail,description)
      VALUES ('$name','$phoneNum','$email','$haghhogh','$rmail','$desc')";
    if ($conn->query($query) === TRUE) {
        displayPageHeader();
        displaywar("اطلاعات شما با موفقیت ثبت گردید، به زودی با شما تماس خواهیم گرفت");
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
//    $conn -> query($query);
//        displayPageHeader();
//        displaywar("اطلاعات شما با موفقیت ثبت گردید، به زودی با شما تماس خواهیم گرفت");
//    }
}else {
    displayform();
}

function displayPageHeader(){
    ?>
    <head>
        <title>تماس با ما</title>
        <meta charset="utf-8"/>
        <style type="text/css">
            *{
                font-family: Tahoma;
                direction: rtl;
            }
            .msg {
                background: #d33; color: white; padding: 5px; font-size: 16px; }
        </style >
        <link href="form1.css" rel="stylesheet" />
        <script>
            function Invalidname(textbox) {
                var name = document.getElementById('text1').value;
                var pattern = /[آ-ی]{2,}\s[آ-ی]{2,}/;
                if (textbox.value == '') {
                    textbox.setCustomValidity('نام خود  را وارد کنید');
                }
                else if (!pattern.test(name)) {

                    textbox.setCustomValidity('نام خود را به درستی وارد کنید');
                }
                else{
                    textbox.setCustomValidity('');
                }
                return true;
            }
            function Invalidtel(textbox) {
                var name = document.getElementById('text2').value;
                var patterntel = /^\d{11}/;
                if (textbox.value == '') {
                    textbox.setCustomValidity('شماره تلفن خود را وارد کنید');
                }
                else if (!patterntel.test(name)) {

                    textbox.setCustomValidity('شماره تلفن خود را به درستی وارد کنید');
                }
                else {
                    textbox.setCustomValidity('');
                }
                return true;
            }
            function Invalidtel(textbox) {
                var name = document.getElementById('text2').value;
                var patterntel = /^\d{11}/;
                if (textbox.value == '') {
                    textbox.setCustomValidity('شماره تلفن خود را وارد کنید');
                }
                else if (!patterntel.test(name)) {

                    textbox.setCustomValidity('شماره تلفن خود را به درستی وارد کنید');
                }
                else {
                    textbox.setCustomValidity('');
                }
                return true;
            }
            function Invalidmail(textbox) {
                if (textbox.value == '') {
                    textbox.setCustomValidity('ایمیل خود را وارد کنید');
                }
                else if (textbox.validity.typeMismatch) {

                    textbox.setCustomValidity('ایمیل خود را به درستی وارد کنید');
                }
                else {
                    textbox.setCustomValidity('');
                }
                return true;
            }
        </script>
    </head >
    <body >
    </body>
<?php
}

function displaywar($message="") {
    if($message) {
        echo '<p class="msg">' . $message . '</p>';
    }
}

function displayform() {
    global $conn;
    displayPageHeader();
    ?>
    <html style="direction: rtl">
    <head>
    </head>
    <body>
    <form method="post" onsubmit="return validate();">

        <table>
            <tr>
                <td>
                    نام و نام خانوادگی
                </td>
                <td>
                    <input type="text" name="Name" id="text1" oninvalid="Invalidname(this);" oninput="Invalidname(this);" placeholder="فارسی" required="required" /><span id="namespan" style="color:red"></span>
                </td>
            </tr>

            <tr>
                <td>
                    شماره تماس (موبایل)
                </td>
                <td>
                    <input type="text" name="phonenum" id="text2" oninvalid="Invalidtel(this);" oninput="Invalidtel(this);" placeholder="09130000000" required="required" /><span id="telspan" style="color:red"></span>
                </td>
            </tr>

            <tr>
                <td>
                    ایمیل
                </td>
                <td>
                    <input type="email" name="email" id="email" placeholder="example@gmail.com" oninvalid="Invalidmail(this);" oninput="Invalidmail(this);"  required="required"  /><span id="emailspan" style="color:red"></span>
                </td>
            </tr>

            <tr>
                <td>
                    شخص حقیق یا  حقوقی
                </td>
                <td>
                    <select name="haghhogh">
                        <?php
                        $result = $conn -> query("SELECT * FROM forms_haghhogh");
                        while ($row = $result->fetch_assoc()){
                            ?>
                            <option value="<?php echo $row['haghID'] ?>"><?php echo $row['haghname'] ?></option>
                            <?php
                            }
                        ?>
                      </select>
                </td>
            </tr>

            <tr>
                <td>
                    آیا مایل به دریافت ایمیل هستید؟
                </td>
                <td>
                    <input type="checkbox" name="receivemail" checked="checked" />
                </td>
            </tr>

            <tr>
                <td>
                    خلاصه ای از سایت مورد  نظر
                </td>
                <td>
                    <textarea name="description" maxlength="500"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="send" value="ارسال" />
                    <input type="reset" name="reset "value="نوسازی" />
                </td>
            </tr>
        </table>
    </form>
    </body>
    </html>
<?php
}