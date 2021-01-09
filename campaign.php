<?php
     //include 'inc/functions.php';

     $conn = new mysqli('localhost','malik', '12345', 'outboost');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
 // echo "Connected successfully";

 $errors = [];

$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$target_file = $target_dir. time() .'.'. $imageFileType;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
      array_push($errors, "File is not an image.");
    $uploadOk = 0;
  }


// Check if file already exists
if (file_exists($target_file)) {
    array_push($errors, "Sorry, file already exists.");
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
    array_push($errors, "Sorry, your file is too large.");
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      
    
    $sql = "INSERT INTO campaign (title, company_name, campaign_volume, total_audience_exposure	, direct_reach, estimated_trips, estimated_miles, Ad_Status, image, conversion_per_head, start_date, end_date ) 
    VALUES ('".$_POST['title']."','".$_POST['company_name']."','".$_POST['campaign_volume']."','".$_POST['total_audience_exposure']."','".$_POST['direct_reach']."','".$_POST['estimated_trips']."',
    '".$_POST['estimated_miles']."','".$_POST['Ad_Status']."','".$target_file."','".$_POST['conversion_per_head']."', '".$_POST['start_date']."', '".$_POST['end_date']."')";


    if ($conn->query($sql) === TRUE) {
        //echo "Submitted successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }


   // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
}
$results =[]; 
  $search = '';
  if (isset($_GET['search']) ) {

    $search = $_GET['search'];
    $results = $db_select(
        "SELECT * FROM campaign WHERE name LIKE '%$search%'"
    );
     
}

  
  $conn->close();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="XcUA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics Platform  </title>
    <link rel="stylesheet" href="campaign.css" type="text/css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript">
  function update()
  {
        $.ajax({url:"update.php", success:function(result)
        {
          alert("Dashboard has been updated")
        }})
  } 

</script>

</head>
<header>
      
</header>
<body>

    <div class="container">
    <div class="page-header">
        <img src="./images/logo.jpeg" width = '480' alt = 'taxi'>
          <h1> Analytics Input Sheet </h1>
      </div>
      <form  action="dash.php" method="get">
      
               
                <label for="title">Search campaign</label>
                <input class="search" type ="search"
                   name = "search" placeholder = "campaign" 
                   required autofocus></br></br>

    </form>

        <form  action="" method="post" enctype="multipart/form-data">
      
               <div id="name">
                <label for="title">Campaign title</label></br></br>
                <input class="input" type ="text"
                   name = "title" placeholder = "campaign" 
                   required autofocus></br></br>
               </div>
               <label for="company_name">Company name</label></br\></br>
                <input class="input" id="company" type ="text"
                   name = "company_name" placeholder = "company name" required></br></br>

                   <label for="campaign_volume">campaign_volume</label></br></br>
                   <input class="input" id="volume" type ="text"
                   name = "campaign_volume" placeholder = "campaign volume" required></br></br>

                   <label for="total_audience_exposure">Total audience exposure</label></br></br>
                    <input class="input" id="exposure" type ="text"
                   name = "total_audience_exposure" placeholder = "total audience exposure" 
                   required autofocus></br></br>

                   <label for="direct_reach">Direct reach</label></br></br>
                   <input class="input" id="direct_reach" type ="text"
                   name = "direct_reach" placeholder = "direct_reach" 
                   required autofocus></br></br>
                   
                   <label for="trips">Estimated Trips</label></br></br>
                    <input class="input" id="Trips" type ="text     "
                   name = "estimated_trips" placeholder = "estimated_trips" 
                   required autofocus></br></br>
    
                   <label for="estimated_miles">Estimated miles</label></br></br>
                   <input class="input" id="miles" type ="text"
                   name = "estimated_miles" placeholder = "estimated_miles" 
                   required autofocus></br></br>

                   <label for="Ad_Status">Ad_Status</label></br></br>
                   <input class="input" id="status" type ="text" name = "Ad_Status" placeholder = "Ad_Status" 
                   required autofocus></br></br>
                  
                    <label for="fileToUpload">Upload image </label></br></br>
                     <input type="file" name="fileToUpload" id="fileToUpload" required autofocus></br></br>

                     <label for="conversion_per_head">conversion per head</label></br></br>
                     <input class="input" id="conversion" type ="text"
                     name = "conversion_per_head" placeholder = "conversion_per_head" 
                     required autofocus></br></br>

                     <label for="start_date">Start Date</label></br></br>
                     <input id="start_date" type ="date"
                   name = "start_date" placeholder = "startdate" 
                   required autofocus></br></br>

                   <label for="end_date">End Date</label></br></br>
                     <input id="end_date" type ="date"
                   name = "end_date" placeholder = "end_date" 
                   required autofocus></br></br>


                   
                <button id="log" type ="submit" name="submit">Save</button></br></br>
               
               
            
             </form>
        </div>

</body>

<div  id="footer">
<footer>
  <button onclick="update()"><a href="dash.php?q=<?=$update['id'] ?>" class="update">Update Dashboard</a></button>
                <a href="campaign.php" class="new">new campaign</a>
                <a href="driver.php" class="new_driver">new driver</a>
                <a href="udashboard.php" class="driver">driver dashboard</a>
    
</footer>
</div>
</html>