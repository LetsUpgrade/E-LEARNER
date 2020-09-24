<?php 
session_start();
error_reporting(0);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <script src="https://kit.fontawesome.com/a4c432fcd6.js" crossorigin="anonymous"></script>
    <title>navbar</title>
  </head>
  <body>
    <!--Navbar-->
   
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <a class="navbar-brand mb-3" href="#">
        <img src="images/logo-elearn.svg" width="100px" />
      </a>

      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto container-fluid">
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <i class="fas fa-list-ul"></i> 
            Menu           </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Free Courses</a>
              <a class="dropdown-item" href="#">Paid Courses</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Help</a>
            </div>
          </li>

          <li class="nav-item col-8">
            <form class="form-inline my-2 my-lg-0 inbutton">
              <input
                class="form-control form-control-lg mr-sm-0 col-8 bg-light border-0"
                style="border-radius: 5px 0px 0px 5px;"
                type="search"
                placeholder="Search Button"
                aria-label="Search"
              />

              <button
                class="btn btn-light btn-lg my-2 my-sm-0 ml-0 col-2"
                style="border-radius: 0px 5px 5px 0px;"
                type="submit"
              >
                <i class="fas fa-search text-danger"></i>
              </button>
            </form>
          </li>
        </ul>

        <a
          class="nav-link btn btn-light mx-2"
          href="#"
          data-toggle="popover"
          title="Try Udemy for Business"
          data-placement="bottom"
          data-trigger="focus"
          data-content="Get your team access to Udemy’s top 2,500 courses anytime,
                 anywhere."
          >Code Here</a
        >
        <a class="nav-link btn btn-light mx-2" href="#">Contact Us</a>
        <a class="nav-link btn btn-light mx-2 rounded-circle" href="#">
          <i class="fas fa-shopping-cart"></i>
          <?php
          echo $_SESSION['username'];
         if( isset($_SESSION['username']) && !empty($_SESSION['username']) )
        {
        ?>1

            <a class="nav-link btn btn-secondery" href="logout.php">Logout</a>
        <?php }else{ ?>
            <a class="nav-link btn btn-outline-dark" href="login.php">Login</a>
            <a class="nav-link btn btn-danger mx-2" href="Sign_up.php">Signup</a>

        <?php } ?>
             </div>
    </nav>
        
    </body>
</html>