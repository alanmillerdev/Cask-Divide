


<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<!--  Show this only on mobile to medium screens  -->
  <a class="navbar-brand d-lg-none" href="#">Navbar</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

<!--  Use flexbox utility classes to change how the child elements are justified  -->
  <div class="collapse navbar-collapse justify-content-between" id="navbarToggle">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Casks</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      
    </ul>
    
    
<!--   Show this only lg screens and up   -->
    <a class="navbar-brand d-none d-lg-block" href="index.php">
        <img
          src="./images/logo-1.png"
          height="65"
          alt="CD Logo"
          loading="lazy"
        />
      </a>
    
    
    
    <ul class="navbar-nav">
      <?php

          if (isset($_SESSION['user_id'])) {
            echo '<a href="logout.php"><button type="button" class="btn btn-outline-primary me-2">Log Out</button></a>';
          }
          
          else {
            echo '<a href="login.php"><button type="button" class="btn btn-primary">Login/Register</button></a>';
          }
          
      ?>
    </ul>
  </div>
</nav>

                  
<!-- Navbar -->











        

