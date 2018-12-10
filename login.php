<?php
session_start(); //starting session
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
require_once("db.php");
?>

<?php
$error = "";
$msg = "";
if(isset($_POST['submit']))
{
	if(empty($_POST['email']) || empty($_POST['password']))
	{
		$error = "Please enter your valid email and password";
	}
  	else
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$query= "select * from users where email='$email'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_num_rows($result);
		
		if($row != 1)
		{
			$error="Email are invalid";
		}
		
		if($row == 1)
		{
			$row1 = mysqli_fetch_assoc($result);
			$hashed= $row1['password'];
			if (password_verify($password, $hashed)) 
			{
				$level = $row1['level'];
				$name = $row1['name'];
				if($level == 'admin')
      			{
					$_SESSION['loggedin'] = true;
					$_SESSION['email'] = $email; 
					$_SESSION['level'] = $level;
					$_SESSION['name'] = $name;
					header("location: admin/index.php"); //redirecting to other page
				}
				if($level == 'member')
				{
					$_SESSION['loggedin'] = true;
					$_SESSION['email'] = $email;
					$_SESSION['level'] = $level;
					$_SESSION['name'] = $name;
					header("location: members/index.php"); //redirecting to other page
				}
			} 
			else 
			{
				$error="Password are invalid";
			}  		
    	}    	
  	}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="layout/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Reboot</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
    <script src="layout/js/jquery-2.1.4.min.js"></script>
    <script src="layout/js/essential-plugins.js"></script>
    <script src="layout/js/bootstrap.min.js"></script>
    <script src="layout/js/main2.js"></script>
  </head>
  <body>
    <section class="login-content" style="background-color:white">
      <div class="logo">
		  <a href="index.php"><img src="images/logo_top.png"></a>
      </div>
      <!--sign-in form-->
      <div class="login-box">
        <form action="" class="login-form" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input type="text" name="email" placeholder="Email" autofocus class="form-control">
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input type="password" name="password" placeholder="Password" class="form-control">
          </div>
          <?php
          if ($error != "")
          {
            echo '<span class="alert alert-danger">' .$error. '</span><br><br>';
          }
          if ($msg != "")
          {
            echo '<span class="alert alert-success">' .$msg. '</span><br><br>';
          }
          ?>
          <div class="form-group">
            <div class="utility">       
              <p class="semibold-text mb-0"><a href="register.php">Don't have account?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" name="submit">SIGN IN <i class="fa fa-sign-in fa-lg"></i></button>
          </div>
        </form>      
      </div>
    </section>
  </body>
</html>