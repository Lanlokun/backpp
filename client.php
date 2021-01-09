<?php

$conn = new mysqli('localhost','malik', '12345', 'outboost');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  //echo "Connected successfully";

$sql ="INSERT INTO Client (Client_name, company, campaign, taxi_no, duration, Payment) VALUES ('".$_POST['Client_name']."','".$_POST['company']."', '".$_POST['campaign']."', '".$_POST['taxi_no']."', '".$_POST['duration']."', '".$_POST['Payment']."')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
  } else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="XcUA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Sheet </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>

    <div class="container">

        <form action="client.php" method="post" enctype="multipart/form-data">
        
            <div class="page-header">
                <h1>Client Sheet </h1>
            </div>
               <div id="name">
                <label for="Client_name">Client_name</label>
                <input class="Client_name" type ="text"
                   name = "Client_name" placeholder = "Client_name" 
                   required autofocus></br></br>
               </div>
               <label for="company">company</label>
                <input id="company" type ="text"
                   name = "company" placeholder = "company" required></br></br>
                   <label for="Campaign">Campaign</label>
                   <input id="campaign" type ="text"
                   name = "campaign" placeholder = "Campaign" required></br></br>
                   <label for="taxi_no">taxi no</label>
                    <input id="taxi_no" type ="text"
                   name = "taxi_no" placeholder = "taxi_no" 
                   required autofocus></br></br>
                   <label for="duration">duration</label>
                   <input id="duration" type ="text"
                   name = "duration" placeholder = "duration" 
                   required autofocus></br></br>
                   <label for="Payment">Payment</label>
                    <input id="Payment" type ="text"
                   name = "Payment" placeholder = "Payment" 
                   required autofocus></br></br>
                   
                <button id="log" type ="submit" name="submit">Save</button></br></br>
                <button id="log" type ="submit" name="submit">Delete</button></br></br>
                <button id="log" type ="submit" name="submit">new</button></br></br>
            
             </form>
        </div>
    
    
</body>
</html>