<?php 

 include 'db.php';

$conn = new mysqli('localhost','malik', '12345', 'outboost');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $results = [];
  $search = '';
  if (isset($_GET['search']) ) {

    $search = $_GET['search'];}

  $results = $db_select(
    "SELECT * FROM driver WHERE driver_name LIKE '%$search%'" );
 
    if($results!= true){
        echo " Some drivers are not live";
    }
    if($search != null){

    
        $update = $db_update( 
            "UPDATE  driver SET status = 'not live' WHERE driver_name LIKE '%$search%'");
            
                if($update == TRUE){
                    echo '<script type="text/javascript">alert("Dashboard has been updated")</script>';
                    foreach($results as $result){
                        echo $result['driver_name']. ' '.'is not live';
                        echo '<br>'; }
                    


             }
               else{
                 echo "Something went wrong! Dashboard couldn't update";
             }
    
            }
           
           
                
    
            
          

    

   
    //   if( $results != null ){
    //     $update = $db_update( 
    //         "UPDATE driver SET total_audience_exposure = (total_audience_exposure + 400), direct_reach = (direct_reach  + 160),
    //    estimated_trips = (estimated_trips +  40), estimated_miles = (estimated_miles  + 100) " );
            
    //             if($update == TRUE){
    //              echo '<script type= "text/javascript"> alert(" Dashboard has been updated")</script>';
    //          }
    //            else{
    //              echo "Something went wrong! Dashboard couldn't update";
    //          }
            
    //         }
    //         else{
    //             echo "Database is empty";
    //         }
            
   
?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="XcUA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="udriver.css" type="text/css">
    <title>Analytics Platform  </title>

</head>
<body>
<form  action="updatedriver.php" method="get">
      
               
      <label for="title">Search driver</label>
      <input class="search" type ="search"
         name = "search" placeholder = "driver" 
         required autofocus></br></br>

</form>

        <div class="page-header">
        <img src="./images/logo.jpeg" width = '480' alt = 'taxi'>
             <h1> Driver Dashboard </h1>
            
        </div>
        
        <div id="results">
        <?php foreach($results as $result) { ?>
            
<table>
    <tr>

        <th>
            <h1>
            Driver name
            </h1>
            </th>
            <th>
            <h1>
            Status 
            </h1>
            </th>
            <th>
            <h1>
             Audience Exposure 
            </h1>
            </th>
            <th>
            <h1>
            Direct Reach
            </h1>
            </th>
            <th>
            <h1>
            Estimated Trips
            </h1>
            </th>
            <th>
            <h1>
            Estimated Miles
            </h1>
            </th>
            <th>
            <h1>
            Start Date
            </h1>
            </th>
            <th>
            <h1>
           Expiry Date
            </h1>
            </th>
            <th>
            <h1>
           Billboard Id
            </h1>
            </th>
            <th>
            <h1>
            Telephone
            </h1>
            </th>
            <th>
            <h1>
            Garage
            </h1>
            </th>
        </tr>

        <tr>
            <h1>
            <td> <?=$result['driver_name'] ?></td>
        </h1>
       
            <h1>
                <td>
                <?= $result['status'] ?></td>
            </h1>
            <h1>
                <td>
                <?=$result['total_audience_exposure'] ?></td><br>
            </h1>
            <h1>
                <td>
                <?=$result['direct_reach'] ?></td>
            </h1>
            <h1>
                <td>
                <?=$result['estimated_trips'] ?></td>
            </h1>
            <h1>
                <td>
                <?=$result['estimated_miles'] ?></td>
            </h1> 
            <h1>
                <td>
                <?= $result['start_date'] ?></td>
            </h1> 
            <h1>
                <td>
                <?=$result['end_date'] ?></td>
            </h1> 
            <h1>
                <td>
                <?= $result['Billboard_id'] ?></td>
            </h1> 
            <h1>
                <td>
                <?= $result['telephones'] ?>
        </td>
            </h1> 
            <h1>
                <td>
                <?=$result['garage'] ?>
                </td>
            </h1> 
        </tr>

        </table>

            




            <?php } ?>
        </div></br></br>
            
        <a href="dash.php" class="update">dashboard</a>
        

</body>
</html>