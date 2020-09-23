<?PHP
error_reporting(0);
session_start();
unset($_SESSION["user_id"]);
unset($_SESSION["username"]);
session_destroy();
header("Location:practicepage.php");

?>




