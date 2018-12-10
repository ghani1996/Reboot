<?php
session_start();
require_once("db.php");
if(isset($_REQUEST['action']) && $_REQUEST['action']=='join')
{
	$sql = "INSERT INTO meetup_members (meetupid, name) VALUES ('{$_REQUEST['id']}', '{$_SESSION['name']}')";
	mysqli_query($conn,$sql);
	$id = $_REQUEST['id'];
	header("Location: join_meetup.php?id=".$id);
}
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
									<li><a href="index.php">REBOOT</a></li>
									<li><a href="archives.php">ARCHIVES</a></li>
									<li class="current_page_item"><a href="archives.php">MEET-UPS</a></li>
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
				<?php 
					$query1="SELECT program FROM meetup WHERE id=".$_REQUEST['id'];
					$result1=mysqli_query($conn, $query1);
					$row1=mysqli_fetch_row($result1);
				?>
					<h1><?php echo $row1[0]; ?></h1>
					<h2>List of Participants</h2>
				</div>		
				<div class="block_posts type_6">
					<div class="line_1"></div>
					<article class="post_type_6">						
						<div class="content">
						<?php 
							$ctr = 1;
							$query="SELECT * FROM meetup_members WHERE meetupid=".$_REQUEST['id'];
							$result=mysqli_query($conn, $query);
							while($row=mysqli_fetch_row($result))
							{
						?>	
							<div class="text">
								<p><?php echo $ctr . ") " . $row[2]; ?></p>
							</div>
						<?php
							$ctr++;
							}
						?>
						</div>
					</article>
					<?php 
						// check the name is in the list or not
						$query3="SELECT * FROM meetup_members WHERE meetupid='{$_REQUEST['id']}' AND name='{$_SESSION['name']}'";
						$result3=mysqli_query($conn, $query3);
						$rowcount3=mysqli_num_rows($result3);	
						// check already full or not
						$query4="SELECT participant FROM meetup WHERE id='{$_REQUEST['id']}'";
						$result4=mysqli_query($conn, $query4);
						$row4=mysqli_fetch_assoc($result4);
					
						$query5="SELECT * FROM meetup_members WHERE meetupid='{$_REQUEST['id']}'";
						$result5=mysqli_query($conn, $query5);
						$rowcount5=mysqli_num_rows($result5);
						if($rowcount5 == $row4['participant'])
						{
							echo "<a class='general_colored_button navy'>ALREADY FULL</a>";
						}
						elseif($rowcount3 == 0)
						{
							echo "<a href='join_meetup.php?action=join&id={$_REQUEST['id']}' class='general_colored_button navy'>JOIN</a>";
						}
						elseif($rowcount3 != 0)
						{
							echo "<a class='general_colored_button navy'>ALREADY JOINED</a>";
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
</body>

</html>