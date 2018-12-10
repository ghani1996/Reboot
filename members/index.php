<?php
require_once ("../session.php");

$error = "";
$msg = "";
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
                  <li><a href="edit_profile.php"><i class="fa fa-pencil-square-o "></i> Edit Profile</a></li>
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
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
          </div>
        </div>
        <div class="row mt-20">
          <div class="col-md-12">
            <div class="card">
              <h3 class="card-title">My Article</h3>              
              <?php
              $query5="SELECT * FROM blog where email='{$_SESSION['email']}' AND status='Approved'";
              $result5=mysqli_query($conn, $query5);
              while($row5=mysqli_fetch_row($result5))
              { 
              ?>
              <div class="card-body">
                  <div class="bs-component">
                      <div class="panel panel-primary">
                        <div class="panel-heading">
                          <h3 class="panel-title"><?php echo $row5[1]; ?> - <?php echo $row5[5]; ?> / <?php echo $row5[6]; ?> ( <?php echo $row5[4]; ?> )</h3>
                        </div>
                        <div class="panel-body"><?php echo $row5[2]; ?>
                        </div>
                      </div>
                  </div>
                </div>
              <?php
              }
              ?>
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
  </body>
</html>