<?php
session_start(); //starting session
require_once("db.php");

$error = "";
$msg = "";

if(isset($_POST['insert']))
{
	// get form elements
	$email = $_POST['email'];
	// check duplicate email in non_member table
	$query= "select * from non_members where BINARY email='$email'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_num_rows($result);
	// check status of non member
	$rowstatus = mysqli_fetch_assoc($result);
	$status = $rowstatus['status'];
	// check duplicate email in users table
	$query1= "select * from users where BINARY email='$email'";
	$result1 = mysqli_query($conn, $query1);
	$row1 = mysqli_num_rows($result1);
	
	if($row == 1 && $status == "Not Approved")
	{
		$msg="You have not yet been approved by admin. Please check your email for confirmation.";
	}
	
	if($row == 1 && $status == "Blocked")
	{
		$error="Your email have been blocked.";
	}
	
	if($row1 == 1)
	{
		$error="Your email have been registered as member.";
	}
	
	if($row != 1 && $row1 != 1)
	{
		$username = $_POST['username'];
		// hash password
		$password = $_POST['password'];
		$options = ['cost' => 11,];
		$hash = password_hash($password, PASSWORD_BCRYPT, $options);
		$reasons = $_POST['reasons'];
		$query2= "INSERT INTO non_members (name,email,password,reasons,status) VALUES ('$username', '$email', '$hash', '$reasons', 'Not Approved')";
		$msg="Your request will be reviewed in 24 hours time. Please check your email for confirmation.";
		mysqli_query($conn, $query2);
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
    <script src="layout/js/plugins/pace.min.js"></script>
    <script src="layout/js/main.js"></script>
  </head>
  <body>
    <section class="login-content" style="background-color:white">
      <div class="logo">
		  <a href="index.php"><img src="images/logo_top.png"></a>
      </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <h3 class="card-title" style="text-align: center;"><i class="fa fa-edit"></i>Register</h3>  
              <?php
				  if ($error != "")
				  {
					  echo '<div class="alert alert-dismissible alert-danger">';
					  echo '<button type="button" data-dismiss="alert" class="close">×</button>';
					  echo '<center><strong>' .$error. '</strong></center>';
					  echo '</div>';
				  }
				  if ($msg != "")
				  {
					  echo '<div class="alert alert-dismissible alert-success">';
					  echo '<button type="button" data-dismiss="alert" class="close">×</button>';
					  echo '<center><strong>' .$msg. '</strong></center>';
					  echo '</div>';
				  }
				?>
              <form action="" method="post">
              <div class="card-body">
                  <div class="form-group">
                    <label class="control-label">Name</label>
                    <input type="text" id="username" name="username" placeholder="Enter username" class="form-control">
                  </div>
				  <div class="form-group">
                    <label class="control-label">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter email" class="form-control">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter password" class="form-control">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Reasons to Join</label>
                    <textarea rows="4" cols="50" id="reasons" name="reasons" placeholder="Enter your reasons" class="form-control"></textarea>
                  </div>   
                  <div class="form-group">
					<div class="utility" align="right">       
					  <p class="semibold-text mb-0"><a href="login.php">Back to Login <i class="fa fa-sign-in fa-lg"></i></a></p>
					</div>
				  </div>          
              </div>
              <div class="card-footer">
                <center>
                <button type="button" name="insert" class="btn btn-primary icon-btn" onclick="validateForm();"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register
                </button>&nbsp;&nbsp;&nbsp;
                <button type="reset" class="btn btn-primary icon-btn"><i class="fa fa-fw fa-lg fa-refresh"></i>Reset
                </button>
				</center>
              </div>
                </form>
            </div>
          </div>
    </section>
    <script>
      function validateForm()
      {
        if (document.getElementById("username").value === "" )
		{
            alert("Please insert your name");
			window.setTimeout(function ()
			{
				document.getElementById('username').focus();
			}, 0);
		return false;
        }
		else if (!/^[a-zA-Z ]*$/g.test(document.getElementById("username").value))
		{
			alert("Username must be in alphabet only");
			window.setTimeout(function ()
			{
				document.getElementById('username').focus();
			}, 0);
		return false;
		}		
        else if (document.getElementById("email").value === "" )
		{
            alert("Please insert your email");
			window.setTimeout(function ()
			{
				document.getElementById('email').focus();
			}, 0);
		return false;
        }
        else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById("email").value))
		{
			alert("You have entered an invalid email address");
			window.setTimeout(function ()
			{
				document.getElementById('email').focus();
			}, 0);
		return false;
		}
		  else if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$/.test(document.getElementById("password").value))
		{
			alert("Your password must have at least one digit, one lowercase, one uppercase, one special character and at least 8 to 15 characters");
			window.setTimeout(function ()
			{
				document.getElementById('password').focus();
			}, 0);
		return false;
		}
		else if (document.getElementById("reasons").value === "")
		{
            alert("Please insert reasons to join");
			window.setTimeout(function ()
			{
				document.getElementById('reasons').focus();
			}, 0);
		return false;
        }
		else
        {
         	document.getElementsByName("insert")[0].type = "submit";
        }
    }      
    </script>
  </body>
</html>