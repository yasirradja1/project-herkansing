<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["gebruikersnaam"];
    $password = $_POST["password"];

    if (isset($_POST["submit"])) {

    // Establish database connection
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "project3";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the username already exists in the database
    $stmt = $conn->prepare("SELECT gebruikersnaam FROM account WHERE gebruikersnaam = ?");
    if (!$stmt) {
        die("Error preparing query: " . $conn->error);
    }
    $stmt->bind_param("s", $username);
    if (!$stmt->execute()) {
        die("Error executing query: " . $stmt->error);
    }
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        die("Username already exists");
    }

    // Prepare and execute SQL query to insert a new record
    $stmt = $conn->prepare("INSERT INTO account (gebruikersnaam, password) VALUES (?, ?)");
    if (!$stmt) {
        die("Error preparing query: " . $conn->error);
    }
    $stmt->bind_param("ss", $username, $password);
    if (!$stmt->execute()) {
        die("Error executing query: " . $stmt->error);
    }

    // Get the last inserted user ID
    $last_user_id = $conn->insert_id;

    // Display success message
    // echo "Data inserted successfully. User ID: " . $last_user_id;

    // Close database connection
    $stmt->close();
    $conn->close();

    echo 
    nl2br("hallo\n" .
        //  "<br>\n".   
      htmlspecialchars($username));
    }
}
?>