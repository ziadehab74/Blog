<?php
include 'includes/connection.php';

if (isset($_SESSION['user'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
        $comment_content = $_POST['content'];
        $user_id = $_SESSION['user'];
        $blog_id = $_POST['blog_id'];
        $result = $con->query("SELECT * FROM blogs");
        $sql="INSERT INTO comment (comment_content, blogid, userid, created_on, created_by) VALUES ('$comment_content','$blog_id','$user_id' ,NOW(),'User');";
        if($con->query($sql)==TRUE){
            echo "success";
            header("location:index.php");
           exit();
        }else{
            echo "error";
           header("location:index.php");
           exit();
        }
    }
} else {
    echo "you are not authorized";
    header("location:index.php");
    exit();
}
?>