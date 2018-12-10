<?php
session_start(); // Starting Session
require_once("db.php");
// Storing Session
$user_check = $_SESSION['email'];
// SQL Query To Fetch Complete Information Of User
$ses_sql = "select email from users where email = '$user_check'";
$result = mysqli_query($conn,$ses_sql);
$row = mysqli_fetch_assoc($result);
$login_session = $row['email'];
if(!isset($login_session))
{
	mysqli_close($conn); //Closing Connection
	header('Location: ../login.php'); //Redirecting to Home Page
}
?>