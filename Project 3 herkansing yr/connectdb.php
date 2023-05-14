<?php


function ConnectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    // $dbname = "project3";
    $dbname = "bieren";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully"; 
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    echo "<br>";  
}
return $conn;

// function project3($conn){

//     $query = $conn->prepare("SELECT * FROM project3");
//     $query->execute();
//     $result = $query->fetchALL(PDO::FETCH_ASSOC);
//     echo "<br>";
//     var_dump($result);

// }


?>