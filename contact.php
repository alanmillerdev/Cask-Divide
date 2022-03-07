<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/c983ed605c.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
  <title>Scotch Whiskey Casks</title>
</head>

<body data-spy="scroll" data-target="#main-nav" id="home" class="bg-dark">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top p-0" id="main-nav">
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarCollapse">
        
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index.html" class="nav-link p-4 nav_button text-light border-right border-bottom">MENU</a>
          </li>
          <li class="nav-item">
            <a href="casks.html" class="nav-link p-4 nav_button text-light">CASKS</a>
          </li>
          <li class="nav-item">
            <a href="about.html" class="nav-link p-4 nav_button text-light">ABOUT</a>
          </li>
          <li class="nav-item">
            <a href="contact.html" class="nav-link p-4 nav_button text-light">CONTACT</a>
          </li>
        </ul>
        
        <a href="index.html"><img class="logo_img" src="img/Logo PNG.png" alt="Scotch Whiskey Casks Logo"></a>
        
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="login.html" class="nav-link p-4 nav_button text-light border-left">LOGIN</a>
          </li> 
        </ul>

      </div>
  </nav>

  <!-- CONTACT SECTION -->
  <section id="form-styling">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="rounded-3 text-light bg-dark p-5">
                  <div class="text-center">
                    <h3 class="mt-1 mb-5">Contact</h3>
                  </div>
  
                  <form class="d-flex flex-column">
                    <div class="form-outline mb-4">
                      <input type="email" id="" class="input-style" placeholder="Name"/>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="" id="" class="input-style" placeholder="Email"/>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="" id="" class="input-style" placeholder="Phone Number"/>
                    </div>

                    <div class="form-outline mb-4">
                      <textarea name="" id="" class="input-style" cols="25" rows="2" placeholder="Message"></textarea>
                    </div>

                    <div class="text-center pt-1 mb-5 pb-1">
                      <button class="form-styling-button" type="button"><span>Send</span></button>
                    </div>
                  </form>
            </div>
        </div>
      </div>
  </section>



  <!-- FOOTER -->
  <footer>
    <div class="d-flex justify-content-around align-items-center">
      <div class="">
        <a href="index.html"><img class="footer_logo d-none d-md-block" src="img/Logo PNG.png" alt="Scotch Whiskey Casks Logo"></a>
      </div>
      <div class="">
        <ul class="d-flex">
          <li class="nav-item border-right px-3"><a href="#" class="nav-link px-2 text-light"><h5>Contact</h5></a></li>
          <li class="nav-item border-right px-3"><a href="#" class="nav-link px-2 text-light"><h5>FAQ</h5></a></li>
          <li class="nav-item border-right px-3"><a href="#" class="nav-link px-2 text-light"><h5>About</h5></a></li>
          <li class="nav-item px-3"><a href="#" class="nav-link px-2 text-light"><h5>Services</h5></a></li>
        </ul>
        </div>
        <div class="">
        <ul class="d-flex">
          <li class="px-3"><a href="#"><i class="fab fa-instagram fa-3x"></i></a></li>
          <li class="px-3"><a href="#"><i class="fab fa-facebook-square fa-3x"></i></a></li>
          <li class="px-3"><a href="#"><i class="fab fa-google fa-3x"></i></a></li>
        </ul>
      </div>
    </div>
  </footer>
</body>
</html>