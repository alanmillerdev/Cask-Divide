<?php

  
  include 'Database/dbConnect.inc.php';
  $dbConnection = Connect();

  session_start();
$paymentIntent = $_GET['id'];
$caskID = $_GET['caskID'];
$userID = $_GET['userID'];
$price = $_GET['price'];
$percentage = $_GET['percentage'];
$date = $_GET['date'];
$name = $_SESSION['FullName'];

?>

<h1>SUCCESS</H1>
<?php echo '<p>Thank you ' . $name . ', your purchase was successful. <br> CaskID: '.$caskID .'<br>UserID: '.$userID .'<br>Price: '.$price.'<br>Percent: '.$percentage.'<br> Date of purchase: '.$date.'<br></p>';
    ?>