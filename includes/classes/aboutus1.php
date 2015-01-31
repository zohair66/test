<?php
require_once('table.php');
class aboutus1 extends Table{
    protected $data = array(
      "id" =>0,
      "title"=>"",
      "picturelink"=>"",
      "textcontent"=>""
    );

    public static function getAllaboutus1(){
        $conn = self::connect();
        $query = "SELECT * FROM aboutus1";
        $result = $conn -> query($query);
        if($result === false){
            echo("Query failed: ".$conn->error."<br />\n$query");
            return false;
        }
        if($result->num_rows){
            $aboutuses=array();
            foreach($result->fetch_all(MYSQL_ASSOC) as $row){
                $aboutuses[] = new aboutus1($row);
            }
            $ret = $aboutuses;
        }else{
            $ret = false;
        }
        self::disconnect($conn);
        return $ret;
    }
}