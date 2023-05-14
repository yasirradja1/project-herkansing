<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>
<header>

<?php

    include "menu1.php";
  
    
    ?>
    
  </header>
<body>
<?php 
  include "menu.php";

function GetData($table){
        // Connect database
        $conn = ConnectDb();
    
        // $query = $conn->prepare("SELECT * FROM $table");
        $query = $conn->prepare("SELECT * FROM `producten of diensten` WHERE `Verwijzing naar categorie` = 'Muziek & Games';
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

