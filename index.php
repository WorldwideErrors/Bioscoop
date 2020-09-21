<!doctype html>
<html lang="en">
  <head>
    <title>Bioscoop Cinesse</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/HomepageStyling.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php
        include "navbar.php";
    ?>
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" id="col1">                            
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <p class="title" alt="First slide"><span class="badge badge-dark">NEW</span> HARRY POTTER EN DE STEEN DER WIJZEN</h1>
                        </div>
                        <div class="carousel-item">
                        <p class="title" alt="Second slide"><span class="badge badge-dark">NEW</span> THE HOBBIT: BATTLE OF THE FIVE ARMIES</h1>
                        </div>
                        <div class="carousel-item">
                        <p class="title" alt="Third slide"><span class="badge badge-dark">NEW</span> HARRY POTTER EN DE GEHEIME KAMER</h1>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center" id="allMovies">
                <?php
                    require('controllers/Datacontroller.php');
                    $dc = new Datacontroller();
                    $dc->getMovies();
                ?>
            </div>
            
        </div>
        <div class="row ">
        <!--    <div class="col-md-6" id="col4">
                <p>col6</p>
            </div> -->
        </div> 
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
