<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Login Page</title>
</head>

<header>

<?php

    include "menu1.php";
    ?>
    
  </header>

  <body>
    <div id="dc">
 
    <?php
    include "menu.php";
    ?>
  

    <section>
    <div class="inl">
    <div id="INLOG">
    <form  
    action="homepagina2.php"
     method="post"  
     >
        <h1>Inloggen</h1><br>
        <label for="gebruikersnaam">Gebruikersnaam:</label>
        <input type="text" name="gebruikersnaam" id="gebruikersnaam" required>
        <br>
        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" value="Log in" name="submit">  <br>
        <head>Wachtwoord vergeten?</head><br>
        <h1>Maak een account</h1><br>
        <label for="gebruikersnaam">Email adres:</label>
        <input type="text" name="Email adres" id="Email adres" required>
        <br>

        <label for="gebruikersnaam">Gebruikersnaam:</label>
        <input type="text" name="gebruikersnaam" id="gebruikersnaam" required>
        <br>
        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" value="Account maken" name="submit"><br><br>

        <br>
        </form> <br>
        
    </div>
    </section>

</div>

</body>
</html>

<?php
//  $username = "username";
//  $password = "password";
?>
