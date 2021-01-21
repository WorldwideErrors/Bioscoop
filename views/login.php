<!doctype html>
<html lang="en">
    <?php session_start(); ?>
  <head>
    <title>Bioscoop Cinesse</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Styling.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">
  </head>
  <body>
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <img src="../pic/Brand-icon.png" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" id="brandicon">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Genres
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            
                    <?php 
                        require('../controllers/Datacontroller.php');
                        $dc = new Datacontroller();
                        $dc->getDropdown();
                    ?>

                </div>
            </li>
            </ul>
            <!-- search from in nav bar -->
            <form class="form-inline my-2 my-lg-0" action="search.php">
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search movie.." aria-label="Search">
            <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
            </form>
            </div>
    </nav>
      <div class="container-fluid">

        <div class="row d-flex justify-content-center" id="login">
                <!-- Login Systeem -->
                <section class="login-block">
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-4 login-sec">
                                <h2 class="text-center">Login Now</h2>
                                <form class="login-form" method="post" action="../controllers/Logincontroller.php">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-uppercase">Username</label>
                                        <input type="text" required class="form-control" placeholder="Enter your username..." name="txtUsername">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="text-uppercase">Password</label>
                                        <input type="password" required class="form-control" placeholder="Enter your password..." name="txtPassword">
                                    </div>
                                    <div class="form-check">
                                        <button type="submit" name="submit" value="login" class="btn btn-login float-right">Log in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </body>
</html>
