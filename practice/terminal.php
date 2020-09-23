<?php 
  
  session_start();
  include('connection.php');
  //error_reporting(0);
   $id=$_REQUEST['id'];
  //  echo $id;
   //$language = $_REQUEST['language'];
  //$sql = "SELECT * FROM question where q_language=$language";
  $sql = "SELECT * FROM question WHERE q_id=$id";
  $result =  mysqli_query($conn,$sql);
  $editor = "";
  $now = date('Y-m-d H:i:s');

  $uid=$_SESSION['id'];
  
  function jsLog(...$args) {
    ?>
    <script>
      console.log(<?= json_encode($args, JSON_THROW_ON_ERROR); ?>);
    </script>
    <?php
  }
  if(isset($_POST['submit']))
  {
    $editor = $_POST['editor'];

    if(!empty($editor)){
      
      $insert= "INSERT INTO answer (a_solution,q_id,user_id,a_date) values ('$editor','$id','$uid', '$now')";
      $run=mysqli_query($conn,$insert);
      
      jsLog(mysqli_error($conn));
    }
    // $run=mysqli_query($conn,$insert);

  }

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
    <link rel="stylesheet" href="terminal.css">
    <title>Terminal</title>
  </head>
  <body>
    <!--navbar 1-->
    <div data-include="./navbar.php"></div>
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
          
         if( isset($_SESSION['username']) && !empty($_SESSION['username']) )
        { 
        ?>
             <a class="nav-link btn btn-light mx-2"><?php echo $_SESSION['username']; ?></a>
            <a class="nav-link btn btn-secondery" href="logout.php">Logout</a>
        <?php }else{?>
            <a class="nav-link btn btn-outline-dark" href="login.php">Login</a>
            <a class="nav-link btn btn-danger mx-2" href="Sign_up.php">Signup</a>

        <?php } ?>
             </div>
    </nav>
   
    <!--navbar2-->
    <!-- Just an image -->
<nav class="navbar navbar-light bg-light">
    <p><a href="practicepage.php">Practice</a></p> 
  </nav>
 
<!--Us-->
<div class="container container-fluid">
<?php $row = $result->fetch_array();?>
  <h1>Problem Statment</h1>
  <p> <?php echo $row["q_statement"];?> <!--Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam animi ad, sit fuga culpa, asperiores consequatur officia fugiat, minus itaque explicabo alias quae nihil similique consequuntur nisi quo voluptatibus labore.--></p>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <p class="lead">
       <?php echo $row["q_state_code"]; ?>
        <!--void increment(int *v){ <br>
        (*v)++; <br>
        }<br>
        int main() { <br>
        int a; <br>
        scanf("%d", &a); <br>
        increment(&a); <br>
        printf("%d", a); <br>
        return 0;      <br>
        }     </p>-->
    </div>
    
    </div>
    <!--<a href="editor.html"><button class="btn btn-danger">Solve</button></a>-->
    </div>
    <form action="" method=post>
    <div class="texteditor">
    <div class="wrapper">
      <div class="options">
        <button class="btn btn-dark" onClick="transform('bold', null)">
          <i class="fas fa-bold"></i>
        </button>
        <button class="btn btn-dark" onClick="transform('italic', null)">
          <i class="fas fa-italic"></i>
        </button>
        <button class="btn btn-dark" onClick="transform('strikeThrough', null)">
          <i class="fas fa-strikethrough"></i>
        </button>
        <button class="btn btn-dark" onClick="transform('underline', null)">
          <i class="fas fa-underline"></i>
        </button>
        <div class="seperator"></div>
        <button class="btn btn-dark" onClick="transform('justifyLeft', null)">
          <i class="fas fa-align-left"></i>
        </button>
        <button class="btn btn-dark" onClick="transform('justifyCenter', null)">
          <i class="fas fa-align-center"></i>
        </button>
        <button class="btn btn-dark" onClick="transform('justifyRight', null)">
          <i class="fas fa-align-right"></i>
        </button>
        <div class="seperator"></div>
        <button class="btn btn-dark" onClick="transform('insertOrderedList', null)">
          <i class="fas fa-list-ol"></i>
        </button>
        <button class="btn btn-dark" onClick="transform('insertUnorderedList', null)">
          <i class="fas fa-list-ul"></i>
        </button>
        <div class="seperator"></div>
        <select onChange="transform('fontName', this.value)">
          <option disabled default>Font</option>
          <option value="Times New Roman">Times</option>
          <option value="Arial">Arial</option>
          <option value="Courier New">Courier New</option>
          <option value="Tahoma">Tahoma</option>
          <option value="Arial">Verdana</option>
        </select>
        <div class="seperator"></div>
        <input type="number" onChange="transform('fontSize', this.value)" value="3" max="7" min="1"></input>
      </div>
      <!-- <iframe name="editor" id="editor" ></iframe> -->
      <textarea  name="editor" id="editor" rows='10' cols="80" placeholder="Type your code"> </textarea>
    </div>
    <script>
        editor.document.designMode = "On";
        function transform(option, argument) 
        {
            editor.document.execCommand(option, false, argument);
        }
    </script>    
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    
  </div>
  <div class="text-center">
  <!-- <button class="btn btn-warning">Submit</button></a>
  <button class="btn btn-warning">Help</button></a> -->
  <input type="submit" name='submit' value='Submit' class="btn btn-warning"></input> 
  <?php echo"<input type='submit' name='Help' value='Help' class='btn btn-warning' formaction=help_button.php?qid=".$id."></input>";?>
  </form>
  </div>

<!--Footer-->
    <div class="row pt-5 px-3 border-top mt-5" style="font-size: 13px;">
      <div class="col">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link text-info" href="#"><b>Some Text</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-info" href="#"
              ><b>Code Here</b></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link text-info" href="#">Download our Mobile App</a>
          </li>
        </ul>
      </div>
      <div class="col">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link text-info" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-info" href="#">Careers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-info" href="#">Blog</a>
          </li>
        </ul>
      </div>
      <div class="col">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link text-info" href="#">Topics</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-info" href="#">Support</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-info" href="#">Affiliate</a>
          </li>
        </ul>
      </div>
      <div class="col">
        <form>
          <div class="form-group col-6 float-right">
            <select class="form-control" id="exampleFormControlSelect2">
              <option><i class="fas fa-globe"></i> English</option>
              <option>Hindi</option>
              <option>Chinese</option>
              <option>Tamil</option>
              <option>Telegu</option>
            </select>
          </div>
        </form>
      </div>
    </div>
    <nav class="nav mt-5 ml-3" style="font-size: 12px;">
      <span class="nav-link active text-muted font-weight-bold"
        >Local Home Pages</span
      >
      <span class="nav-link">English</span>
      <a class="nav-link text-info" href="#">Hindi</a>
      <a class="nav-link text-info" href="#">Français</a>
      <a class="nav-link text-info" href="#">Português</a>
      <a class="nav-link text-info" href="#">日本語</a>
    </nav>
    <hr />

    <div class="row" style="font-size: 12px;">
      <div class="col pl-5">
        <img src="images/logo-coral.svg" width="100px" class="mr-5" />
        <span>Copyright © 2020 Neel Raval, Inc.</span>
      </div>
      <div class="col">
        <ul class="nav justify-content-end">
          <li class="nav-item">
            <a class="nav-link active text-info" href="#">Terms</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-info" href="#">Privacy and Cookie Police</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-info" href="#">Intellectual Property</a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>