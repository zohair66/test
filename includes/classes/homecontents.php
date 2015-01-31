<?php
require_once("table.php");
class homecontents extends Table{
    protected $data = array(
        "id"=> 0,
        "title"=>"",
        "link"=>""
    );

    public static function getAllHomeContents() {
        $conn = self::connect();
        $query = "SELECT * FROM homecontents";
        $result = $conn->query($query);
        if($result->num_rows){
            $homecontents= array();
            foreach($result->fetch_all(MYSQLI_ASSOC) as $row) {
                $homecontents[] = new homecontents($row);
            }
            $ret = $homecontents;
        }else{
            $ret = false;
        }
        self::disconnect($conn);
        return $ret;
    }
}