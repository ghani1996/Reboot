<?php
require_once ("../session.php");
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
            <li class="active"><a href="list_members.php"><i class="fa fa-users"></i><span>MEMBERSHIP</span></a></li>
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
      <!--body part-->
      <div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-paste"></i> Category</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table id="myTable" class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>No.</th>  
                      <th>Name</th>
                      <th>Email</th>
                      <th>Details</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
					$ctr = 1;
					$sql_query="SELECT * FROM users WHERE level='member'";
					$result_set=mysqli_query($conn,$sql_query);
					while($row=mysqli_fetch_row($result_set))
					{
						?>
							<tr>
                            <td><?php echo $ctr; ?></td>
							<td><?php echo $row[1]; ?></td>
							<td><?php echo $row[2]; ?></td>
							<td><?php echo $row[4]; ?></td>
							</tr>
					<?php
						$ctr++;
					}
					?>
                    </tbody>
                </table><br>
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
    <script type="text/javascript" src="../layout/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../layout/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#myTable').DataTable();</script>
  </body>
</html>