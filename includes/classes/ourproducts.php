<?php
require_once("table.php");
class Ourproducts extends Table{
    protected $data = array(
        'id' =>0,
        'piclink'=>"",
        'text'=>"",
        'textlink'=>""
    );

    public static function getAllProducts(){
        $conn = self::connect();
        $query = "SELECT * FROM ourproducts";
        $result = $conn->query($query);
        if ($result === false) {
            echo("Query failed: " . $conn->error . "<br />\n$query");
            return false;
        }elseif($result->num_rows){
            $products = array();
            foreach($result->fetch_all(MYSQLI_ASSOC) as $product){
                $products[] = new Ourproducts($product);
            }
            $ret = $products;
        }else{
            $ret = false;
        }
        self::disconnect($conn);
        return $ret;
    }
}