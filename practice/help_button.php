<?php
    session_start();
    // error_reporting
    include('connection.php');
    $qid=$_REQUEST['qid'];
    $uid=$_SESSION['id'];
    $query="SELECT * from help";
    $result=mysqli_query($conn,$query);
  //  $sql = "SELECT * FROM question WHERE q_id=$id";
  //$result =  mysqli_query($conn,$sql);
  //$id=$_REQUEST['id'];
  
 // $help ="";
  $now = date('Y-m-d H:i:s');
  function jsLog(...$args) {
    ?>
    <script>
      console.log(<?= json_encode($args, JSON_THROW_ON_ERROR); ?>);
    </script>
    <?php
  }
    if(isset($_POST['submit']))
    {
      //$help = $_POST['help'];
      $tech=$_REQUEST['tech'];
      $ques=$_REQUEST['question'];
      $dec=$_REQUEST['decription'];
      $ans=$_REQUEST['answer'];
      $link=$_REQUEST['link'];
      
    //   $qid1=$GLOBALS['qid'];
    //   $uid1=$GLOBALS['uid'];
    //   $now1=$GLOBALS["date('Y-m-d H:i:s')"];
    //   $tech1=$GLOBALS['tech'];
    //   $ans1=$GLOBALS['ans'];
    //   $link1=$GLOBALS['link'];
    //   $dec1=$GLOBALS['qid'];

        $insert= "INSERT INTO help (h_tech,h_ques,h_dec,h_ans,h_link,q_id,user_id,h_date) values ('$tech','$ques','$dec','$ans','$link',$qid,$uid,now())";
        // echo $tech;
        // echo $ques;
        // echo $dec;
        // echo $ans;
        // echo $link;
        // echo $qid;
        // echo $uid;
        //  echo $now;
       
        $run=mysqli_query($conn,$insert);
        if(mysqli_affected_rows($conn)==1){
            $query="SELECT * from help";
            $result=mysqli_query($conn,$query);
         //   jsLog(mysqli_error($query));
        }
        
        else
     {
         echo 'failed';
     }
       
      
    } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a4c432fcd6.js" crossorigin="anonymous"></script>

    <title>Help</title>
    <style>

        * {
            margin: 0px;
            padding: 0px;
        }

        .data {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: initial;
            width: auto;
            background-color: lightgray;
            margin-left: 8%;
            margin-top: 50px;
            margin-bottom: 50px;
            margin-right: 8%;
            padding: 20px;
            display: inline-block;
        }

        .table {
            width: 100%;
            margin-top: 20px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        th, td {
            height: 40px;
            text-align: center;
            padding: 5px;
        }

        .form {
            margin-top: 20px;
        }

        input {
            height: 40px;
            text-indent: 20px;
       }

       button {
           padding: 10px;
       }

       .modal {
            width: 100%;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
            position: fixed;
            display: none;
        }

        .modalchild {
            height: 200px;
            width: 70%;
            background-color: white;
            margin-left: 15%;
            margin-top: 100px;
            display: inline-block;
            padding: 30px;
        }
        body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box;}
    
    /* Button used to open the contact form - fixed at the bottom of the page */
    .open-button {
      background-color: #555;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      opacity: 0.8;
      position: fixed;
      bottom: 23px;
      right: 28px;
      width: 280px;
    }
    
    /* The popup form - hidden by default */
    .form-popup {
      display: none;
      position: fixed;
      bottom: 0;
      right: 15px;
      border: 3px solid #f1f1f1;
      z-index: 9;
    }
    
    /* Add styles to the form container */
    .form-container {
      max-width: 300px;
      padding: 10px;
      background-color: white;
    }
    
    /* Full-width input fields */
    .form-container input[type=text], .form-container input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      background: #f1f1f1;
    }
    
    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus, .form-container input[type=password]:focus {
      background-color: #ddd;
      outline: none;
    }
    
    /* Set a style for the submit/login button */
    .form-container .btn {
      background-color: #4CAF50;
      color: white;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom:10px;
      opacity: 0.8;
    }
    
    /* Add a red background color to the cancel button */
    .form-container .cancel {
      background-color: red;
    }
    
    /* Add some hover effects to buttons */
    .form-container .btn:hover, .open-button:hover {
      opacity: 1;
    }

    </style>
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
    
    <div class="modal" onclick="hideModal(event)">
        <div class="modalchild">
            <div class="form">
                <form method=post  action="">
                    <input type="text" required placeholder="Technology" id="uptech">
                    <input type="text" required placeholder="Question" id="upques">
                    <input type="text" required placeholder="Description" id="updesc">
                    <input type="text" required placeholder="Name" id="upname">
                    <input type="email" required placeholder="Mail" id="upmail">
                    <input type="text" placeholder="Answer" id="upans">
                    <input type="url" placeholder="Link" id="uplink">
                    <!-- <input type="text" placeholder="Query" id="upquer"> -->
                    <button type="submit">Update Query</button>
                </form>
            </div>
        </div>
    </div>

    <div class="data">
        <h1>Answer Doubts</h1>
        
        <div class="form">
        <form method=post  action="">
                <input type="text" required placeholder="Technology" name='tech' id="tech">
                <input type="text" required placeholder="Question" name='question' id="ques">
                <input type="text" required placeholder="Description" name='decription'id="desc">
                <!-- <input type="text" required placeholder="Name" id="name">
                <input type="email" required placeholder="Mail" id="mail"> -->
                <input type="text" placeholder="Answer" name='answer' id="ans">
                <input type="url" placeholder="Link" name='link' id="link">
                <!-- <input type="text" placeholder="Write your query" id="quer"> -->
                <input type="submit" name="submit" value="Add Query"></button>
            </form>
        </div>

        <div class="form">
            <input type="text" placeholder="Start Searching here" id="searchTech" onkeyup="searchByTech()" />
        </div>

        <table border="10" class="table" cellspacing="0">
        <thead>
                <tr>
                    <th>Sr no</th>
                    <th>Technology</th>
                    <th>Question</th>
                    <th>Description</th>
                    <!-- <th>Name</th>
                    <th>Mail</th> -->
                    <th>Answer</th>
                    <th>Link</th>
                    <!-- <th>Query</th> -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="tdata" id="tdata">
            <?php while($row = $result->fetch_array()):?>
            
            <tr>
                    <th><?php echo $row["h_id"];?></th>
                    <th><?php echo $row["h_tech"];?></th>
                    <th><?php echo $row["h_ques"];?></th>
                    <th><?php echo $row["h_dec"];?></th>
                    <th><?php echo $row["h_ans"];?></th>
                    <th><?php echo $row["h_link"];?></th>
                    <th><button  onclick="openForm()">Update</button>
                    <?php 
                    $hid=$row["h_id"];
                    // echo $hid;
                    ?>
                    <div class="form-popup" id="myForm">
                   
                    <form  class='form-container' method=get action=add.php>
                    <h1>Update From</h1>
                   
                    <label for="answer"><b>Answer</b></label>
                    <input type="text" placeholder="Enter your answer" name="answer" required>
                
                    <label for="link"><b>Link</b></label>
                    <input type="link" placeholder="Enter your link" name="link" required>
                    
                    <?php echo "<input  type='hidden' name='qid' value=".$qid.">";
                    echo "<label for='srno'><b>Sr No</b></label>";
                    echo "<input  type='text' name='hid'  placeholder='Enter Sr No' >";
                    // echo "<input  type='text' name='hid'  value=".$hid.">";?>
                    <button type="submit" class="btn" name='add'>Add</button> 
                    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                  </form>
                </div>
    
        </th>
            </tr>
            
        <?php endwhile;?>
        </tbody>
      </table>

    </div>
    <script>
        function openForm() {
          document.getElementById("myForm").style.display = "block";
        }
        
        function closeForm() {
          document.getElementById("myForm").style.display = "none";
        }
      </script>
    
</body>
</html>