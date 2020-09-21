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
                
                echo
                "<div class='col-md-2' id='col2'> ". 
                    "<a href='movie.php?key=$movies->movie_key&&name=$movies->movie_name'>".
                        '<img src="data:image/jpeg;base64,'.base64_encode($movies->movie_pic) .'" class="img-fluid moviepic" />'.
                    "</a> ".
                "</div>" ;
                }
            }
    
        }

        public function getSingleMovie(){
        $key = $_GET['key'];
        $name = $_GET['name'];

        //echo $name . $key;
    
        $query = "SELECT * FROM movies WHERE movie_key=$key";

            $stm = $this->conn->prepare($query);

            if($stm->execute())
            {
                $res = $stm->fetchAll(PDO::FETCH_OBJ);
                //foreach ($res as $movie){
                echo 'test'.$movie->movie_name;
                //}
            }
        }
    }   
?>