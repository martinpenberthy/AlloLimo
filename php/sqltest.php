<?php

$servername = "localhost";
$username = "id20248617_database";
$password = "x=iJ_O#@q1wYieKP";
$dbname = "id20248617_userdata";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO UserData (username, password)
VALUES ('JohnDoe', 'thisisapassword')";


if ($conn->query($sql) === TRUE) {
  echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();




?> 