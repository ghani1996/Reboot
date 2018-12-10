<?php
require_once ("../session.php");

$error = "";
$msg = "";

if(isset($_POST['update']))
{
	$id = $_POST['id'];
	$name = $_POST['update_name'];
    $details = $_POST['update_detail'];
	$email = $_POST['update_email'];
	$current_pass = $_POST['current_pass'];
	$new_pass = $_POST['new_pass'];
	$repeat_pass = $_POST['repeat_pass'];
	
	$query1= "SELECT * FROM users WHERE email='{$_SESSION['email']}'";
	$result1 = mysqli_query($conn, $query1);
	$row1 = mysqli_fetch_assoc($result1);
	
	if (!empty($current_pass))
	{
		$hashed = $row1['password'];
		
		if (!password_verify($current_pass, $hashed))
		{
			$error = "Your current password is invalid";
		}
		elseif (empty($new_pass))
		{
			$error = "Please enter your new password field";
		}
		elseif (empty($repeat_pass))
		{
			$error = "Please enter your repeat password field";
		}	
		elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$/", $new_pass)) 
		{
			$error = "Password does not contain at least 1 number/uppercase/lowercase/special character and 8 to 15 character";
		}
		elseif ($new_pass == $repeat_pass)
		{
			$options = ['cost' => 11,];
			$hash = password_hash($new_pass, PASSWORD_BCRYPT, $options);
			$query2= "UPDATE users SET name='$name', details='$details', email='$email', password='$hash' WHERE id='$id'";
			$msg="Your profile and password have been updated";
			mysqli_query($conn, $query2);
		}
		else
		{
			$error="Something wrong somewhere";
		}
	}

	else
	{
		$query3= "UPDATE users SET name='$name', details='$details', email='$email' WHERE id='$id'";
		$msg="Your profile have been updated";
		mysqli_query($conn, $query3);
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
    <link rel="stylesheet" type="text/css" href="../layout/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Welcome Member</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header hidden-print"><a href="../index.php" class="logo">Reboot</a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a href="#" data-toggle="offcanvas" class="sidebar-toggle"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              <!-- User Menu-->
              <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu">
                  <li><a href="../index.php"><i class="fa fa-cog fa-lg"></i> Return To Magazine Panel</a></li>
                  <li><a href="edit_profile.php"><i class="fa fa-pencil-square-o"></i> Edit Profile</a></li>
                  <li><a href="../logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><img src="../images/member.png" alt="User Image" class="img-circle"></div>
            <div class="pull-left info">
              <p>Hi, <?php echo $_SESSION['name']; ?> !</p>
              <p class="designation">Member</p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i><span>DASHBOARD</span></a></li>
            <li><a href="add_article.php"><i class="fa fa-paste"></i><span>ARTICLES</span></a></li>           
            <li><a href="meetup.php"><i class="fa fa-calendar"></i><span>MEETUP</span></a></li> 
            <li><a href="follow.php"><i class="fa fa-heart"></i><span>FOLLOW</span></a></li>    
          </ul>
        </section>
      </aside>
      <!--body part-->
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-pencil-square-o"></i> Edit Profile</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
             <h3 class="card-title">Your Profile</h3>
              <?php
              	  if ($msg != "")
				  {
					  echo '<div class="alert alert-dismissible alert-success">';
					  echo '<button type="button" data-dismiss="alert" class="close">×</button>';
					  echo '<center><strong>' .$msg. '</strong></center>';
					  echo '</div>';
				  }
				  if ($error != "")
				  {
					  echo '<div class="alert alert-dismissible alert-danger">';
					  echo '<button type="button" data-dismiss="alert" class="close">×</button>';
					  echo '<center><strong>' .$error. '</strong></center>';
					  echo '</div>';
				  }
				?>
              <div class="card-body">
                <table class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Details</th>
                      <th>Email</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
					$query="SELECT * FROM users WHERE email='{$_SESSION['email']}'";
					$result=mysqli_query($conn,$query);
					while($row=mysqli_fetch_row($result))
					{
						?>
							<tr>
								<td><?php echo $row[1]; ?></td>
								<td><?php echo $row[4]; ?></td>
								<td><?php echo $row[2]; ?></td>
								<td align="center"><button class="btn btn-info" data-toggle="modal" data-target="#edit-<?php echo $row[0]; ?>">Edit</button></td>
								
								<div id="edit-<?php echo $row[0]; ?>" tabindex="-1" class="modal fade" role="dialog">
								<div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Edit Your Profile</h4>
								  </div>
								  <form action="" name="myForm" method="POST">
								  <div class="modal-body">
									<input type="hidden" name="id" value="<?php echo $row[0]; ?>" >
									<label>Name</label>
									<input type="text" name="update_name" id="update_name" class="form-control" value="<?php echo $row[1]; ?>">
									<label>Details</label>
									<input type="text" name="update_detail" id="update_detail" class="form-control" value="<?php echo $row[4]; ?>">
									<label>Email</label>
									<input type="email" name="update_email" id="update_email" class="form-control" value="<?php echo $row[2]; ?>">
									<label>Current Password</label>
									<input type="password" name="current_pass" id="current_pass" class="form-control">
									<label>New Password</label>
									<input type="password" name="new_pass" id="update_pass" class="form-control">
									<label>Repeat New Password</label>
									<input type="password" name="repeat_pass" id="repeat_pass" class="form-control">
								  </div>
								  <div class="modal-footer">
									<button type="button" name="update" class="btn btn-success" onclick="validateForm();">Update</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								  </div>
								  </form>
								</div>
							  </div>
							</div>
					</tr>
					<?php
						}
					?>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Javascripts-->
    <script src="../layout/js/jquery-2.1.4.min.js"></script>
    <script src="../layout/js/essential-plugins.js"></script>
    <script src="../layout/js/bootstrap.min.js"></script>
    <script src="../layout/js/main2.js"></script>
    <script>
      function validateForm()
      {
        if (document.getElementById("update_name").value === "" )
		{
            alert("Please insert the employee name");
			window.setTimeout(function ()
			{
				document.getElementById('update_name').focus();
			}, 0);
		return false;
        }
		else if (!/^[a-zA-Z ]*$/g.test(document.getElementById("update_name").value))
		{
			alert("Username must be in alphabet only");
			window.setTimeout(function ()
			{
				document.getElementById('update_name').focus();
			}, 0);
		return false;
		}
		else if (document.getElementById("update_detail").value === "")
		{
            alert("Please insert the password");
			window.setTimeout(function ()
			{
				document.getElementById('update_detail').focus();
			}, 0);
		return false;
        }
		else if (document.getElementById("update_email").value === "")
		{
			alert("Please insert the email");
			window.setTimeout(function ()
			{
				document.getElementById('update_email').focus();
			}, 0);
		return false;
		}
		else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById("update_email").value))
		{
			alert("You have entered an invalid email address");
			window.setTimeout(function ()
			{
				document.getElementById('update_email').focus();
			}, 0);
		return false;
		}
		else
        {
          document.getElementsByName("update")[0].type = "submit";
        }
    }      
    </script>
  </body>
</html>