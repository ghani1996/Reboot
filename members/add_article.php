<?php
require_once ("../session.php");

$msg = "";

if(isset($_POST['add']))
{
	// get form elements
	$title = $_POST['title'];
	$owner = $_POST['own'];
	if($owner == "yes")
	{
		$story = $_POST['articleyes'];
	}
	if($owner == "no")
	{
		$story = $_POST['articleno'];
	}
	
	$cat = $_POST['category'];
	if($cat == "Server-side Scripting")
	{
		$sub = $_POST['server'];
	}
	if($cat == "Markup Language")
	{
		$sub = $_POST['markup'];
	}
	if($cat == "Web Design")
	{
		$sub = $_POST['design'];
	}
	if($cat == "Web Interactivity")
	{
		$sub = $_POST['interact'];
	}
	if($cat == "Web Security")
	{
		$sub = $_POST['secure'];
	}
	if($cat == "Database")
	{
		$sub = $_POST['database'];
	}
	$date = date("Y/m/d");
	$query= "INSERT INTO blog (title,story,email,date,category,sub,status) VALUES ('$title', '$story', '$login_session', '$date', '$cat', '$sub', 'Not Approved')";
	$msg="Your article will be reviewed by the admin before being added";
	mysqli_query($conn, $query);
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
            <li><a href="index.php"><i class="fa fa-dashboard"></i><span>DASHBOARD</span></a></li>
            <li class="active"><a href="#"><i class="fa fa-paste"></i><span>ARTICLES</span></a></li>           
            <li><a href="meetup.php"><i class="fa fa-calendar"></i><span>MEETUP</span></a></li>
            <li><a href="follow.php"><i class="fa fa-heart"></i><span>FOLLOW</span></a></li>
          </ul>
        </section>
      </aside>
      <!--body part-->
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-paste"></i> Article</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-10">
            <div class="card">
              <h3 class="card-title">Add Article</h3>
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
                <form action="" method="post">
                  <div class="form-group">
                    <label class="control-label">Title</label>
                    <input type="text" id="title" name="title" placeholder="Enter title of article" class="form-control">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Did you own the article?</label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="own" value="yes" id="radyes" required>Yes
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="own" value="no" id="radno" >No, from other website
                      </label>
                    </div>
                  </div>
                  <!--start hidden-->
                  <div class="form-group" style="display: none;" id="answeryes">
                    <label class="control-label">Article</label>
                    <textarea id="articleyes" name="articleyes" placeholder="Enter your article" class="form-control"></textarea>
                  </div>
                  <div class="form-group" style="display: none;" id="answerno">
                    <label class="control-label">Url of the Website</label>
                    <input type="url" id="articleno" name="articleno" placeholder="http://hello.com" class="form-control" >
                  </div>
                  <!-- stop hidden-->
                  <div class="form-group">
				  <label class="form-group">Main Category</label>
					<select id="category" name="category" class="form-control" required>
				  	  <option value="" checked="checked"></option>
					  <option value="Server-side Scripting">Server-side Scripting</option>
					  <option value="Markup Language">Markup Language</option>
					  <option value="Web Design">Web Design</option>
					  <option value="Web Interactivity">Web Interactivity</option>
					  <option value="Web Security">Web Security</option>
					  <option value="Database">Database</option>
					</select>
                  </div>
                  <!--start hidden-->
                  <div class="form-group" id="server" style="display: none;">
                    <label class="control-label">Sub-Category</label>
                    <select name="server" class="form-control" required>
                    <?php
					  	$query1 = "SELECT * FROM subcategory where parent='Server-side Scripting'";
						$list1 = mysqli_query($conn, $query1);
						while ($row1 = mysqli_fetch_assoc($list1)) 
						{
					?>
                   <option value="<?php echo $row1['name']; ?>"><?php echo $row1['name']; ?></option>
					<?php 
						} 
					?>
					  </select>
                  </div>
                  <div class="form-group" id="markup" style="display: none;">
                    <label class="control-label">Sub-Category</label>
                    <select name="markup" class="form-control" required>
                    <?php
					  	$query2 = "SELECT * FROM subcategory where parent='Markup Language'";
						$list2 = mysqli_query($conn, $query2);
						while ($row2 = mysqli_fetch_assoc($list2)) 
						{
					?>
                   <option value="<?php echo $row2['name']; ?>"><?php echo $row2['name']; ?></option>
					<?php 
						} 
					?>
                  </select>
                  </div>
                  <div class="form-group" id="design" style="display: none;">
                    <label class="control-label">Sub-Category</label>
                    <select name="design" class="form-control" required>
                    <?php
					  	$query3 = "SELECT * FROM subcategory where parent='Web Design'";
						$list3 = mysqli_query($conn, $query3);
						while ($row3 = mysqli_fetch_assoc($list3)) 
						{
					?>
                   <option value="<?php echo $row3['name']; ?>"><?php echo $row3['name']; ?></option>
					<?php 
						} 
					?>
                 </select>
                  </div>
                  <div class="form-group" id="interact" style="display: none;">
                    <label class="control-label">Sub-Category</label>
                    <select name="interact" class="form-control" required>
                    <?php
					  	$query4 = "SELECT * FROM subcategory where parent='Web Interactivity'";
						$list4 = mysqli_query($conn, $query4);
						while ($row4 = mysqli_fetch_assoc($list4)) 
						{
					?>
                   <option value="<?php echo $row4['name']; ?>"><?php echo $row4['name']; ?></option>
					<?php 
						} 
					?>
                 </select>
                  </div>
                  <div class="form-group" id="secure" style="display: none;">
                    <label class="control-label">Sub-Category</label>
                    <select name="secure" class="form-control" required>
                    <?php
					  	$query5 = "SELECT * FROM subcategory where parent='Web Security'";
						$list5 = mysqli_query($conn, $query5);
						while ($row5 = mysqli_fetch_assoc($list5)) 
						{
					?>
                   <option value="<?php echo $row5['name']; ?>"><?php echo $row5['name']; ?></option>
					<?php 
						} 
					?>
                 </select>
                  </div>
                  <div class="form-group" id="database" style="display: none;">
                    <label class="control-label">Sub-Category</label>
                    <select name="database" class="form-control" required>
                    <?php
					  	$query6 = "SELECT * FROM subcategory where parent='Database'";
						$list6 = mysqli_query($conn, $query6);
						while ($row6 = mysqli_fetch_assoc($list6)) 
						{
					?>
                   <option value="<?php echo $row6['name']; ?>"><?php echo $row6['name']; ?></option>
					<?php 
						} 
					?>
                 </select>
                  </div>
                  <!-- stop hidden-->
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
    <script src="../layout/js/tinymce/tinymce.min.js"></script>

    <script>	
	$(function() {
    $('#category').change(function() {
        //This saves some time by caching the jquery value
        var val = $(this).val();
        //This just opens the ones we want based off the selection
        switch (val){	
            case 'Server-side Scripting':
 				$('#server').show();
				$('#markup').hide();
				$('#design').hide();
				$('#interact').hide();
				$('#secure').hide();
				$('#database').hide();
                break;
            case 'Markup Language':
                $('#markup').show();
				$('#server').hide();
				$('#design').hide();
				$('#interact').hide();
				$('#secure').hide();
				$('#database').hide();
                break;
            case 'Web Design':
                $('#design').show();
				$('#markup').hide();
				$('#server').hide();
				$('#interact').hide();
				$('#secure').hide();
				$('#database').hide();
                break;
            case 'Web Interactivity':
                $('#interact').show();
				$('#markup').hide();
				$('#design').hide();
				$('#server').hide();
				$('#secure').hide();
				$('#database').hide();
                break;    
			case 'Web Security':
                $('#secure').show();
				$('#markup').hide();
				$('#design').hide();
				$('#interact').hide();
				$('#server').hide();
				$('#database').hide();
                break; 
			case 'Database':
                $('#database').show();
				$('#markup').hide();
				$('#design').hide();
				$('#interact').hide();
				$('#secure').hide();
				$('#server').hide();
                break; 
        }
    });
	});
	</script>
  <script>
	 $("input[type='radio']").change(function()
	{  
		if($(this).val()=="yes")
		{
			$("#answeryes").show();
			$("#answerno").hide();
			
		}
		if($(this).val()=="no")
		{
			$("#answeryes").hide();
			$("#answerno").show();
		}
	});  
	 
  </script> 
	  <script>
		  tinymce.init({
			selector: '#articleyes',
			height: 400,
			branding: false
		  });
	  </script>
	  
	  <script>
      function validateForm()
      {
       if (document.getElementById("title").value === "" )
		{
            alert("Please insert your title");
			window.setTimeout(function ()
			{
				document.getElementById('title').focus();
			}, 0);
		return false;
        }			
		else if (document.getElementById("category").value === "")
		{
            alert("Please select the category");
			window.setTimeout(function ()
			{
				document.getElementById('category').focus();
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