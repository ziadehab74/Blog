<?php
include 'includes/connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = ($_POST['fullname']);
    $phone = ($_POST['phone']);
    $user_id = ($_POST['user']);
    $sql="UPDATE users SET phone='$phone' , fullname='$fullname' , updated_on=NOW() ,updated_by='User' WHERE user_id='$user_id'";
    if($con->query($sql)==TRUE){
        echo "success";
    }
    else{
        echo "faild";
    }
}
    else{
        echo "you are not authorized";
    }
    
    ?>