<?php
  define('SecurityCheck', TRUE);
  if(!defined('SecurityCheck')) {
    exit(header("Location: index.php"));
  }
  if(!isset($_GET['id'])) {
    exit(header("Location: index.php"));
  }
  include 'Database/dbConnect.inc.php';
  $dbConnection = Connect();

  session_start();
$paymentID = $_GET['id'];
$caskID = $_GET['caskID'];
$userID = $_GET['userID'];
$price = $_GET['price'];
$percentage = $_GET['percentage'];
$date = $_GET['date'];
$name = $_GET['name'];
$email = $_GET['email'];
$phone= $_GET['phone'];



//Stripe
require_once "vendor/autoload.php";
$stripe = new \Stripe\StripeClient("sk_test_51KiHJEEIsZ5yvNB5WoMfOjI15pYld5EF3uDYbD2XOFLUbNtvkcTku3VIYpf908EPcb1op4Nk0kJaDcOpqkV2FdSa00LV1zLrVL");

$custID = $_SESSION['customerID'];

echo $custID;

$stripe->customers->update(
    $custID,
    ['email' => $email, 'phone' => $phone]
    
  );


?>

<h1>SUCCESS</H1>
<?php 


  
  $charge = $stripe->paymentIntents->retrieve(
    $paymentID,
    []
  );

  $chargeObject = $charge->charges->data;
  foreach($chargeObject as $val){
    $chargeID =  $val->id;
    }
    if(isset($chargeID)) {
      updatePercentage($dbConnection, $percentage, $caskID);
      echo '<p>Thank you ' . $name . ', your purchase was successful. <br>Stripe Transaction ID: '.$chargeID.'<br>CaskID: '.$caskID .'<br>UserID: '.$userID .'<br>Price: '.$price.'<br>Percent: '.$percentage.'<br> Date of purchase: '.$date.'<br></p>';
      $query ="INSERT INTO payment (StripeTransactionID, StripeCustomerID) VALUES ('$chargeID', '$custID')";
      $result = @mysqli_query($dbConnection, $query);
      $sql = "SELECT TransactionID, StripeTransactionID FROM payment WHERE StripeTransactionID = '$chargeID'";
      $sqlResult = @mysqli_query($dbConnection, $sql);            
      $row = mysqli_fetch_array($sqlResult);
      $TransactionID = $row[0];

          if($sqlResult){
          $sqlQuery ="INSERT INTO investment (UserID, CaskID, TransactionID, PercentPurchased, PurchaseAmount, PurchaseDate) VALUES ('$userID', '$caskID', '$TransactionID', '$percentage', '$price', NOW())";
          $queryResult = @mysqli_query($dbConnection, $sqlQuery);
          $select = "SELECT InvestmentID FROM investment WHERE TransactionID = '$TransactionID'";
          $selectResult = @mysqli_query($dbConnection, $select);            
          $row = mysqli_fetch_array($selectResult);
          $InvestmentID = $row[0];
          $select ="INSERT INTO userinvestments (UserID, InvestmentID, PurchaseDate) VALUES('$userID','$InvestmentID',NOW())"; 
          $selectResult = @mysqli_query($dbConnection, $select);

// cask id and cask name and include the amount of money it went for
        if($queryResult) {
          $select = "SELECT InvestmentID, CaskID, PurchaseAmount FROM investment WHERE CaskID = '$caskID'";
          $selectResult = @mysqli_query($dbConnection, $select);            
          $row = mysqli_fetch_array($selectResult);
          $CaskID = $row[1];
          $purchaseAmount = $row[2];
          $select = "SELECT CaskID, CaskName FROM cask WHERE CaskID = '$CaskID'";
          $selectResult = @mysqli_query($dbConnection, $select);            
          $row = mysqli_fetch_array($selectResult);
          $caskname = $row[1];
          $select = "SELECT UserID, FirstName, LastName FROM user WHERE UserID = '$userID'";
          $selectResult = @mysqli_query($dbConnection, $select);            
          $row = mysqli_fetch_array($selectResult);
          $name = $row[1] . ' ' .$row[2];
          $select ="INSERT INTO notification (UserID, NotificationType, NotificationText) VALUES('$userID','Investment', '$name has made an investment on the $caskname at £$purchaseAmount. \nInvestment ID: $InvestmentID')"; 
          $selectResult = @mysqli_query($dbConnection, $select);
         // echo "success";
           header("Location: index.php?success");
        } else {
            echo "error";
        }
    }
    } else {
      return false;
    }



function updatePercentage($dbConnection, $percentage, $caskID) {
  $sqlQuery ="UPDATE cask SET PercentageAvailable = PercentageAvailable - $percentage WHERE CaskID = $caskID";
  $queryResult = @mysqli_query($dbConnection, $sqlQuery);
}

?>