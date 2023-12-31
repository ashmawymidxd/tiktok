<?php

// Get the JSON data from the request
$data = file_get_contents('php://input');
$data = json_decode($data);

// Check if the data is valid
if($data->email && $data->password) {
    $email = $data->email;
    $password = $data->password;

    // Connect to the MySQL database
    $conn = new mysqli('localhost', 'root', '', 'tiktok');

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape user inputs to prevent SQL injection
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);
    $enc_pass = md5($password);

    // Query to check if the email and password exist in the member table
    $sql = "SELECT * FROM member WHERE email='$email' limit 1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Email and password combination exists in the member table
        $row = mysqli_fetch_array($result);
        if($row[1] == $enc_pass){
            session_start();
            $_SESSION['user_id'] = $row[0];

            echo "Valid password";
        }
        else{
            echo "Invalid Password";
        }
    } 
    else {
        // Email and password combination does not exist
        echo "Invalid Email";
    }

    // Close the connection
    $conn->close();
} else {
    echo "Invalid input data";
}
?>
