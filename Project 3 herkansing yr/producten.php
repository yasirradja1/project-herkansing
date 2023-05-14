<?php
// auteur: Wigmans
// functie: algemene functies tbv hergebruik
function ConnectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project3";
   
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        echo "Connected successfully";
        return $conn;
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function Getprod($productid){
    $conn = ConnectDb();

    $query = $conn->prepare("SELECT * FROM producten WHERE productid = :productid");
    $query->bindParam(':productid', $productid);
    $conn = ConnectDb();

    $query = $conn->prepare("SELECT * FROM producten WHERE productid = :productid");
    $query->bindParam(':productid', $productid);
    $query->execute();
    $result = $query->fetch();

    return $result;
 }
 function PrintTableTest($result){
    // Zet de hele table in een variable en print hem 1 keer 
    $table = "<table border = 1px>";
    // print elke rij
    foreach ($result as $row) {
        echo "<br> rij:";

        
        foreach ($row as  $value) {
            echo "kolom" . "$value";
        }
    }
}

        
                
        

// Function 'PrintTable' print een HTML-table met data uit $result.
function PrintTable($result){
    // Zet de hele table in een variable en print hem 1 keer 
    $table = "<table border='1'>";

    // Print header table

    // haal de kolommen uit de eerste [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor=gray>" . $header . "</th>";   
    }

    // print elke rij
    foreach ($result as $row) {
        
        $table .= "<tr>";
        // print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}


function producten(){

    // Haal alle bier record uit de tabel 
    $result = GetData("producten");
    
    //print table
    Printproducten($result);
    
 }
function Printproducten($result){
    // Zet de hele table in een variable en print hem 1 keer 
    $table = "<table border = 1px>";

    // Print header table

    // haal de kolommen uit de eerste [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor=gray>" . $header . "</th>";   
    }
    $table .= "</tr>";
    // print elke rij
    foreach ($result as $row) {
        
        $table .= "<tr>";
        // print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        // $table .= "</tr>";


        // Wijzig knopje
if(isset($row['productid'])){
    $table .= "<td>". 
    "<form method='post' action='favoriet.php?productid={$row['productid']}' >       
        <button name='fav'>favoriet</button>	 
    </form>" . "</td>";

    // Delete via linkje href
    $table .= "<td>". 
    "<form method='post' action='winkelwagentje.php?productid={$row['productid']}' >       
        <button name='cart'>naar winkelwagen</button>	 
    </form>" . "</td>";
} else {
    // handle the case where the productid key is not defined
    // for example, you can log an error message or display a warning to the user
    // $table .= "<td> N/A </td>";
}

        

     

        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}
?>