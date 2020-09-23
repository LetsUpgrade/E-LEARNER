<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
    session_start();
    // error_reporting();
    include('connection.php');
   
    function jsLog(...$args) {
        ?>
        <script>
          console.log(<?= json_encode($args, JSON_THROW_ON_ERROR); ?>);
        </script>
      <?php  }
    $hid=$_REQUEST['hid'];
    $qid=$_REQUEST['qid'];
    $ans=$_REQUEST['answer'];
    $link=$_REQUEST['link'];
    $query="UPDATE help SET h_ans='$ans', h_link='$link' WHERE h_id=$hid";
    $run=mysqli_query($conn,$query);
    echo mysqli_affected_rows($conn);
    if(mysqli_affected_rows($conn)==1)
    {
        echo "inside if";
        header("Location:help_button.php?qid=".$qid."");
        
        // echo "<script>if(swal('Good job!', 'You have solved the doubt!', 'success')){document.location.href=help_button.php?qid=".$qid.")};</script>";
        // echo "<script>if(confirm('You have solved the doubt!')){document.location.href=help_button.php?qid=".$qid."};</script>";



      // jsLog(mysqli_error($run));
    }
    
?>