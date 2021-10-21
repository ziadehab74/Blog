<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'includes/connection.php';
    $fullname = $con->real_escape_string($_POST['fullname']);
    $email = $con->real_escape_string($_POST['email']);
    $phone = $con->real_escape_string($_POST['phone']);
    $password = $con->real_escape_string($_POST['password']);
    $cpassword = $con->real_escape_string($_POST['cpassword']);
    $result = $con->query("SELECT * FROM users WHERE email='$email'");
    $user_char='USER';
    $count=$result->num_rows;
    $final_count=$count+1;
    $user_id='';
    $user_id=$user_char.$final_count;
    if ($result->num_rows == 0) {

        if ($password === $cpassword) {
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (user_id,fullname,email,phone,password,created_on,created_by) VALUES ('$user_id','$fullname','$email','$phone','$hash_password',NOW(),'user');";
            if ($con->query($sql) == TRUE) {
                echo 'Signed Up successfuly! Please Login';
                header("location:signin.php");
                exit();
            } else {
                echo 'Something Went Wrong!';
                $_SESSION['error'] = 'Something Went Wrong!';
                header("location:signup.php");
                exit();
            }
        } else {
            echo 'Passwords do not Match';
            $_SESSION['error'] = 'Passwords do not Match';
            header("location:signup.php");
            exit();
        }
    } else {
        echo 'Email Already Exists';
        $_SESSION['error'] = 'Email Already Exists';
         header("location:signup.php?error=Email Already Exists");
        exit();
    }
} else {
    $_SESSION['error'] =  'you are unauthorized';
    header("location:index.php");
    exit();
}
