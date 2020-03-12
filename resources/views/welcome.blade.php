
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link type="text/css" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Google+Sans">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="./img/logo3.png">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet"> 
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <title>Zipcar</title>
  <script src="https://kit.fontawesome.com/dc873948d5.js" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar fixed navbar-expand-lg navbar-light" style="background-color:rgb(7, 148, 199);">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
      <ul class="navbar-nav ml-4">
        <li class="nav-item active">
          <a class="nav-link text-light" href="#">How it works<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Help</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            More
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Why car sharing?</a>
            <a class="dropdown-item" href="#">Zipcar for Universities</a>
            <a class="dropdown-item" href="#">Zipcar for Bussiness</a>
            <a class="dropdown-item" href="#">Blog</a>
            <a class="dropdown-item" href="#">Uber program</a>
          </div>
      </ul>
      <ul class="navbar-nav logo ml-auto">
        <li class="nav-item">
          <a class="nav-link text-light" href="#" im>
            <img src="./img/logo.svg">
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Language
        </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light border border-white border-top-0 border-bottom-0 border-right-1 border-left-0"
            href="{{ route('login') }}">Sign in</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-light border border-white rounded-pill text-center ml-3 join-button"
            style="width: 80px;" href="{{ route('register') }}">Join</a>
        </li>
      </ul>

    </div>
  </nav>
  

  <div class="d-flex flex-column bd-highlight mt-5 ml-5" style="position: absolute;">
    <div class="p-2 bd-highlight text-white mt-5 pt-5" style="font-size: 30px; font-weight: 700;">Access to cars near you, 24/7</div>
    <div class="p-2 bd-highlight text-white">The freedom of cars on demand in hundreds of cities, <br>ready to book by the hour or day.</div>
    <a class="nav-link text-light bg-warning rounded-pill text-center mt-4 join-button shadowed " style="width: 60%; font-weight: 700;" href="#"><i class="far fa-play-circle"></i>    Watch how it works</a>
  </div>
  <img src="./img/back3.png" class="selectDisable" style="max-height: 100%; max-width: 100%; z-index: -1;">

  <h1 class="mt-5 ml-5 pb-3 mb-5 text-left">Services</h1>
  <div class="container marketing mt-5">

    <div class="row">
      <div class="col-lg-4">
        <img src="img/icons8-car-100.png" alt="Generic placeholder image" width="140" height="140">
        <h2>Catalog</h2>
        <p>We offer you an extense car catalog, so you can choose the one that suits your necessities the most.</p>
        <p><a class="btn bg-warning shadowed mt-4" href="#" role="button">View details &raquo;</a></p>
      </div>
      <div class="col-lg-4">
        <img src="img/icons8-gps-100.png" alt="Generic placeholder image" width="140" height="140">
        <h2>GPS Tracking</h2>
        <p>Here in Zipcar we think about your safety, and all our cars are equipped with a GPS Tracking and an Anti-theft system.</p>
        <p><a class="btn bg-warning shadowed mt-4" href="#" role="button">View details &raquo;</a></p>
      </div>
      <div class="col-lg-4">
        <img src="img/icons8-uber-500.png" alt="Generic placeholder image" width="140" height="140">
        <h2>Uber</h2>
        <p>Thanks to our partnership with Uber you can also contract a driver to drive your car, with discounts up to 70%.</p>
        <p><a class="btn bg-warning shadowed mt-4" href="#" role="button">View details &raquo;</a></p>
      </div>
    </div>
  </div>






  <h1 class="text-right bd-highlight mr-5 mt-5 pt-5" style="font-size: 40px; font-weight: bold;">
    Meet some of our cars
  </h1>
  <h2 class="text-right mr-5" style="font-size: 20px;">Zipcars come in all shapes and sizes—compact sedans, luxury SUVs</h2>
  <div class="container">
  
  <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators mb-0 pb-0">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner no-padding my-5">
    <div class="carousel-item active">
      <div class="col-xs-4 col-sm-4 col-md-4">
        <a href="#" onclick=abc(this) class="slider_info">
          <img class="img-fluid card-img-top" src="./img/car3.png">
        </a>
      <p class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">car</p>

      </div>
      <div class="col-xs-4 col-sm-4 col-md-4">
        <a href="#" onclick=abc(this) class="slider_info">
          <img class="img-fluid card-img-top rounded-bottom" src="./img/car2.png">
        </a>
        <p class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">car</p>

      </div>
      <div class="col-xs-4 col-sm-4 col-md-4">
        <a href="#" onclick=abc(this) class="slider_info">
          <img class="img-fluid card-img-top rounded-bottom" src="./img/car1.png">
        </a>
        <p class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">car</p>
  
      </div>
    </div>
    <div class="carousel-item">
      <div class="col-xs-4 col-sm-4 col-md-4">
        <a href="#" onclick=abc(this) class="slider_info">
          <img class="img-fluid card-img-top" src="./img/car4.png">
        </a>
        <p class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">car 4</p>
      </div>
      <div class="col-xs-4 col-sm-4 col-md-4">
        <a href="#" onclick=abc(this) class="slider_info">
          <img class="img-fluid card-img-top" src="./img/car3.png">
        </a>
        <p class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">car</p>
      </div>
      <div class="col-xs-4 col-sm-4 col-md-4">
        <a href="#" onclick=abc(this) class="slider_info">
          <img class="img-fluid card-img-top" src="./img/car2.png">
        </a>
        <p class="text-center" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">car</p>
      </div>
      
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <i class="fas fa-arrow-circle-left"></i>
                </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <i class="fas fa-arrow-circle-right"></i>
                </a>
</div>
<a class="shadowed nav-link bg-warning rounded-pill text-center mt-4 mb-5 join-button shadowed" style="width: 20%; margin: 0 auto; color:black;" href="#">Join now</a>
</div>
<footer class="page-footer font-small green pt-4">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row ml-5 mb-5 mt-5">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase">Other products</h5>
        <p>Some of the other products and services for Zipcar</p>
        <ul>
          <li><a class="text-info" href="#!">Uber service</a></li>
          <li><a class="text-info" href="#!">Bus driving service</a></li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Countries</h5>

        <ul class="list-unstyled">
          <li>
            <a class="text-info" href="#!">Colombia</a>
          </li>
          <li>
            <a class="text-info" href="#!">Argentina</a>
          </li>
          <li>
            <a class="text-info" href="#!">Brasil</a>
          </li>
          <li>
            <a class="text-info"  href="#!">Chile</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Contact us</h5>

        <ul class="list-unstyled">
          <li>
            <a class="text-info"href="#!">About</a>
          </li>
          <li>
            <a class="text-info" href="#!">Press</a>
          </li>
          <li>
            <a class="text-info"  href="#!">Careers</a>
          </li>
          <li>
            <a class="text-info" href="#!">Jobs</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-white text-center py-3" style="background: rgb(7, 148, 199);">© 2020 Copyright:
    <a class="text-white" href="https://gmmonsalve.github.io/Zipcar-lp/">Zipcar.com</a>
  </div>
  <!-- Copyright -->

</footer>
</body> 
</html>
