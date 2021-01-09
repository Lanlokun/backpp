 <?php

include 'db.php';

$conn = new mysqli('localhost','malik', '12345', 'outboost');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

$results = $db_select(
    "SELECT * FROM campaign");

if($results != null){
    
        $update = $db_update( 
            "UPDATE campaign SET total_audience_exposure = total_audience_exposure +(40 * 11), direct_reach = direct_reach  + (10 * 11),
       estimated_trips = estimated_trips + ( 4 * 11), estimated_miles = estimated_miles  + (10 * 11),
             conversion_per_head = conversion_per_head  +( 2.5)" );
            
                if($update == TRUE){
                    echo '<script type="text/javascript">alert("Dashboard has been updated")</script>';

             }
               else{
                 echo "Something went wrong! Dashboard couldn't update";
             }
    
            }
            else{
                echo "Database is empty";
                echo '<br>';
                echo '<a href="campaign.php" class="new">create new</a>';
            }
          

?> 