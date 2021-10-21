<?php include 'includes/header.php'; ?>
<?php
include 'includes/connection.php';

if (!isset($_SESSION['user'])) {
    echo 'you are not authorized';
} else {
    $user_id =  $_SESSION['user'];
    $result = $con->query("SELECT email, phone, fullname, created_on  FROM users WHERE userid ='$user_id'");
    $data = $result->fetch_assoc();
}
?>

<body>
    <?php include 'includes/navbar.php' ?>
    <div class="jumbotron jumbotron-fluid bg-secondry">
        <div class="container">
            <h1>My Profile</h1>
            <h5>Awesome Profile an Awesome .</h5>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <h3 class="card-title">User Details</h3>
                    <b>Name :</b> <?php echo strtoupper($data['fullname']); ?>
                    <b>Email :</b> <?php echo strtoupper($data['email']); ?><br>
                    <b>Phone :</b> <?php echo strtoupper($data['phone']); ?><br>
                    <b>Joined On :</b> <?php echo date('d F,Y', strtotime($data['created_on'])); ?>
                </div>


                <button type="button" class="btn btn-success mt-2 update-button" data-bs-toggle="modal" data-bs-target="#exampleModal" data--id="<?php echo $_SESSION['user']  ?>" data-user-name="<?php echo $data['fullname']  ?>" data-phone-number="<?php echo $data['phone']  ?>">Update Profile</button>
                <?php include 'includes/footer.php'; ?>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">update Profile</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="update-profile.php" method="POST">
                                    <div class="mb-3">
                                        <label for="name" class="col-form-label">Name</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="col-form-label">Email</label>
                                        <input type="text" class="form-control" id="email1"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="col-form-label">New Password</label>
                                        <input type="text" class="form-control" id="email"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Send message</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>