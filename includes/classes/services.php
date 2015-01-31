<?php
require_once("table.php");
class Services extends Table{
    protected $data = array(
      'id'=>0,
      'piclink'=>"",
      'text'=>"",
      'sublink'=>""
    );

    public static function getAllServiceRecordes(){
        $conn = self::connect();
        $query = "SELECT * FROM services";
        $result = $conn->query($query);
        if ($result === false) {
            echo("Query failed: " . $conn->error . "<br />\n$query");
            return false;
        }elseif($result->num_rows){
            $services = array();
            foreach($result->fetch_all(MYSQLI_ASSOC) as $service){
                $services[] = new Services($service);
            }
            $ret = $services;
        }else{
            $ret = false;
        }
        self::disconnect($conn);
        return $ret;
    }
}
