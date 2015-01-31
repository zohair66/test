<?php
require_once("includes/includes.php");
$service_nums = (Ourproducts::getAllProducts()) ? count(Ourproducts::getAllProducts()) : 0;
var_dump($service_nums);