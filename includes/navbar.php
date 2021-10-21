<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid col-10 ">
    <a class="navbar-brand" href="#">BLOG</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse">
      <span class="navbar-toggler-icon "></span>
    </button>
    <div class="col-4">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">


          </li>
          <?php if (isset($_SESSION['user'])) { ?>
            <li class="nav-item ">
            <a class="nav-link" href="index.php">Home</a>
            <li class="nav-item">
              <a class="nav-link " href="profile.php">My profile</a>
            </li>
            <form action="logout.php">
              <li class="nav-item">
                <a class="nav-link" href="logout.php">SignOut</a>
              </li>
             
            </form>
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="signup.php">SignUp</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signin.php">SignIn</a>
            </li>
          <?php } ?>


      </div>

      </ul>
    </div>
  </div>
</nav>