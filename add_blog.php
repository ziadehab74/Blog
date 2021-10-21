<?php
include 'includes/connection.php';
if (isset($_SESSION['user'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $blog_content = $_POST['content'];
        $user_id = $_SESSION['user'];
        $result = $con->query("SELECT * FROM blogs");
        $count = $result->num_rows;
        echo $count;
        if (strlen($blog_content) == 0) {
            echo "blog has not Content";
             header("location:index.php");
            exit();
        }
            $final_count = $count+1;
            $string ='Blog';
            $blog_id =$string.$final_count;


        $sql="INSERT INTO blogs (blog_content, blog_id, userid, created_on, created_by) VALUES ('$blog_content','$blog_id','$user_id' ,NOW(),'User');";
        
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