<?php
require_once("table.php");
class Users extends Table{
    protected $data = array(
        "adminID" =>0,
        "Fname" =>"",
        "Lname" =>"",
        "username"=>"",
        "password"=>""
    );

    public static function getAllUsers()
    {
        $conn = self::connect();
        $query = "SELECT * FROM admins";
        $result = $conn->query($query);
        if ($result === false) {
            echo("Query failed: " . $conn->error . "<br />\n$query");
            return false;
        }
        if ($result->num_rows) {
            $admins = array();
            foreach ($result->fetch_all(MYSQLI_ASSOC) as $row) {
                $admins[] = new Users($row);
            }
            $ret = $admins;
        } else
            $ret = false;
        self::disconnect($conn);
        return $ret;
    }

    public static function getUserByUserPass($user,$pass){
        $conn = self::connect();
        $password=md5($pass);
        $query = "SELECT * FROM admins WHERE username='$user' AND password = '$password'";
        $result = $conn ->query($query);
        if($result === false)
        {
        echo("Query failed: ".$conn->error."<br />\n$query");
        return false;
        }
        if($result->num_rows){
            $admin= array();
            $row = $result->fetch_assoc();
            $admin[] = new Users($row);
            $ret = $admin;
        }else{
            $ret = false;
        }
        self::disconnect($conn);
        return $ret;
    }

//    public static function getUserByCookie($usercookie){
//        $conn = self::connect();
//        $query = "SELECT * FROM admins WHERE username = '$usercookie'";
//        $result= $conn->query($query);
//        if($result === false){
//            echo("Query failed: ".$conn->error."<br />\n$query");
//            return false;
//        }
//        if ($result->num_rows) {
//            $admin= array();
//            $row = $result->fetch_assoc();
//            $admin[] = new Users($row);
//            $ret = $admin;
//        }else{
//            $ret = false;
//        }
//        self::disconnect($conn);
//        return $ret;
//    }

    public static function DisplayWar($message=""){
        if($message) {
            echo '<p class="adminlogoutmsg">' . $message . '</p>';
        }
    }

    public static function LogOut(){
        $_SESSION = array();
        session_destroy();
        Users::DisplayWar("شما با موفقیت خارج شدید");
    }

    public static function InsertUser($UserArray){
        $conn = self::connect();
        $Fname = $UserArray['Fname'];
        $Lname = $UserArray['Lname'];
        $username = md5($UserArray['username']);
        $password = $UserArray['password'];
        $email = $UserArray['email'];
        $query = "SELECT * FROM admins WHERE username = '$username'";
        $result = $conn->query($query);
        if($result === false){
            echo("Query failed: ".$conn->error."<br />\n$query");
            return array(false , "مشکلی در ارتباط با دیتابیس وجود دارد");
        }elseif ($result->num_rows){
            return array(false , "این نام کاربری قبلاً استفاده شده است");
        }
        $query = "SELECT * FROM admins WHERE email = '$email'";
        $result = $conn->query($query);
        if($result === false){
            echo("Query failed: ".$conn->error."<br />\n$query");
            return array(false , "مشکلی در ارتباط با دیتابیس وجود دارد");
        }elseif ($result->num_rows){
            return array(false , "این ایمیل قبلاً استفاده شده است");
        }
        $query = "INSERT INTO admins (Fname , Lname , username , password , email)
          VALUES ('$Fname' , '$Lname' , '$username' , '$password' , '$email') ";
        $result = $conn->query($query);
        if($result === false){
            echo("Query failed: ".$conn->error."<br />\n$query");
            return array(false , "مشکلی در ارتباط با دیتابیس وجود دارد");
        }else {
            $ret = array(true, "کاربر مورد نظر با موفقیت ثبت گردید");
        }
        self::disconnect($conn);
        return $ret;
    }
}