<?php
require_once("table.php");
class Forms extends Table{
    protected $data = array(
        "idforms" =>0,
        "Name" => "",
        "phoneNum" => 0,
        "email" => "",
        "haghname" =>"",
        "receivemail" =>0,
        "description" =>""
    );

    public static function getAllForms(){
        $conn = self::connect();
        $query = "SELECT idforms , `Name` , phoneNum , email , haghname  , receivemail
           ,description FROM forms , forms_haghhogh
           WHERE forms.haghhogh=forms_haghhogh.haghID ORDER BY idforms";

        $result = $conn -> query($query);
        if($result === false){
            echo("Query failed: ".$conn->error."<br />\n$query");
            self::disconnect($conn);
            return false;
        }
        if ($result->num_rows) {
            $forms = array();
            foreach ($result->fetch_all(MYSQLI_ASSOC) as $row) {
                $forms[] = new Forms($row);
            }
            $ret = $forms;
        }else {
            $ret = false;
        }
            self::disconnect($conn);
            return $ret;
    }

    public static function DelFormById($id){
        $conn = self::connect();
        $query = "DELETE FROM forms WHERE idforms={$id}";
        $result = $conn -> query($query);
        if($result === false){
            echo("Query failed: ".$conn->error."<br />\n$query");
            self::disconnect($conn);
            return false;
        }
        self::disconnect($conn);
        return true;
    }

    public static function DelAllforms(){
        $conn = self::connect();
        $query = "TRUNCATE TABLE forms";
        $result = $conn -> query($query);
        if($result === false){
            echo("Query failed: ".$conn->error."<br />\n$query");
            self::disconnect($conn);
            return false;
        }
        self::disconnect($conn);
        return true;
    }
}