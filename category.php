<?php
session_start();
require_once("db.php");

$cat = $_REQUEST['cat'];
?>

<!DOCTYPE html>
<html>

<head>
<title>REBOOT</title>

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
		<div id="content" class="sidebar_right">
			<div class="inner">			
				<div class="block_general_title_1 w_margin_1">
					<h1><?php echo $cat; ?></h1>
				</div>			
				<div class="block_posts type_2">	
				<?php 
					$query="SELECT id, title, date, category FROM blog WHERE status='Approved' AND category='$cat' ORDER BY date ASC";
					$result=mysqli_query($conn, $query);
					while($row=mysqli_fetch_row($result))
					{
				?>
					<article class="post_type_3">						
						<div class="content">
							<div class="info">
								<div class="tags"><?php echo $row[3]; ?></div>
								<div class="date"><?php echo $row[2]; ?></div>
							</div>
							
							<div class="title">
								<a href="view_blog.php?blogid=<?php echo $row[0]; ?>"><?php echo $row[1]; ?></a>
							</div>
						</div>
					</article>
					<?php
						}
					?>					
					<div class="clearboth"></div>
				</div>		
			</div>
		</div>
		<!-- CONTENT END -->
		
		<!-- FOOTER BEGIN -->
		<footer>
			<div id="footer">
				<section class="bottom">
					<div class="inner">
						<div class="block_copyrights"><p>&copy; Copyright 2013 by WebLionMedia. All Rights Reserved.</p></div>
					</div>
				</section>
			</div>
		</footer>
		<!-- FOOTER END -->
	</div>
</body>

</html>