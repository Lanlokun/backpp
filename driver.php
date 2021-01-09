<?php

$conn = new mysqli('localhost','malik', '12345', 'outboost');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
 // echo "Connected successfully";

$sql ="INSERT INTO driver (driver_name, status, total_audience_exposure, direct_reach,  
estimated_trips, estimated_miles, start_date, end_date, Billboard_id, telephones, garage)
 VALUES ('".$_POST['driver_name']."','".$_POST['status']."','".$_POST['total_audience_exposure']."','".$_POST['direct_reach']."',
 '".$_POST['estimated_trips']."','".$_POST['estimated_miles']."',
 '".$_POST['start_date']."','".$_POST['end_date']."', 
 '".$_POST['Billboard_id']."', '".$_POST['telephones']."', '".$_POST['garage']."')";

if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  
  $conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="XcUA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Sheet  </title>
    <link rel="stylesheet" href="driver.css" type="text/css">

</head>

<body>

    <div class="container">

        <form action="driver.php" method="post" enctype="multipart/form-data">
        
            <div class="page-header">
            <img src="./images/logo.jpeg" width = '480' alt = 'taxi'>
                <h1> Driver Sheet </h1>
            </div>
               <div id="name">
                <label for="Driver">Driver_name</label>
                <input class="Driver" type ="text"
                   name = "driver_name" placeholder = "Driver_name" 
                   required autofocus></br></br>
               </div>
               <label for="Status">Status</label>
                <input id="Status" type ="text"
                   name = "status" placeholder = "Status" required></br></br>
                 
                   <label for="total_audience_exposure">Total audience exposure</label>
                    <input id="exposure" type ="text"
                   name = "total_audience_exposure" placeholder = "total audience exposure" 
                   required autofocus></br></br>

                   <label for="direct_reach">Direct reach</label>
                   <input id="direct_reach" type ="text"
                   name = "direct_reach" placeholder = "direct_reach" 
                   required autofocus></br></br>
                   
                   <label for="trips">Estimated Trips</label>
                    <input id="trips" type ="text     "
                   name = "estimated_trips" placeholder = "estimated_trips" 
                   required autofocus></br></br>
    
                   <label for="estimated_miles">Estimated miles</label>
                   <input id="miles" type ="text"
                   name = "estimated_miles" placeholder = "estimated_miles" 
                   required autofocus></br></br>

                     <label for="date">Start Date</label>
                     <input id="start_date" type ="date"
                   name = "start_date" placeholder = "date" 
                   required autofocus></br></br>
                   <label for="date">End Date</label>
                     <input id="end_date" type ="date"
                   name = "end_date" placeholder = "date" 
                   required autofocus></br></br>
                   <label for="Billboard_id">Billboard Id</label>
                    <input id="Billboard_id" type ="text"
                   name = "Billboard_id" placeholder = "Billboard_id" 
                   required autofocus></br></br>
                   <label for="telephones">telephones</label>
                   <input id="telephones" type ="text"
                   name = "telephones" placeholder = "telephones" 
                   required autofocus></br></br>
                   <label for="Garage">Garage</label>
                    <input id="Garage" type ="text"
                   name = "garage" placeholder = "Garage" 
                   required autofocus></br></br>
                   
                   
                <button class="log" type ="submit" name="submit">Save</button>
                <a href="driver.php" class="log" name="submit">Add new</a>
                <a href="updatedriver.php" class="log" name="submit">Driver Dashboard</a>
               
             
            
             </form>
        </div>
    
    
</body>
</html>