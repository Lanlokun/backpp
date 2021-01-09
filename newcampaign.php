<?php 

 include 'db.php';

$conn = new mysqli('localhost','malik', '12345', 'outboost');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $results =[]; 
  $search = '';
  if (isset($_GET['search']) ) {

    $search = $_GET['search'];
    $results = $db_select(
        "SELECT * FROM campaign WHERE name LIKE '%$search%'"
    );
     
}
   
?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="XcUA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics Platform  </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>

        <div class="page-header">
             <h1> Analytics Dashboard </h1>
        </div>

        <?php foreach($results as $result) { ?>

            <img id="image" src="<?= $result['image'] ?>" width = 500px ></br></br>

            <h1>
                <?="title:". $result['title'] ?>
            </h1></br></br>
            <h1>
                <?="company name:". ' '. $result['company_name'] ?>
            </h1></br></br>
            <h1>
                <?="campaign volume:". ' '. $result['campaign_volume'] ?>
            </h1></br></br>
            <h1>
                <?="total audience exposure:". ' '. $result['total_audience_exposure'] ?>
            </h1></br></br>
            <h1>
                <?="direct reach:". ' '. $result['direct_reach'] ?>
            </h1></br></br>
            <h1>
                <?="estimated trips:". ' '. $result['estimated_trips'] ?>
            </h1></br></br>
            <h1>
                <?="estimated_miles:". ' '. $result['estimated_miles'] ?>
            </h1></br></br>
            
            <h1>
                <?="Ad Status:". ' '. $result['Ad_Status'] ?>
            </h1>
            </br></br>
            <h1>
                <?="conversion per head:". ' '. $result['conversion_per_head'] ?>
            </h1> </br></br>
            <h1>
                <?="start_date:". ' '. $result['start_date'] ?>
            </h1>
            <h1></br></br>
                <?="end_date:". ' '. $result['end_date'] ?>
            </h1>

            <?php } ?>
        

</body>
</html>