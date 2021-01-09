<?php

$conn = new mysqli('localhost','malik', '12345', 'outboost');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";

$sql ="INSERT INTO billboard (billboard_campaign, billboard_driver, start_date, end_date, billboard_location) VALUES ('".$_POST['billboard_campaign']."','".$_POST['billboard_driver']."', '".$_POST['start_date']."', '".$_POST['end_date']."', '".$_POST['billboard_location']."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();

header("refresh:2; url=myassignment.html");
?>