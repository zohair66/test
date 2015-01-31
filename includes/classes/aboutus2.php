<?php
require_once('table.php');
class aboutus2 extends Table{
    protected $data = array(
        "id" =>0,
        "title"=>"",
        "piclink1"=>"",
        "piclink2"=>"",
        "piclink3"=>"",
        "piclink4"=>""
    );

    public static function getAllaboutus2(){
        $conn = self::connect();
        $query = "SELECT * FROM aboutus2";
        $result = $conn -> query($query);
        if($result === false){
            echo("Query failed: ".$conn->error."<br />\n$query");
            return false;
        }
        if($result->num_rows){
            $aboutuses=array();
            foreach($result->fetch_all(MYSQL_ASSOC) as $row){
                $aboutuses[] = new aboutus2($row);
            }
            $ret = $aboutuses;
        }else{
            $ret = false;
        }
        self::disconnect($conn);
        return $ret;
    }
}