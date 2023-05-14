<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "account";

$conn = new mysqli($servername, $username, $password, $dbname);
// $conn = new mysqli($servername, $username,  "password", $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



?>
<?php
$userid = 1; // Replace this with the logged-in user's ID
$sql = "SELECT gebruikersnaam, password FROM account WHERE userid = $userid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $username = $row["gebruikersnaam"];
        $password = $row["password"];
    }
} else {
    echo "No user found";
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>dit zijn al de producten in je winkelwagen <?php echo $username; ?>.</h1>

<h2>winkelwagen</h2>
    <ul>
        <?php foreach ($shopping_cart as $item): ?>
        <li>Product ID: <?php echo $item["productid"]; ?> 
            - Quantity: <?php echo $item["aantal producten"]; ?> 
            - Price: <?php echo $item["prijs"]; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>