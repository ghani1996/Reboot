<?php
require_once ("../session.php");

$msg = "";

if(isset($_POST['add']))
{
	// get form elements
	$program = $_POST['program'];
	$venue = $_POST['venue'];
	$dates = $_POST['dates'];
	$starttime = $_POST['starttime'];
	$endtime = $_POST['endtime'];
	$part = $_POST['part'];
	$query1= "INSERT INTO meetup (program, venue, dates, starttime, endtime, participant, organiser) VALUES ('$program', '$venue', '$dates', '$starttime', '$endtime', '$part', '{$_SESSION['name']}')";
	
	if (mysqli_query($conn, $query1)) 
	{
    	$last_id = mysqli_insert_id($conn);
		$query2= "INSERT INTO meetup_members (meetupid, name) VALUES ('$last_id', '{$_SESSION['name']}')";
		mysqli_query($conn, $query2);
	}
	
	$msg="Your meetup has been added";
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
            <li><a href="index.php"><i class="fa fa-dashboard"></i><span>DASHBOARD</span></a></li>
            <li class="treeview"><a href="#"><i class="fa fa-paste"></i><span>ARTICLES</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="add_article.php"><i class="fa fa-circle-o"></i>ADD ARTICLE</a></li>
                <li><a href="list_article.php"><i class="fa fa-circle-o"></i>LIST OF ARTICLE</a></li>
              </ul>
            </li>           
            <li><a href="list_members.php"><i class="fa fa-users"></i><span>MEMBERSHIP</span></a></li>
            <li class="active"><a href="meetup.php"><i class="fa fa-calendar"></i><span>MEETUP</span></a></li>
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
      <!--body part-->
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-paste"></i> Meetup</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-10">
            <div class="card">
              <h3 class="card-title">Add Meetup</h3>
              <?php
              if ($msg != "")
				  {
					  echo '<div class="alert alert-dismissible alert-success">';
					  echo '<button type="button" data-dismiss="alert" class="close">×</button>';
					  echo '<center><strong>' .$msg. '</strong></center>';
					  echo '</div>';
				  }
				?>
              <div class="card-body">
                <form name="form" id="form" method="post">
                 <div class="form-group">
                    <label class="control-label">Program</label>
                    <input type="text" id="program" name="program" placeholder="Enter program" class="form-control">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Venue</label>
                    <input type="text" id="venue" name="venue" placeholder="Enter venue" class="form-control">
                  </div>
                  <div class="form-group">
				  <label class="form-group">Date</label>
				  <input type="date" id="date" name="dates" placeholder="Enter date" class="form-control">
                  </div>
                  <div class="form-group">
				  <label class="form-group">Start Time</label>
				  <input type="time" id="starttime" name="starttime" placeholder="Enter start time" class="form-control">
                  </div>
                  <div class="form-group">
                    <label class="control-label">End Time</label>
                    <input type="time" id="endtime" name="endtime" placeholder="Enter end time" class="form-control">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Number of Participants</label>
                    <input type="number" min="10" id="part" name="part" placeholder="Enter number of participants" class="form-control">
                  </div>
              </div>
              <div class="card-footer">
               <center>
                <button type="button" name="add" class="btn btn-primary icon-btn" onclick="validateForm();"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add</button>&nbsp;&nbsp;&nbsp;
                <button type="reset" class="btn btn-primary icon-btn"><i class="fa fa-fw fa-lg fa-refresh"></i>Reset
                </button>
				</center>
              </div>
              </form>
            </div>
			</div>
          <div class="clearfix"></div>
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
		 var start_time = $("#starttime").val();
		 var end_time = $("#endtime").val();
		 //convert both time into timestamp
		var stt = new Date("August 24, 2018 " + start_time);
		stt = stt.getTime();

		var endt = new Date("August 24, 2018 " + end_time);
		endt = endt.getTime();
		  
		var q = new Date();
		var m = q.getMonth();
		var d = q.getDay()+3;
		var y = q.getFullYear();		  
		var currdate = new Date(y,m,d);
		
		var meeting = document.getElementById("date").value;
		var meetingdate = new Date(meeting); 
		
       	if (document.getElementById("program").value === "" )
		{
            alert("Please insert the program");
			window.setTimeout(function ()
			{
				document.getElementById('program').focus();
			}, 0);
		return false;
        }		
		else if (document.getElementById("venue").value === "" )
		{
            alert("Please insert the venue");
			window.setTimeout(function ()
			{
				document.getElementById('venue').focus();
			}, 0);
		return false;
        }
		 else if (document.getElementById("date").value === "" )
		{
            alert("Please insert the date");
			window.setTimeout(function ()
			{
				document.getElementById('date').focus();
			}, 0);
		return false;
        }
		else if(currdate > meetingdate)
		{
			alert("Date must not be before today's date");
			window.setTimeout(function ()
			{
				document.getElementById('date').focus();
			}, 0);
		return false;
		}
		 else if (document.getElementById("starttime").value === "" )
		{
            alert("Please insert the starting time");
			window.setTimeout(function ()
			{
				document.getElementById('starttime').focus();
			}, 0);
		return false;
        }
		  else if (document.getElementById("endtime").value === "" )
		{
            alert("Please insert the ending time");
			window.setTimeout(function ()
			{
				document.getElementById('endtime').focus();
			}, 0);
		return false;
        }
		else if (stt > endt)
		{
			alert("The start time cannot be after the end date!");
				window.setTimeout(function ()
				{
					document.getElementById('starttime').focus();
				}, 0);
			return false;
		}
		else if (document.getElementById("part").value === "" )
		{
            alert("Please insert the number of participants");
			window.setTimeout(function ()
			{
				document.getElementById('part').focus();
			}, 0);
		return false;
        }
		else
        {
         	document.getElementsByName("add")[0].type = "submit";
        }
    	}      
    </script>
  </body>
</html>