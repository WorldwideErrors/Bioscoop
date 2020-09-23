<?php 
    class Datacontroller{
        private $conn;

        public function __construct(){
            $connection = new PDO("mysql:host=localhost;dbname=dbBioscoop;",
            "root","");
    
            $this->conn = $connection;
        }
        
        public function getMovies(){

            $query = "SELECT * FROM movies ORDER BY genre_key ASC";

            $stm = $this->conn->prepare($query);

            if($stm->execute())
            {
                $res = $stm->fetchAll(PDO::FETCH_OBJ);
            foreach ($res as $movies){
                //PC View
                echo
                "<div class='col-md-2 d-none d-xl-block' id='col2'> ". 
                    "<a href='movie.php?key=$movies->movie_key&&name=$movies->movie_name'>".
                        '<img src="data:image/jpeg;base64,'.base64_encode($movies->movie_pic) .'" class="img-fluid moviepic" />'.
                    "</a> ".
                "</div>" ;
                //Ipad View
                echo
                "<div class='col-md-3 d-none d-lg-block d-xl-none' id='col2'> ". 
                    "<a href='movie.php?key=$movies->movie_key&&name=$movies->movie_name'>".
                        '<img src="data:image/jpeg;base64,'.base64_encode($movies->movie_pic) .'" class="img-fluid moviepic" />'.
                    "</a> ".
                "</div>" ;
                //Phone side view
                echo
                "<div class='col-md-4 d-none d-sm-block d-md-block d-lg-none' id='col2'> ". 
                    "<a href='movie.php?key=$movies->movie_key&&name=$movies->movie_name'>".
                        '<img src="data:image/jpeg;base64,'.base64_encode($movies->movie_pic) .'" class="img-fluid moviepic" />'.
                    "</a> ".
                "</div>" ;
                 //Phone normal view
                echo
                "<div class='col-md-12 d-block d-sm-none ' id='col2'> ". 
                    "<a href='movie.php?key=$movies->movie_key&&name=$movies->movie_name'>".
                        '<img src="data:image/jpeg;base64,'.base64_encode($movies->movie_pic) .'" class="img-fluid moviephone" />'.
                    "</a> ".
                "</div>" ;
                }
            }
        }

        public function getSingleMovie($key){
    
        $query = "SELECT * FROM movies INNER JOIN genres ON movies.genre_key=genres.genre_key WHERE movie_key = '$key'";
        
            $stm = $this->conn->prepare($query);

            if($stm->execute())
            {
                $res = $stm->fetchAll(PDO::FETCH_OBJ);
                foreach ($res as $movie){
                echo 
                '<div class="row">'.
                    '<div class="col-md-12 my-auto" id="singlemoviepage">'.
                        '<p id="singletitle">' .$movie->movie_name. '</p>'.
                    '</div>'.
                '</div>'.
                '<div class="row">'.
                    '<div class="col-md-5" id="singletrailer">'.
                        '<div class="embed-responsive embed-responsive-16by9">'.
                            $movie->movie_trailer .
                        '</div>'.
                    '</div>'.
                    '<div class="col-md-5" id="singlestory">'.
                        $movie->movie_desc.  
                    '</p>'. '</div>'.
                    '<div class="col-md-2 info">'. 
                        '<div class="movie_meta">'.
                            '<p class="singlebold">Tijdsduur</p>';
                            if($movie->movie_duration != null){
                            echo '<small>'.$movie->movie_duration.'</small>';
                            }else{
                            echo '<small> Geen tijdsduur bekend</small>';
                            }
                        echo '</div>'.
                        '<div class="movie_meta">'.
                            '<p class="singlebold">Genre</p>'.
                            '<small>'.$movie->genre_name.'</small>'.'<br/>'.
                        '</div>'.
                        '<div class="movie_meta">'.
                            '<p class="singlebold">Releasedatum</p>';
                            if($movie->movie_release != null){
                            echo '<small>'.$movie->movie_release.'</small>';
                            }else{
                            echo '<small> Geen releasedatum bekend</small>';
                            }
                        '</div>'.
                    '</div>'.
                '</div>'; 
                }
            }
        }

        public function getCarouselItems(){
            $res="";

            $query = "SELECT * FROM movies ORDER BY movie_release DESC LIMIT 3";

            $stm = $this->conn->prepare($query);

            if($stm->execute())
            {
                $res = $stm->fetchAll(PDO::FETCH_OBJ);
                $i = 0;
                foreach ($res as $movie){
                    if($i == 0){
                        echo
                        '<div class="carousel-item active">'.
                        '<p class="title my-auto" alt="First slide"><span class="badge badge-dark">NEW</span>' .' '. $movie->movie_name .'</p>'.
                        '</div>';
                        $i++;
                    }else if ($i == 1){
                        echo
                        '<div class="carousel-item">'.
                        '<p class="title my-auto" alt="Second slide"><span class="badge badge-dark">NEW</span>' .' '. $movie->movie_name .'</p>'.
                        '</div>';
                        $i++;
                    }else if ($i == 2){
                        echo
                        '<div class="carousel-item">'.
                        '<p class="title my-auto" alt="Third slide"><span class="badge badge-dark">NEW</span>' .' '. $movie->movie_name .'</p>'.
                        '</div>';
                        $i++;
                    }
            
                }
            }
        }
    }   
?>