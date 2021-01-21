<?php 
    class Admincontroller{
        private $conn;

        public function __construct(){
            $connection = new PDO("mysql:host=localhost;dbname=dbBioscoop;",
            "root","");
    
            $this->conn = $connection;
        }

        //Deze functie geeft alle films 
        public function getControlForMovies(){

            $query = "SELECT * FROM movies ORDER BY genre_key ASC";

            $stm = $this->conn->prepare($query);

            if($stm->execute())
            {
                $res = $stm->fetchAll(PDO::FETCH_OBJ);
            foreach ($res as $movies){
                //PC View
                echo
                "<div class='col-md-2 d-none d-xl-block' id='col2'> ". 
                    "<a href='../views/admincontrol.php?key=$movies->movie_key&&name=$movies->movie_name'>".
                        '<img src="data:image/jpeg;base64,'.base64_encode($movies->movie_pic) .'" class="img-fluid moviepic" />'.
                    "</a> ".
                "</div>" ;
                //Ipad View
                echo
                "<div class='col-md-3 d-none d-lg-block d-xl-none' id='col2'> ". 
                    "<a href='../views/admincontrol.php?key=$movies->movie_key&&name=$movies->movie_name'>".
                        '<img src="data:image/jpeg;base64,'.base64_encode($movies->movie_pic) .'" class="img-fluid moviepic" />'.
                    "</a> ".
                "</div>" ;
                //Phone side view
                echo
                "<div class='col-md-4 d-none d-sm-block d-md-block d-lg-none' id='col2'> ". 
                    "<a href='../views/admincontrol.php?key=$movies->movie_key&&name=$movies->movie_name'>".
                        '<img src="data:image/jpeg;base64,'.base64_encode($movies->movie_pic) .'" class="img-fluid moviepic" />'.
                    "</a> ".
                    "<button type='button' name='btndelete' class='btn btn-danger btndel'>Delete Movie</button>".
                "</div>" ;
                 //Phone normal view
                echo
                "<div class='col-md-12 d-block d-sm-none ' id='col2'> ". 
                    "<a href='../views/admincontrol.php?key=$movies->movie_key&&name=$movies->movie_name'>".
                        '<img src="data:image/jpeg;base64,'.base64_encode($movies->movie_pic) .'" class="img-fluid moviephone" />'.
                    "</a> ".
                "</div>" ;
                }
            }
        }

        public function getAdminControl($key){
    
            $query = "SELECT movie_name,movie_trailer,movie_release,movie_desc,movie_duration,genre_name, DATE_FORMAT(movie_release,'%d/%m/%Y') AS datum FROM movies INNER JOIN genres ON movies.genre_key=genres.genre_key WHERE movie_key = '$key'";
            
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
                                    $duration = substr($movie->movie_duration,0,5);
                                echo '<small>'.$duration.'</small>';
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
                                if($movie->datum != null){
                                echo '<small>'.$movie->datum.'</small>';
                                }else{
                                echo '<small> Geen releasedatum bekend</small>';
                                }
                            echo '</div>'.
                            '<form method="POST">'.
                            '<input type="submit" name="btndelete" class="btn btn-danger btndel" Value="Delete Movie"/>'.
                            '</form>'.
                            '</div>'.
                    '</div>'; 
                    }
                }
        }
        

        //functie films verwijderen
        public function deleteMovies($moviekey){
            $query = "DELETE FROM movies WHERE movie_key = '$moviekey'";
        
            $stm = $this->conn->prepare($query);
            
            if($stm->execute() == true){
                return true;
            }else{
                return false;
            }
        }
    }
    
?>