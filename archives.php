<?php
session_start();
require_once("db.php");
?>
<!DOCTYPE html>
<html>

<head>
<title>Enterprise - Archives</title>

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
									<li><a href="index.php">REBOOT</li>
									<li class="current_page_item">ARCHIVES</a></li>
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
						<div id="logo_top"><a href="index.html"><img src="images/logo_top.png" alt="Enterprise" title="Enterprise"></a></div>
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
				<div class="block_general_title_1">
					<h1>Archives</h1>
					<h2>Monthly Format</h2>
				</div>
				
				<div class="main_content">
					<div class="block_archives">
						<div class="intro">
							<p class="marked">Here is an archive of all of your posts organized by month.</p>
						</div>
						<?php 
							$query1="SELECT * FROM blog group by year(date) order by year(date) desc";
							$result1=mysqli_query($conn, $query1);
							while($row1=mysqli_fetch_assoc($result1))
							{
						?>
						<div class="list">
							<ul>
							<?php 
								$parts = explode('-', $row1['date']);
							?>
								<li><?php echo $parts[0]; ?>
									<ul>
									<?php 
										$query3="SELECT * FROM blog WHERE year(date) = $parts[0] group by month(date) order by month(date) desc";
										$result3=mysqli_query($conn, $query3);
										while($row3=mysqli_fetch_assoc($result3))
										{	
											$parts1 = explode('-', $row3['date']);
									?>
										<li>
											<?php 
											if ($parts1[1] == '01')
											{
												echo "January"; 
											}
											if ($parts1[1] == '02')
											{
												echo "February"; 
											}
											if ($parts1[1] == '03')
											{
												echo "March"; 
											}
											if ($parts1[1] == '04')
											{
												echo "April"; 
											}
											if ($parts1[1] == '05')
											{
												echo "May"; 
											}
											if ($parts1[1] == '06')
											{
												echo "June"; 
											}
											if ($parts1[1] == '07')
											{
												echo "July"; 
											}
											if ($parts1[1] == '08')
											{
												echo "August"; 
											}
											if ($parts1[1] == '09')
											{
												echo "September"; 
											}
											if ($parts1[1] == '10')
											{
												echo "October"; 
											}
											if ($parts1[1] == '11')
											{
												echo "November"; 
											}
											if ($parts1[1] == '12')
											{
												echo "December"; 
											}
											?>
											<ul>
											<?php 
												$query2="SELECT * FROM blog WHERE year(date) = $parts[0] AND month(date) = $parts1[1]";
												$result2=mysqli_query($conn, $query2);
												while($row2=mysqli_fetch_assoc($result2))
												{
											?>
												<li><a href="view_blog.php?blogid=<?php echo $row2['id']; ?>"><?php echo $row2['title'];?></a></li>
											<?php
												}
											?>
											</ul>
										</li>
										<?php
											}
										?>
									</ul>
								</li>
							</ul>
						</div>
						<?php
							}
						?>
					</div>
					
				</div>
				<div class="clearboth"></div>
				
			</div>
		</div>
		<!-- CONTENT END -->
		
		<!-- FOOTER BEGIN -->
		<footer>
			<div id="footer">
				<section class="top">
					<div class="inner">
						<div class="block_footer_widgets">
							<div class="column">
								<div class="block_footer_categories">
									<h3>Posts Categories</h3>
									
									<ul>
										<li><a href="category_photography.html">PHOTOGRAPHY</a></li>
										<li><a href="category_design.html">DESIGN</a></li>
										<li><a href="category_fashion.html">FASHION</a></li>
										<li><a href="category_reviews.html">REVIEWS</a></li>
										<li><a href="category_music.html">MUSIC</a></li>
										<li><a href="category_technology.html">TECHNOLOGY</a></li>
										<li><a href="category_life.html">LIFE</a></li>
										<li><a href="category_travel.html">TRAVEL</a></li>
									</ul>
								</div>
							</div>
							
							<div class="column">
								<div class="block_footer_tags">
									<h3>Tags cloud</h3>
									
									<ul>
										<li><a href="#">Peoples</a></li>
										<li><a href="#">Design</a></li>
										<li><a href="#">Technology</a></li>
										<li><a href="#">Travel</a></li>
										<li><a href="#">Music</a></li>
										<li><a href="#">Photography</a></li>
										<li><a href="#">Fashion</a></li>
										<li><a href="#">Creative</a></li>
										<li><a href="#">Apple</a></li>
										<li><a href="#">News</a></li>
										<li><a href="#">Development</a></li>
									</ul>
								</div>
								
								<div class="block_footer_twitter">
									<h3>Twitter Widget</h3>
									
									<div id="tweets"></div>
									
									<script type="text/javascript">
									jQuery(document).ready(function() {
										jQuery('#tweets').tweet({
											username : 'WebLionMedia',
											modpath : '/layout/plugins/twitter/',
											count : 1,
											loading_text : 'Loading twitter feed...',
											template : '{user} {text}{time}'
										});
									});
									</script>
								</div>
							</div>
							
							<div class="column">
								<div class="block_footer_pics">
									<h3>Instagram</h3>
									
									<ul>
										<li><a href="#"><img src="images/pic_footer_1.jpg" alt=""><span class="hover"></span></a></li>
										<li><a href="#"><img src="images/pic_footer_2.jpg" alt=""><span class="hover"></span></a></li>
										<li><a href="#"><img src="images/pic_footer_3.jpg" alt=""><span class="hover"></span></a></li>
										<li><a href="#"><img src="images/pic_footer_4.jpg" alt=""><span class="hover"></span></a></li>
										<li><a href="#"><img src="images/pic_footer_5.jpg" alt=""><span class="hover"></span></a></li>
										<li><a href="#"><img src="images/pic_footer_6.jpg" alt=""><span class="hover"></span></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</section>
				
				<section class="middle">
					<div class="inner">
						<div class="block_bottom_menu">
							<nav>
								<ul>
									<li><a href="index.html">HOMEPAGE</a></li>
									<li><a href="blog_post.html">POSTS</a></li>
									<li><a href="category_photography.html">CATEGORIES</a></li>
									<li><a href="full_width.html">PAGES</a></li>
									<li><a href="shortcodes.html">FEATURES</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</section>
				
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