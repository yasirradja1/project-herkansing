<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "project3";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// $conn = new mysqli($servername, $username,  "password", $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["gebruikersnaam"];
    $password = $_POST["password"];

// $userid = "?";
 // Replace this with the logged-in user's ID
$sql = "SELECT gebruikersnaam FROM account WHERE gebruikersnaam = ?";
$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $username);

// Execute the prepared statement
$stmt->execute();

// Get the result of the query
$result = $stmt->get_result();

// Fetch the data from the result
$row = $result->fetch_assoc();
// if ($row) {
//     $gebruikersnaam = $row["gebruikersnaam"];
//     // Do something with the fetched data
//     echo "Username: " . $gebruikersnaam;
// }
// if ($result->num_rows > 0) {
//     while($row = $result->fetch_assoc()) {
//         $username = $row["gebruikersnaam"];
       
//     }
// } else {
//     echo "No user found";
// }
}

?>

<?php
$favorites = [];
$shopping_cart = [];

$sql_favorites = "SELECT productid, date FROM favoriet";
$result_favorites = $conn->query($sql_favorites);

if ($result_favorites->num_rows > 0) {
    while($row = $result_favorites->fetch_assoc()) {
        $favorites[] = $row;
    }
}

$sql_cart = "SELECT productid, `aantal producten`, prijs FROM winkelwagen";
$result_cart = $conn->query($sql_cart);

if ($result_cart->num_rows > 0) {
    while($row = $result_cart->fetch_assoc()) {
        $shopping_cart[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile Page</title>
</head>
<body>
<h1>Welkom <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["gebruikersnaam"])) {
            $username = $_POST["gebruikersnaam"]; 
            echo $username; 
        } ?>
        bij jouw persoonlijke account pagina.</h1>

    <h2>Favorites</h2>
    <ul>
        <?php foreach ($favorites as $favorite): ?>
            <li>Product ID: <?php echo $favorite["productid"]; ?> - Date: <?php echo $favorite["date"]; ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Shopping Cart</h2>
    <ul>
        <?php foreach ($shopping_cart as $item): ?>
            <li>Product ID: <?php echo $item["productid"]; ?> - Quantity: <?php echo $item["aantal producten"]; ?> - Price: <?php echo $item["prijs"]; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

<?php
$conn->close();
?>
