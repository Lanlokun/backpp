<?php 

 include 'db.php';

$conn = new mysqli('localhost','malik', '12345', 'outboost');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
    $results = $db_select(
        "SELECT * FROM campaign"
    );


//     if($results == TRUE){
//         echo '<script type="text/javascript">alert("Dashboard has been updated")</script>';
//  }


    
   
?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="XcUA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics Platform  </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="dash.css" type="text/css">
</head>
<div class="page-header">   

    <header>
    <img src="./images/logo.jpeg" width = '480' alt = 'taxi'>
    </header>
</div>
<!-- <script type="text/javascript">alert("Dashboard has been updated")</script> -->
<body>
<div id="page">   
<img src="./images/taxi.jpeg" width = '300px' height ='250px ' alt = 'taxi'>
<?php
 
echo date("h:i:sa");
echo date('m/d/y', $tm);
 ?>

</div>       

        <?php foreach($results as $result) { ?>
            <div id="date" >
                <h1>Period</h1>
                <img class="img" src="./images/calendar.png" alt = 'taxi'> 
            <h1 class stats>
                <?=$result['start_date'] ?> ||
                <?=$result['end_date'] ?>
            </h1>
          </div>
            
            <div class="volume">
            
            <h1>Campaign volume</h1>
           
            <img class="img" src="./images/ico.png" alt = 'taxi'> 
            <h1 class="stats"><?=$result['campaign_volume'] ?> </h1>
            
             </div>
           
            <div id="exposure">
                <h1>Total audience exposure</h1>
                <img class="img" src="./images/expo.png" alt = 'taxi'>
            <h1 class="stats"><?=$result['total_audience_exposure']?></h1>
            </div>
            
            <div id="reach">
                <h1>direct reach</h1>
                <img class="img" src="./images/people.jpg" alt = 'taxi'> 
            <h1 class="stats">
                <?=$result['direct_reach'] ?>
            </h1>
            </div>
            <div id="conversion">
            <h1>conversion</h1>
            <img class="img" src="./images/money.svg" alt = 'taxi'> 
            <h1 class="stats">
                <?=$result['conversion_per_head'] ?>
            </h1> </div>

            <div id="trips">
            <h1>estimated trips</h1>
            <img class="img" src="./images/traffic.svg" alt = 'taxi'> 
            <h1 class="stats">
                <?=$result['estimated_trips']?>
            </h1>
         </div>
            <div id="miles" >
            <h1>estimated miles</h1>
            <img class="img" src="./images/mile.png" alt = 'taxi'> 
            <h1 class="stats">
                <?=$result['estimated_miles'] ?>
            </h1> </div>
          
            <div id="status">
            <h1>Ad Status</h1>
            <img class="img" src="./images/status.png" alt = 'taxi'> 
            <h1 class="stats">
                <?=$result['Ad_Status'] ?>
            </h1>
             </div>
            
            <?php } ?>
        

</body>
</html>