<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('../../g_processing/dbconnect.php')?>
  <link rel="shortcut icon" type="image/png" href="../img/faviconic.png">
  <!-- from home.php-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="../../mdb-framework/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../../mdb-framework/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="../../mdb-framework/css/style.min.css" rel="stylesheet">
  <link href="nav_style.css" rel="stylesheet">
  <link href="nav_style1.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>

  <nav id="nav-topbar" class="navbar toggleable-sm navbar-inverse fixed-top nav-pills navbar-expand-lg navbar-dark elegant-color-dark border-bottom">
		<div class="brand-container">
      <!-- Brand // Logo-->
      <a class="navbar-brand" href="home.php">
         <img src="../img/logo_icinema.png" height="50" alt="iCinema logo">
       </a>
     </div>
      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Links
      <div class="collapse navbar-collapse" id="navbarSupportedContent">-->

    	<div id="topbar-items" class="navbar-collapse">
      	<ul class="navbar-nav mr-auto">
              <li class=" nav-item <?php if($page=='home'){echo 'active';}?>">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
      				</li>
              <li>
                <a class="nav-item" href="../adult/home.php">Adult view</a>
              </li>
              <li>
                <a class="nav-item" href="../junior/home.php">Junior view</a></li>
              <li class="nav-item"><a class="nav-item" href="logout.php"><i class="fa fa-cog"></i>Logout</a></li>

      					<li class="nav-item btn-group">
      						<a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  Dropdown</a>
      						<div class="dropdown-menu" aria-labelledby="dropdownMenu1">
      							<a class="dropdown-item">Action</a>
      							<a class="dropdown-item">Another action</a>
      							<a class="dropdown-item">Something else here</a>
      						</div>
      					</li>
      				</ul>
      			</div>
      		</div>
      	</nav>


<div>
<!-- right side-->
<ul class="navbar-nav mr-auto">
  <li class="nav-item <?php if($page=='account'){echo 'active';}?>">
    <!-- greetin-->
      <a class="nav-item">
        <?php $t = date("H");
          if ($t < "10") {
          echo "Good morning ";
          } elseif ($t < "20") {
          echo "Good day ";
          } else {
          echo "Good evening ";
          }
          echo "admin"; ?>!<i class="material-icons right"></a>
    <!-- Greeting end-->
  </li>
    <li><a class="nav-item" href="../adult/home.php">Adult view</a></li>
    <li><a class="nav-item" href="../junior/home.php">Junior view</a></li>
    <li class="nav-item"><a class="nav-item" href="logout.php">Logout</a></li>
        </ul>
      </div>
      </div>
	</nav>
<div id="topbar-items" class="collapse navbar-collapse"></div>


<!-- SIDENAV-->
<div class="container-fluid">
<div class="row">
<nav id="nav-sidebar" class="bg-faded navbar-dark elegant-color-dark">
  <div class="sidebar-header hidden-sm-down">
    <hr/>
  </div>

  <div class="sidebar-content hidden-sm-down">
    <ul class="navbar-nav mr-auto nav-pills flex-column collapsible collapsible-accordion">
    <!-- homepage view dropdown-->
      <li class="<?php if($page=='home'){echo 'active';}?>">
        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
        <ul class="collapse list-unstyled" id="homeSubmenu">
          <li>
            <a href="../web/adult/home.php">Adult View</a>
          </li>
          <li>
            <a href="../web/junior/home.php">Junior View</a>
          </li>
        </ul>
      </li>

                  <!-- member editing dropdown-->
             			<li class="<?php if($page=='members'){echo 'active';}?>">
             				<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                      Members</a>
             				<ul class="collapse list-unstyled" id="pageSubmenu">
             					<li class="<?php if($page=='add_member'){echo 'active';}?>">
             						<a href="../web/admin/add_member.php">Add new member</a>
             					</li>
             					<li class="<?php if($page=='edit-members'){echo 'active';}?>">
             						<a href="../web/admin/edit-members.php">Edit existing member</a>
             					</li>
             				</ul>
             			</li>

                  <!-- film information editing dropdown-->
                  <li class="<?php if($page=='films'){echo 'active';}?>">
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Films</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu1">
                      <li class="<?php if($page=='add_films'){echo 'active';}?>">
                        <a href="../web/admin/add_films.php">Add new film</a>
                      </li>
                      <li class="<?php if($page=='edit-films'){echo 'active';}?>">
                        <a href="../web/admin/edit-films.php">Edit existing film</a>
                      </li>
                    </ul>
                  </li>

                  <!-- quiz editing dropdown-->
                  <li class="dropdown-toggle <?php if($page=='quiz'){echo 'active';}?>">
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Quiz</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                      <li class="<?php if($page=='edit-quiz'){echo 'active';}?>">
                        <a href="../web/admin/edit-quiz.php">Edit current quiz</a>
                      </li>
                      <li class="<?php if($page=='add_quiz'){echo 'active';}?>">
                        <a href="../web/admin/add_quiz.php">Add to quiz</a>
                      </li>
                    </ul>
                  </li>
             		</ul>
              </div>

<div class="sidebar-content hidden-sm-down">
    <ul class="navbar-nav mr-auto nav-pills flex-column collapsible collapsible-accordion">
      <li class="nav-item <?php if($page=='home'){echo 'active';}?>">
        <a class="nav-link" href="home.php"><i class="fa fa-home"></i> Home </a>
      </li>
      <li class="nav-item <?php if($page=='edit-members'){echo 'active';}?>">
        <a class="nav-link" href="edit-members.php"><i class="fa fa-user"></i> Edit Members </a>
      </li>
      <li class="nav-item <?php if($page=='add_member'){echo 'active';}?>">
        <a class="nav-link" href="add_member.php"><i class="fa fa-graduation-cap"></i> Add Member </a>
      </li>
      <li class="nav-item <?php if($page=='edit-films'){echo 'active';}?>">
        <a class="nav-link" href="edit-films.php"><i class="fa fa-film"></i> Edit Films </a>
      </li>
      <li class="nav-item <?php if($page=='add_films'){echo 'active';}?>">
        <a class="nav-link" href="add_films.php"><i class="fa fa-film"></i> Add a Film </a>
      </li>
      <li class="nav-item <?php if($page=='edit-quiz'){echo 'active';}?>">
        <a class="nav-link" href="edit-quiz.php"><i class="fa fa-graduation-cap"></i> Edit Quiz </a>
      </li>
      <li class="nav-item <?php if($page=='add_quiz'){echo 'active';}?>">
        <a class="nav-link" href="add_quiz.php"><i class="fa fa-graduation-cap"></i> Add Quiz Question </a>
      </li>
    </ul>
    <div class="sidenav-bg"></div>
    </div>
</nav>
</div>
</div>
</body>
