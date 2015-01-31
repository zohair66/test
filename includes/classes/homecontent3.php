<?php
require_once("table.php");
class homecontent3 extends Table{
    protected $data = array(
        "id"=> 0,
        "subtitle"=>"",
        "subcontent"=>""
    );

    public static function getAllHomeContent3() {
        $conn = self::connect();
        $query = "SELECT * FROM homecontent3";
        $result = $conn->query($query);
        if($result->num_rows){
            $homecontent3= array();
            foreach($result->fetch_all(MYSQLI_ASSOC) as $row) {
                $homecontent3[] = new homecontent3($row);
            }
            $ret = $homecontent3;
        }else{
            $ret = false;
        }
        self::disconnect($conn);
        return $ret;
    }
}