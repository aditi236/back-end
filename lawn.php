
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "traveldb";


$con = new mysqli($host, $user, $pass, $db);
if($con->connect_error)
{die("Connection failed: " .$con->connect_error);
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$_SESSION['username']=$_POST['username'];
$_SESSION['password']=$_POST['password'];

$con->close();

?>

<!DOCTYPE html>
<html>
    <head>
        <h1> TRAVEL AGENCY</h1>
</head>
<p>
    <a href = "country.php"> Countries and landmarks </a>
    <br>
    <br>
    <a href = "you.php"> Places you have visited </a>
    <br>
    <br>
    <a href = "review.php"> New Review </a>

</p>



</html>