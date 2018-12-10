<?php
session_start();
require_once("db.php");

$blogid = $_REQUEST['blogid'];
$msg ="";
if(isset($_POST['insert']))
{
	$comment = $_POST['message'];
	$date = date("Y-m-d");
	$query1= "INSERT INTO comments (blogid,username,comment,date) VALUES ('$blogid', '{$_SESSION['name']}', '$comment', '$date')";
	mysqli_query($conn, $query1);
	$msg = "You have commented on this post";
}
if(isset($_POST['like']))
{
	$query1= "INSERT INTO likes (blogid,username) VALUES ('$blogid', '{$_SESSION['name']}')";
	mysqli_query($conn, $query1);
	$msg = "You have liked this post";
}
?>

<!DOCTYPE html>
<html>

<head>
<title>Enterprise - Standard Post</title>

<meta name="keywords" content="">
<meta name="description" content="">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!--[if lt IE 9]>
<script type="text/javascript" src="layout/plugins/html5.js"></script>
<![endif]-->

<link rel="stylesheet" href="layout/style.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script type="text/javascript" src="layout/js/jquery.js"></script>
<script type="text/javascript" src="layout/js/plugins.js"></script>

<script type="text/javascript" src="layout/js/main.js"></script>

</head>

<body class="sticky_footer">
	<div class="wrapper">
		<!-- HEADER BEGIN -->
		<header>
			<div id="header">
				<section class="top">
					<div class="inner">
						<div class="block_top_menu">
							<nav>
								<ul>
									<li class="current_page_item"><a>REBOOT</a></li>
									<li><a href="archives.php">ARCHIVES</a></li>
									<li><a href="list_meetup.php">MEET-UPS</a></li>
									<?php								
									if ((isset($_SESSION['loggedin'])) && ($_SESSION['loggedin'] == true) && ($_SESSION['level'] == 'admin')) 
									{
										echo "<li><a><i class='fa fa-user'></i></a>";	
										echo "<ul>";
										echo "<li><a href='admin/index.php'>RETURN TO ADMIN PANEL</a></li>";
										echo "<li><a href='logout.php'>LOGOUT</a></li>";
										echo "</ul>";
										echo "</li>";
									} 
									if ((isset($_SESSION['loggedin'])) && ($_SESSION['loggedin'] == true) && ($_SESSION['level'] == 'member')) 
									{
										echo "<li><a><i class='fa fa-user'></i></a>";	
										echo "<ul>";
										echo "<li><a href='members/index.php'>RETURN TO MEMBER PANEL</a></li>";
										echo "<li><a href='logout.php'>LOGOUT</a></li>";
										echo "</ul>";
										echo "</li>";
									} 
									if (!isset($_SESSION['loggedin']))
									{
										echo "<li><a href='login.php'>LOGIN/REGISTER</a></li>";
									}
									?>
											
								</ul>
							</nav>
						</div>
						
						<div class="clearboth"></div>
					</div>
				</section>
				
				<section class="middle">
					<div class="inner">
						<div id="logo_top"><a href="index.php"><img src="images/logo_top.png" alt="REBOOT" title="REBOOT"></a></div>
					</div>
				</section>
				<?php 
				if ($msg != "")
				{
					echo "<div class='general_info_box success'>";
					echo "<a href='#' class='close'>Close</a>";
					echo "<center><p>$msg</p></center>";
					echo "</div>";
				}
				?>
				<section class="bottom">
					<div class="inner">
						<div class="block_secondary_menu">
							<nav>
								<ul>
									<li data-content="design1"><a href="category.php?cat=Server-side Scripting">SERVER-SIDE SCRIPTING</a>
									<div class="tail"></div></li>
									<li data-content="design2"><a href="category.php?cat=Markup Language">MARKUP LANGUAGES</a>
									<div class="tail"></div></li>
									<li data-content="design3"><a href="category.php?cat=Web Design">WEB DESIGN</a>
									<div class="tail"></div></li>
									<li data-content="design4"><a href="category.php?cat=Web Interactivity">WEB INTERACTIVITY</a>
									<div class="tail"></div></li>
									<li data-content="design5"><a href="category.php?cat=Web Security">WEB SECURITY</a>
									<div class="tail"></div></li>
									<li data-content="design6"><a href="category.php?cat=Database">DATABASE</a>
									<div class="tail"></div></li>
								</ul>
							</nav>
							<div class="dropdown" data-menu="design1">
								<div class="menu_type_1">
									<ul>
									<?php 
										$querys="SELECT * FROM subcategory WHERE parent='Server-side Scripting'";
										$results=mysqli_query($conn, $querys);
										while($rows=mysqli_fetch_row($results))
										{
									?>
										<li><a><?php echo $rows[1]; ?></a></li>
									<?php
										}
									?>
									</ul>
								</div>
							</div>
							<div class="dropdown" data-menu="design2">
								<div class="menu_type_1">
									<ul>
									<?php 
										$querys="SELECT * FROM subcategory WHERE parent='Markup Language'";
										$results=mysqli_query($conn, $querys);
										while($rows=mysqli_fetch_row($results))
										{
									?>
										<li><a><?php echo $rows[1]; ?></a></li>
									<?php
										}
									?>
									</ul>
								</div>
							</div>
							<div class="dropdown" data-menu="design3">
								<div class="menu_type_1">
									<ul>
									<?php 
										$querys="SELECT * FROM subcategory WHERE parent='Web Design'";
										$results=mysqli_query($conn, $querys);
										while($rows=mysqli_fetch_row($results))
										{
									?>
										<li><a><?php echo $rows[1]; ?></a></li>
									<?php
										}
									?>
									</ul>
								</div>
							</div>
							<div class="dropdown" data-menu="design4">
								<div class="menu_type_1">
									<ul>
									<?php 
										$querys="SELECT * FROM subcategory WHERE parent='Web Interactivity'";
										$results=mysqli_query($conn, $querys);
										while($rows=mysqli_fetch_row($results))
										{
									?>
										<li><a><?php echo $rows[1]; ?></a></li>
									<?php
										}
									?>
									</ul>
								</div>
							</div>
							<div class="dropdown" data-menu="design5">
								<div class="menu_type_1">
									<ul>
									<?php 
										$querys="SELECT * FROM subcategory WHERE parent='Web Security'";
										$results=mysqli_query($conn, $querys);
										while($rows=mysqli_fetch_row($results))
										{
									?>
										<li><a><?php echo $rows[1]; ?></a></li>
									<?php
										}
									?>
									</ul>
								</div>
							</div>
							<div class="dropdown" data-menu="design6">
								<div class="menu_type_1">
									<ul>
									<?php 
										$querys="SELECT * FROM subcategory WHERE parent='Database'";
										$results=mysqli_query($conn, $querys);
										while($rows=mysqli_fetch_row($results))
										{
									?>
										<li><a><?php echo $rows[1]; ?></a></li>
									<?php
										}
									?>
									</ul>
								</div>
							</div>							
						</div>
					</div>
				</section>
			</div>
		</header>
		<!-- HEADER END -->
		
		<!-- CONTENT BEGIN -->
		<div id="content">
			<div class="inner">
				<div class="block_general_title_2">
				<?php 
					$query1="SELECT blog.title, blog.story, blog.date, blog.category, users.name, blog.sub FROM blog INNER JOIN users ON blog.email = users.email WHERE blog.status='Approved' AND blog.id='$blogid'";
					$result1=mysqli_query($conn, $query1);
					while($row1=mysqli_fetch_row($result1))
					{
				?>
				<h1><?php echo $row1[0]; ?></h1>
				<h2>
				<a class="tags"><?php echo $row1[3]; ?></a>
				&nbsp;&nbsp;/&nbsp;&nbsp;<a class="tags"><?php echo $row1[5]; ?></a>
				&nbsp;&nbsp;/&nbsp;&nbsp;<span class="author">by <a><?php echo $row1[4]; ?></a></span>&nbsp;&nbsp;/&nbsp;&nbsp;<span class="date"><?php echo $row1[2]; ?></span></h2>
				<?php 
					$query2="SELECT * FROM likes WHERE blogid='$blogid'";
					$result2=mysqli_query($conn, $query2);
					$rowcount2=mysqli_num_rows($result2);
				?>
					<div class="stats">
						<div class="likes"><?php echo $rowcount2; ?></div>
					</div>
				</div>
				
				<div class="main_content">
					<div class="block_content">
					<?php 
					if(preg_match('/http/',$row1[1]))
					{
						echo "<iframe src='$row1[1]' height='200' width='935'></iframe>";
						echo "If the frame does not worked, you can go to this website directly.<br><br>";
						echo "<a href= $row1[1]>$row1[1]</a>";
					} 
					else 
					{
						echo $row1[1];
					}
					?>
						
						<div class="line_1"></div>
					</div>	
					<?php 
					}
					?>
					<?php
						
						if((isset($_SESSION['loggedin'])) && ($_SESSION['loggedin'] == true))
						{
							$query3="SELECT * FROM likes WHERE blogid='$blogid' AND username='{$_SESSION['name']}'";
							$result3=mysqli_query($conn, $query3);
							$rowcount3=mysqli_num_rows($result3);
							if($rowcount3 == 0)
							{
								echo "<div class='block_comments_1'>";
								echo "<h3>";
								echo "<form action='' method='post'>";
								echo "<button type='submit' name='like' class='general_button_type_3 submit' >Likes</button>";
								echo "</form>";
								echo "</h3>";
								echo "</div>";
							}
							else
							{
								echo "<div class='block_comments_1'>";
								echo "<h3>";
								echo "<form action='' method='post'>";
								echo "<button type='button' name='like' class='general_button_type_3 submit' disabled >Already Liked</button>";
								echo "</form>";
								echo "</h3>";
								echo "</div>";
							}
						}
					
					?>
					<div class="block_comments_1">
						<h3>Comments</h3>
						<div class="comments">						
							<div class="comment">
							<?php 
								$query4="SELECT username, comment, date FROM comments WHERE blogid='$blogid'";
								$result4=mysqli_query($conn, $query4);
								while($row4=mysqli_fetch_row($result4))
								{
							?>	
							<div class="inside">
								<div class="content">
									<div class="author"><a href="#"><?php echo $row4[0]; ?></a></div>
									<div class="info"><?php echo $row4[2]; ?></div>
									<div class="text">
										<p><?php echo $row4[1]; ?></p>
									</div>
								</div>
								<div class="clearboth"></div>
							</div>
							<?php 
								}
							?>
							</div>					
						</div>
					</div>
					<?php
					if ((isset($_SESSION['loggedin'])) && ($_SESSION['loggedin'] == true)) 
						{
					?>
						<div class="block_leave_comment_1 type_1">
							<h3>Leave a comment</h3>

							<div class="form">
								<form action="" method="post">	
									<div class="oh">
										<div class="label">Comment <span>*</span></div>
										<div class="textarea"><textarea id="message" name="message" class="w_focus_mark" cols="1" rows="1"></textarea></div>

										<div class="button"><a href="#" class="general_button_type_3 submit"><button type="button" name="insert" class="general_button_type_3 submit" onClick="validateForm();">Submit Your Comment</button></a></div>
									</div>
								</form>
							</div>
						</div>
					<?php
						} 
					?>
				</div>				
			</div>
		</div>
		<!-- CONTENT END -->
		
		<!-- FOOTER BEGIN -->
		<footer>
			<div id="footer">			
				<section class="bottom">
					<div class="inner">
						<div class="block_copyrights"><p>&copy; Copyright 2018 by KDUPG. All Rights Reserved.</p></div>
					</div>
				</section>
			</div>
		</footer>
		<!-- FOOTER END -->
	</div>
	<script>
      function validateForm()
      {
        if (document.getElementById("message").value === "" )
		{
            alert("Please insert your comment");
			window.setTimeout(function ()
			{
				document.getElementById('message').focus();
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