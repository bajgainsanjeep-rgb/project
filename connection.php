<?php
$host="localhost";
$user="root";
$password="";
$db="csitcommerce";

$conn=mysqli_connect($host,$user,$password,$db);

if(!$conn){
    echo "database not connected";
}

?>




