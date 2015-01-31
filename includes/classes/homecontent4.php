<?php
require_once("table.php");
class homecontent4 extends Table{
    protected $data = array(
        "id"=> 0,
        "content"=>""
    );

    public static function getAllHomeContent4() {
        $conn = self::connect();
        $query = "SELECT * FROM homecontent4";
        $result = $conn->query($query);
        if($result->num_rows){
            $homecontent4= array();
            foreach($result->fetch_all(MYSQLI_ASSOC) as $row) {
                $homecontent4[] = new homecontent4($row);
            }
            $ret = $homecontent4;
        }else{
            $ret = false;
        }
        self::disconnect($conn);
        return $ret;
    }
}