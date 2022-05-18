<html>
    <head>
        <meta http-equiv="refresh" content="5">
    </head>
</html>

<?php
//include the database file
include 'dab.php';
//set the vairible for how manny pings to receive
$good = "1 received";
$successValue;

//query the mysql
$query = mysqli_query($con, "SELECT * FROM pingto");
   while($row = mysqli_fetch_assoc($query)) {
      //adding data to the array
      $websites[] = $row['ip_add'];
      $id =  $row['id'];
   }

echo "<h1>Site Status ".date("h:i:s")."</h1>";
//loop through the array
foreach ($websites as $url){
    unset($result);
    $successValue = "DOWN";
    // execute the ping command -c = $good
    exec("ping -c 1 $url", $output, $result);
    foreach($output as $response) {
        if (strpos($response,$good) == TRUE){
            $successValue = "UP";
        }
    }
    echo "<strong>Address: ".$url." </strong>";
    if ($successValue == "UP") {
        echo " Site is ".$successValue;

    } else {
        echo " Site is ".$successValue;
    }
    echo "<br><br>";
}

?>
</body>
</html>
