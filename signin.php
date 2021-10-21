<?php include 'includes/header.php';?>
<?php
if(isset($_SESSION['user'])){
    header("location:profile.php");
    exit();
}
?>
<body>
<?php include 'includes/navbar.php';?>
<div class="jumbotron jumbotron-fluid bg-secondry">
        <div class="container">
            <h1>Sign In</h1>
            <h5>Log In and start posting Awesome Content!</h5>
        </div>
    </div>
<?php include 'noty.php' ; ?>
<div class="container ">
        <div class="row">
            <div class="col-md-12 signup-form">
                <form action="login_user.php" method="POST">
                    <div class="mb-3 ">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter your email" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Log In</button>
                </form>
            </div>
        </div>
<?php include 'includes/footer.php';?>