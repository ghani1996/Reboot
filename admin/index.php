<?php
require_once ("../session.php");
require_once ("../Mailer/PHPMailerAutoload.php");

$error = "";
$msg = "";

if(isset($_GET['approvemem_id']))
{
	$sql1="SELECT * FROM non_members WHERE id=".$_GET['approvemem_id'];
	$res1= mysqli_query($conn, $sql1);
	$row1 = mysqli_fetch_assoc($res1);
	$names = $row1['name'];
	$email = $row1['email'];
	$password = $row1['password'];

	$mail = new PHPMailer;
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'riyazahmad5353@gmail.com';                 // SMTP username
	$mail->Password = $pw;                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to
	$mail->setFrom('riyazahmad5353@gmail.com', 'Reboot E-Magazine');
	$mail->addAddress($email);     // Add a recipient
	$mail->Subject = 'Member Confirmation';
	$mail->Body =
	'Reboot Magazine
	--------------------------------------------------------------------
	You are now part of Reboot E-magazine. 
	Dont forget to read the rules and express your idea via the articles 
	in the e-magazine.
	--------------------------------------------------------------------

	Sincerely,
	Riyaz Ahmad
	Admin of Reboot E-magazine';
	
	if(!$mail->send())
	{
		$error = "Email could not be sent to the recently approved member. Error". $mail->ErrorInfo;
	}
	else
	{
		$sql2="INSERT INTO users (name,email,password,details,sub,level) VALUES ('$names','$email','$password','','','member')";
		mysqli_query($conn, $sql2);

		$sql3="DELETE FROM non_members WHERE id=".$_GET['approvemem_id'];
		mysqli_query($conn, $sql3);
		
		echo '<script type="text/javascript">';
		echo 'window.history.replaceState("", "", window.location.href.split("?")[0]);';
     	echo '</script>';
		$msg = "Email has been sent to the recently approved member.";
	}
}

if(isset($_GET['blockmem_id']))
{
	$sql4= "UPDATE non_members SET status ='Blocked' WHERE id=".$_GET['blockmem_id'];
	mysqli_query($conn, $sql4);
	echo '<script type="text/javascript">';
	echo 'window.history.replaceState("", "", window.location.href.split("?")[0]);';
    echo '</script>';
	$msg = "The pending member has been blocked";
	
}

if(isset($_GET['approveart_id']))
{
	$sql5="SELECT * FROM blog WHERE id=".$_GET['approveart_id'];
	$res5= mysqli_query($conn, $sql5);
	$row5 = mysqli_fetch_assoc($res5);
	$email = $row5['email'];
	
	$mail = new PHPMailer;
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'riyazahmad5353@gmail.com';                 // SMTP username
	$mail->Password = $pw;                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to
	$mail->setFrom('riyazahmad5353@gmail.com', 'Reboot E-Magazine');
	$mail->addAddress($email);     // Add a recipient
	$mail->Subject = 'Article Confirmation';
	$mail->Body =
	'Reboot Magazine
	--------------------------------------------------------------------
	Your article has been approved.
	Feel free to post any other article or share any article from other website.
	--------------------------------------------------------------------

	Sincerely,
	Riyaz Ahmad
	Admin of Reboot E-magazine';
	
	if(!$mail->send())
	{
		$error = "Email could not be sent to the member. Error". $mail->ErrorInfo;
	}
	else
	{
		$sql6= "UPDATE blog SET status ='Approved' WHERE id=".$_GET['approveart_id'];
		mysqli_query($conn, $sql6);
		echo '<script type="text/javascript">';
		echo 'window.history.replaceState("", "", window.location.href.split("?")[0]);';
		echo '</script>';
		$msg = "The article has been approved";
	}
}

if(isset($_GET['deleteart_id']))
{
	$sql7="SELECT * FROM blog WHERE id=".$_GET['deleteart_id'];
	$res7= mysqli_query($conn, $sql7);
	$row7 = mysqli_fetch_assoc($res7);
	$email = $row7['email'];

	$mail = new PHPMailer;
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'riyazahmad5353@gmail.com';                 // SMTP username
	$mail->Password = $pw;                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to
	$mail->setFrom('riyazahmad5353@gmail.com', 'Reboot E-Magazine');
	$mail->addAddress($email);     // Add a recipient
	$mail->Subject = 'Article Confirmation';
	$mail->Body =
	'Reboot Magazine
	--------------------------------------------------------------------
	Your article was not been approved due to certain reasons.
	Please ensure the article are well-written and relevant to the topic.
	--------------------------------------------------------------------

	Sincerely,
	Riyaz Ahmad
	Admin of Reboot E-magazine';
	
	if(!$mail->send())
	{
		$error = "Email could not be sent. Error". $mail->ErrorInfo;
	}
	else
	{
		$sql8="DELETE FROM blog WHERE id=".$_GET['deleteart_id'];
		mysqli_query($conn, $sql8);
		
		echo '<script type="text/javascript">';
		echo 'window.history.replaceState("", "", window.location.href.split("?")[0]);';
     	echo '</script>';
		$msg = "Email has been sent to notify the member";
	}
}

if(isset($_GET['unblock_id']))
{
	$sql9= "UPDATE non_members SET status ='Not Approved' WHERE id=".$_GET['unblock_id'];
	mysqli_query($conn, $sql9);
	echo '<script type="text/javascript">';
	echo 'window.history.replaceState("", "", window.location.href.split("?")[0]);';
    echo '</script>';
	$msg = "The user have been unblocked";
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
    <title>Welcome Admin</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header hidden-print"><a href="../index.php" class="logo">REBOOT</a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a href="#" data-toggle="offcanvas" class="sidebar-toggle"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              <!-- User Menu-->
              <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu">
                  <li><a href="../index.php"><i class="fa fa-cog fa-lg"></i> Return to Magazine Panel</a></li>
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
            <div class="pull-left image"><img src="../images/admin.jpg" alt="User Image" class="img-circle"></div>
            <div class="pull-left info">
              <p>Hi, <?php echo $_SESSION['name']; ?> !</p>
              <p class="designation">Administrator</p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i><span>DASHBOARD</span></a></li>
            <li class="treeview"><a href="#"><i class="fa fa-paste"></i><span>ARTICLES</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="add_article.php"><i class="fa fa-circle-o"></i>ADD ARTICLE</a></li>
                <li><a href="list_article.php"><i class="fa fa-circle-o"></i>LIST OF ARTICLE</a></li>
              </ul>
            </li>           
            <li><a href="list_members.php"><i class="fa fa-users"></i><span>MEMBERSHIP</span></a></li>
            <li><a href="meetup.php"><i class="fa fa-calendar"></i><span>MEETUP</span></a></li>
            <li class="treeview"><a href="#"><i class="fa fa-paste"></i><span>CATEGORY</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="add_cat.php"><i class="fa fa-circle-o"></i>ADD CATEGORY</a></li>
                <li><a href="list_cat.php"><i class="fa fa-circle-o"></i>LIST OF CATEGORY</a></li>
              </ul>
            </li> 
            <li><a href="follow.php"><i class="fa fa-heart"></i><span>FOLLOW</span></a></li> 
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>          
          </div>
        </div>
        <?php
		  if ($error != "")
		  {
			  echo '<div align="center" class="alert alert-dismissible alert-danger">';
			  echo '<button type="button" data-dismiss="alert" class="close">×</button>';
			  echo '<center><strong>' .$error. '</strong></center>';
			  echo '</div>';
		  }
		  if ($msg != "")
		  {
			  echo '<div align="center" class="alert alert-dismissible alert-success">';
			  echo '<button type="button" data-dismiss="alert" class="close">×</button>';
			  echo '<center><strong>' .$msg. '</strong></center>';
			  echo '</div>';
		  }
		  ?>
        <div class="row">    
          <div class="col-md-3">
            <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
            <?php
            $query1 = "SELECT * FROM users WHERE level='member'";
            $result1 = mysqli_query($conn,$query1);
            $row1 = mysqli_num_rows($result1); 
            ?>
              <div class="info">
                <h4>MEMBERS</h4>
                <p> <b><?php echo $row1;?></b></p>
              </div>
            </div>
		   </div>
           <div class="col-md-3">
            <div class="widget-small info"><i class="icon fa fa-newspaper-o fa-3x"></i>
            <?php
            $query2 = "SELECT * FROM blog";
            $result2 = mysqli_query($conn,$query2);
            $row2 = mysqli_num_rows($result2); 
            ?>
              <div class="info">
                <h4>ARTICLES</h4>
                <p> <b><?php echo $row2;?></b></p>
              </div>
            </div>
            </div>
            <div class="col-md-3">
            <div class="widget-small danger"><i class="icon fa fa-tag fa-3x"></i>
            <?php
            $query3 = "SELECT * FROM subcategory";
            $result3 = mysqli_query($conn,$query3);
            $row3 = mysqli_num_rows($result3); 
            ?>
              <div class="info">
                <h4>SUB-CATEGORIES</h4>
                <p> <b><?php echo $row3;?></b></p>
              </div>
            </div>
            </div>
            <div class="col-md-3">
            <div class="widget-small warning"><i class="icon fa fa-meetup fa-3x"></i>
            <?php
            $query4 = "SELECT * FROM meetup";
            $result4 = mysqli_query($conn,$query4);
            $row4 = mysqli_num_rows($result4); 
            ?>
              <div class="info">
                <h4>MEETUPS</h4>
                <p> <b><?php echo $row4;?></b></p>
              </div>
            </div>
            </div>
          </div>
          <!-- Start  Members Basic Table  --> 
          <?php
          $query5 = "select * from non_members where status='Not Approved'";				
		  $result5 = mysqli_query($conn,$query5);
		  $row5 = mysqli_num_rows($result5);
		  ?>
          <div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Unapproved Members <span class="badge"><?php echo $row5; ?></span></h3>
			</div>
            <div class="panel-body">        
			<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Reasons</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>

				<?php
				$ctr = 1;
				while($trow5=mysqli_fetch_row($result5))
				{	
				?>
					<tr>
					<td><?php echo $ctr; ?></td>
					<td><?php echo $trow5[1]; ?></td>
					<td><?php echo $trow5[2]; ?></td>
					<td><?php echo $trow5[4]; ?></td>
					<td>
					<a href="javascript:approvemem_id('<?php echo $trow5[0]; ?>')" class="btn btn-info">APPROVE</a>
					<a href="javascript:blockmem_id('<?php echo $trow5[0]; ?>')" class="btn btn-danger">BLOCK</a>
					</td>
					</tr>
				<?php
				$ctr++;
				}	
				?>

				</tbody>
				</table>
				</div>
			  </div>
          </div>
       <!-- End Members Basic Table  --> 
       <!-- Start Article Basic Table  --> 
       	<?php
        $query6 = "select blog.title, blog.story, blog.date, blog.category, users.name, blog.id from blog INNER JOIN users ON blog.email = users.email where status='Not Approved'";
		$result6 = mysqli_query($conn,$query6);
		$querys6 = "select * from blog where status='Not Approved'";				
		$results6 = mysqli_query($conn,$querys6);
		$rows6 = mysqli_num_rows($results6);
		?>
          <div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Unapproved Articles <span class="badge"><?php echo $rows6; ?></span></h3>
			</div>
            <div class="panel-body">        
			<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Headline</th>
						<th>Story/Link</th>
						<th>Date</th>
						<th>Category</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>

				<?php
				$ctr = 1;
				while($trow6=mysqli_fetch_row($result6))
				{	
				?>
					<tr>
					<td><?php echo $ctr; ?></td>
					<td><?php echo $trow6[4]; ?></td>
					<td><?php echo $trow6[0]; ?></td>
					<td><?php echo $trow6[1]; ?></td>
					<td><?php echo $trow6[2]; ?></td>
					<td><?php echo $trow6[3]; ?></td>
					<td>
					<a href="javascript:approveart_id('<?php echo $trow6[5]; ?>')" class="btn btn-info">APPROVE</a>
					<a href="javascript:deleteart_id('<?php echo $trow6[5]; ?>')" class="btn btn-danger">DELETE</a>
					</td>
					</tr>
				<?php
				$ctr++;
				}	
				?>

				</tbody>
				</table>
				</div>
			  </div>
          </div>
       <!-- End Article Basic Table  --> 
       <!-- Start  Block Members Basic Table  --> 
          <?php
          $query7 = "select * from non_members where status='Blocked'";				
		  $result7 = mysqli_query($conn,$query7);
		  $row7 = mysqli_num_rows($result7);
		  ?>
          <div class="panel panel-primary">
			<div class="panel-heading">
			  <h3 class="panel-title">Blocked Users <span class="badge"><?php echo $row7; ?></span></h3>
			</div>
            <div class="panel-body">        
			<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Reasons</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>

				<?php
				$ctr = 1;
				while($trow7=mysqli_fetch_row($result7))
				{	
				?>
					<tr>
					<td><?php echo $ctr; ?></td>
					<td><?php echo $trow7[1]; ?></td>
					<td><?php echo $trow7[2]; ?></td>
					<td><?php echo $trow7[4]; ?></td>
					<td>
					<a href="javascript:unblock_id('<?php echo $trow7[0]; ?>')" class="btn btn-info">UNBLOCK</a>
					</td>
					</tr>
				<?php
				$ctr++;
				}	
				?>

				</tbody>
				</table>
				</div>
			  </div>
          </div>
       <!-- End Block Members Basic Table  --> 
        </div>
      </div>
	  </div>
	  <!-- Javascripts-->
    <script src="../layout/js/jquery-2.1.4.min.js"></script>
    <script src="../layout/js/essential-plugins.js"></script>
    <script src="../layout/js/bootstrap.min.js"></script>
    <script src="../layout/js/main2.js"></script>
    <script type="text/javascript">
	function approvemem_id(id)
	{
		if(confirm('Are you sure you want to approve this member?'))
		{
			window.location.href='index.php?approvemem_id='+id;
		}
	}
		
	function blockmem_id(id)
	{
		if(confirm('Are you sure you want to block the user?'))
		{
			window.location.href='index.php?blockmem_id='+id;
		}
	}
		
	function approveart_id(id)
	{
		if(confirm('Are you sure you want to approve the article?'))
		{
			window.location.href='index.php?approveart_id='+id;
		}
	}
	
	function deleteart_id(id)
	{
		if(confirm('Are you sure you want to block the article?'))
		{
			window.location.href='index.php?deleteart_id='+id;
		}
	}
		
	function unblock_id(id)
	{
		if(confirm('Are you sure you want to unblock the user?'))
		{
			window.location.href='index.php?unblock_id='+id;
		}
	}
		
	</script>
  </body>
</html>