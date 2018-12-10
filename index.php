<?php
session_start();
require_once("db.php");
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
			<?php	
				if ((isset($_SESSION['loggedin'])) && ($_SESSION['loggedin'] == true)) 
				{
			?>
			<div class="inner" style="padding-bottom: 0px">	
			<div class="block_general_title_1 w_margin_1">
				<h1>MY FAVOURITE</h1>
			</div>		
			<div class="block_posts type_2">
			<!-- START CHECK MY FAVOURITE-->
			<?php
					$query="SELECT * FROM users WHERE name = '{$_SESSION['name']}'";
					$result=mysqli_query($conn, $query);
					$row=mysqli_fetch_assoc($result);
					$sub = $row['sub'];
					if(!empty($sub))
					{
						$query="SELECT id, title, date, category, sub FROM blog WHERE status = 'Approved' AND sub = '$sub' ORDER BY date ASC";
						$result=mysqli_query($conn, $query);
						while($row=mysqli_fetch_row($result))
						{
			?>	
				<article class="post_type_4">
					<div class="feature">
						<div class="image">
							<?php 
							if ($row[3] == 'Server-side Scripting')
							{
								echo "<a href='view_blog.php?blogid=$row[0]'>";
								echo "<img style='width:300px;height:190px;' src='images/server.jpg'>";
								echo "</a>";
							}
							if ($row[3] == 'Web Interactivity')
							{
								echo "<a href='view_blog.php?blogid=$row[0]'>";
								echo "<img style='width:300px;height:190px;' src='images/interact.png'>";
								echo "</a>";
							}
							if ($row[3] == 'Web Design')
							{
								echo "<a href='view_blog.php?blogid=$row[0]'>";
								echo "<img style='width:300px;height:190px;' src='images/design.png'>";
								echo "</a>";
							}
							if ($row[3] == 'Web Security')
							{
								echo "<a href='view_blog.php?blogid=$row[0]'>";
								echo "<img style='width:300px;height:190px;' src='images/secure.png'>";
								echo "</a>";
							}
							if ($row[3] == 'Database')
							{
								echo "<a href='view_blog.php?blogid=$row[0]'>";
								echo "<img style='width:300px;height:190px;' src='images/db.png'>";
								echo "</a>";
							}
							if ($row[3] == 'Markup Language')
							{
								echo "<a href='view_blog.php?blogid=$row[0]'>";
								echo "<img style='width:300px;height:190px;' src='images/markup.png'>";
								echo "</a>";
							}
							?>						
							<span class="hover"></span>								
						</div>
					</div>

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
				}
			?>	
			<div class="clearboth"></div>
			<div class="line_1"></div>
			</div>	
		</div>
		<?php
				}
		?>
			<!-- END CHECK MY FAVOURITE-->
			<!-- NORMAL USER-->
			<div class="inner">			
				<div class="block_general_title_1 w_margin_1">
					<h1>FEATURED POSTS</h1>
				</div>			
				<div class="block_posts type_2">	
				<?php 
					$query="SELECT id, title, date, category FROM blog WHERE status = 'Approved' ORDER BY date ASC";
					$result=mysqli_query($conn, $query);
					while($row=mysqli_fetch_row($result))
					{
				?>
					<article class="post_type_4">
						<div class="feature">
							<div class="image">
								<?php 
								if ($row[3] == 'Server-side Scripting')
								{
									echo "<a href='view_blog.php?blogid=$row[0]'>";
									echo "<img style='width:300px;height:190px;' src='images/server.jpg'>";
									echo "</a>";
								}
								if ($row[3] == 'Web Interactivity')
								{
									echo "<a href='view_blog.php?blogid=$row[0]'>";
									echo "<img style='width:300px;height:190px;' src='images/interact.png'>";
									echo "</a>";
								}
								if ($row[3] == 'Web Design')
								{
									echo "<a href='view_blog.php?blogid=$row[0]'>";
									echo "<img style='width:300px;height:190px;' src='images/design.png'>";
									echo "</a>";
								}
								if ($row[3] == 'Web Security')
								{
									echo "<a href='view_blog.php?blogid=$row[0]'>";
									echo "<img style='width:300px;height:190px;' src='images/secure.png'>";
									echo "</a>";
								}
								if ($row[3] == 'Database')
								{
									echo "<a href='view_blog.php?blogid=$row[0]'>";
									echo "<img style='width:300px;height:190px;' src='images/db.png'>";
									echo "</a>";
								}
								if ($row[3] == 'Markup Language')
								{
									echo "<a href='view_blog.php?blogid=$row[0]'>";
									echo "<img style='width:300px;height:190px;' src='images/markup.png'>";
									echo "</a>";
								}
								?>						
								<span class="hover"></span>								
							</div>
						</div>
						
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
					<div class="line_1"></div>
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
</body>

</html>