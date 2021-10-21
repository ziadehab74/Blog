<?php
session_start();
$servername ="localhost";
$username ="root";
$dbpass="";
$dbname="blog";
$con= mysqli_connect($servername,$username,$dbpass,$dbname);
if($con->connect_error){
    echo "faild" .$con->connect_error;
}

?>