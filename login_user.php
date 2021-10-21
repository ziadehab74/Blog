<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'includes/connection.php';
    $email = $con->real_escape_string($_POST['email']);
    $password = $con->real_escape_string($_POST['password']);

    $result = $con->query("SELECT * FROM users WHERE email='$email'");
    if ($result->num_rows !== 0) {
        $data = $result->fetch_assoc();
        if (password_verify($password, $data['password'])) {
            $user_id = $data['userid'];
            $_SESSION['user'] = $user_id;
            $_SESSION['error']='signin successfully';
            header("location:profile.php");
            exit();
        }
        else{
            echo "username/password do not match";
            header("locatin:signin.php");
            exit();
        }
    } else {
        echo "User not Registered Please Sign Up";
        header("locatin:signup.php");
        exit();
    }
} else {
    echo 'You are Unauthorized';
    header("location:index.php");
    exit();
}
?>