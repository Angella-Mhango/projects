<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "uchembele_wabwino";
 
   $conn = new mysqli($servername, $username, $password, $dbname);
 
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 

    // Step 2: Retrieve form data
    $name = $_POST["username"];
    $location = $_POST["location"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Step 3: Insert data into the user table
    $sql = "INSERT INTO patients (username, location, phone, email, password) VALUES ('$username', '$location', '$phone', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location: testing.html");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Step 4: Close the database connection
    $conn->close();

?>