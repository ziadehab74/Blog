<?php include 'includes/header.php'; ?>
<?php include 'includes/connection.php'; ?>

<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-9" style="margin-top:15px; border-left:1px solid lightgray ; border-right:1px solid lightgray ">
                <form class="form-inline" action="add_blog.php" method="POST">
                    <div class="form-group mx-sm-3 mb-2">

                        <textarea name="content" id="content" class="form-control" cols="97" rows="5" style="width:100%;" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-left:15px ; font-size: 19px">Post</button>
                </form>
                <hr>
                <?php
                $sql = "SELECT * FROM blogs";
                $result = $con->query($sql);
                if ($result->num_rows == 0) {
                    echo "no blos found";
                }
                while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="card" style="margin-bottom: 5px;">
                        <div class="card-body">
                            <?php echo $row['blog_content']; ?>
                            <br><br>
                            <i class="far fa-heart" style="float: left;"><span> 0 Likes</span></i>
                            <p style="display: inline ;float:right;"><?php echo date('d F,Y', strtotime($row['created_on'])); ?></p>
                            <br>
                            <form method="POST" action="comment.php" id="container">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <input type="hidden" value="<?php echo $row['blogid']; ?>" name="blog_id">
                                            <textarea name="content" cols="60" rows="4" placeholder="write your comment here ...."></textarea>
                                            <button type="submit" class="btn btn-primary">Add Comment</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <?php
                            $blog_id = $row["blogid"];
                            $sql = "SELECT * FROM comment where blogid = '$blog_id '";
                            $result2 = $con->query($sql);

                            if ($result2->num_rows == 0) {
                                echo "no comment found";
                            }
                            while ($row2 = $result2->fetch_assoc()) {

                            ?>
                                <div class="card" style="margin-bottom: 5px;">
                                    <div class="card-body">
                                        <?php echo $row2['comment_content']; ?>
                                        <?php

                                        $created_on = $row["created_on"];
                                        $sql = "SELECT * FROM comment where created_on = '$created_on '"; ?>
                                        <p style="display: inline ;float:right;"><?php echo date('d F,Y', strtotime($row['created_on'])); ?></p>
                                        <?php
                                            //    $fullname=$row['fullname'];
                                        $user_id = $row['userid'];

                                        $sql2 = "SELECT fullname FROM users WHERE userid= '$user_id'";
                                        $result55 = $con->query($sql2);
                                        while ($row2 =  $result55->fetch_assoc()) {
                                        ?>
                                        <p style="display: inline ;float:left ;margin-right:20px;"><?php echo $row2['fullname']  ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <hr>

                        </div>
                    </div>
                <?php        }  ?>
            </div>
            <div class="col-md-3">
                <h1 class="mr-2"> ALL USRES</h1>
                <?php
                if (isset($_SESSION['user'])) {
                    $user_id = $_SESSION['user'];
                    $res = $con->query("SELECT user_id , fullname FROM users WHERE NOT userid ='$user_id'");
                } else {
                    $res = $con->query("SELECT user_id , fullname FROM users");
                }
                while ($array = $res->fetch_assoc()) {

                ?>
                    <div class="card" style="margin-bottom: 5px;">
                        <div class="card-body">
                            <p> <?php
                                echo $array['fullname'];

                                ?></p>
                            <a style="cursor: pointer; float:right;" href="profile.php?userid=<?php echo base64_encode($array['user_id']); ?>">View Profile</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>