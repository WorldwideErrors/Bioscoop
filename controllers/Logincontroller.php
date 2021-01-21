<?php 

    $conn = new PDO("mysql:host=localhost;dbname=dbBioscoop;",
    "root","");

    $result = "";
        
    $Username = $_POST['txtUsername'];
    $Password = $_POST['txtPassword'];

    $query = "SELECT * FROM users where username = '$Username' AND passwd = '$Password'";
    $stm = $conn->prepare($query);

    if($stm->execute()){
        $lijst = $stm->fetchAll(PDO::FETCH_OBJ);
        if(count($lijst) > 0){
            $result = "gelukt";
            //header('Location : http://localhost/BioscoopProject/views/adminhub.php');
            echo "<script type='text/javascript'> document.location = '../views/adminhub.php'</script>";
        }else {
            $result = "mislukt";
            echo "<script type='text/javascript'>alert('Username or password incorrect!')</script>";
            echo "<script type='text/javascript'> document.location = '../views/login.php'</script>";
        }
    }
    return $result;

?>