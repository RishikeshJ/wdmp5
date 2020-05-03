<html lang="en">
<head>
    <title>Contacto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ibras</title>
    {{-- <link rel="stylesheet" type="text/css" href="../asset/ibras.css"> --}}
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</head>

<body class="container-fluid">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="images/5.png" width="30" height="30" class="d-inline-block align-top" alt="">
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item"> <a class="nav-link" href="#">Nosotros</a> </li>
                <li class="nav-item"> <a class="nav-link" href="#">Menu</a> </li>
                <li class="nav-item"> <a class="nav-link" href="#">Contacto</a> </li>
                <li class="nav-item"> <a class="nav-link" href="#">Blog</a> </li>
                <li class="nav-item"> <a class="nav-link" href="#">Login</a> </li>
                <li class="nav-item"> <a class="nav-link" href="#">Register</a> </li>
                
                <li class="nav-item">
                  <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
              </ul>
            </div>
          </nav>

          @yield('main')
          
          <div class="container">
          </div>
    </div>

</body>
<!-- <script src="../asset/main.js"></script> -->

</html>