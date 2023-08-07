<?php
// SQLite database file path
$dbFile = 'database.db'; // Change 'your_database_name' to your desired SQLite database name

try {
    // Connect to SQLite database
    $pdo = new PDO("sqlite:$dbFile");

    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Escape user inputs for security
    $First_Name = $_REQUEST['First_Name'];
    $Last_name = $_REQUEST['Last_name'];
    $Email = $_REQUEST['Email'];
    $Gender = $_REQUEST['Gen'];
    $Phone_Number = $_REQUEST['Phone_Number'];
    $Password = $_REQUEST['Password'];
    $Confirm_Password = $_REQUEST['Confirm_Password'];

    // Prepare insert query
    $sql = "INSERT INTO test (First_Name, Last_name, Email, Gender, Phone_Number, Password, Confirm_Password) VALUES (:First_Name, :Last_name, :Email, :Gender, :Phone_Number, :Password, :Confirm_Password)";

    // Prepare the statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters to the statement
    $stmt->bindParam(':First_Name', $First_Name);
    $stmt->bindParam(':Last_name', $Last_name);
    $stmt->bindParam(':Email', $Email);
    $stmt->bindParam(':Gender', $Gender);
    $stmt->bindParam(':Phone_Number', $Phone_Number);
    $stmt->bindParam(':Password', $Password);
    $stmt->bindParam(':Confirm_Password', $Confirm_Password);

    // Execute the query
    if ($stmt->execute()) {
        //echo "Message has been sent.";
        readfile("welcom.html");
    } else {
        //echo "ERROR: Could not able to execute $sql.";
        readfile("Error.html");
    }
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}
