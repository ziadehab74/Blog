<?php include 'includes/header.php'; ?>
<?php
if(isset($_SESSION['user'])){
    header("location:profile.php");
    exit();
}
?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="jumbotron jumbotron-fluid bg-secondry">
        <div class="container">
            <h1>Sign Up</h1>
            <h5>Register to Post Awesome Blogs!</h5>
        </div>
    </div>
    <?php include 'noty.php';?>
    <div class="container ">
        <div class="row">
            <div class="col-md-12 signup-form">
                <form action="add_user.php" method="POST">
                    <div class="mb-3 ">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="name" class="form-control" id="name" name="fullname" aria-describedby="nameHelp" placeholder="Enter full name" required>
                    
                    </div>

                    <div class="mb-3 ">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="phone" class="form-control" id="phone" aria-describedby="emailHelp" name="phone" placeholder="Enter phone number" required>
                        <div id="phone" class="form-text">We'll never share your phone with anyone else.</div>
                    </div>
                    <div class="mb-3 ">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter your email" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="mb-3">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword2" name="cpassword" placeholder="Confirm password" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>