<html>
<header><?php include "menu1.php";?></header>
<body>
<?php
include "menu.php";

function GetData($table){
    $conn = ConnectDb();

    $query = $conn->prepare("SELECT * FROM `producten of diensten` WHERE `Verwijzing naar categorie` = 'Mooi & Gezond';
    ");
    $query->execute();
    $result = $query->fetchall();

    return $result;
 }
include "producten.php"; 
producten();
?>
</body>
</html> 