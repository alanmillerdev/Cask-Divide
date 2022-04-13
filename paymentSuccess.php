<?php

  
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


$charge = $stripe->paymentIntents->retrieve(
    $paymentID
);

?>

<h1>SUCCESS</H1>
<?php 

if(isset($paymentID)) {
echo '<p>Thank you ' . $name . ', your purchase was successful. <br>Stripe Transaction ID: '.$paymentID.'<br>CaskID: '.$caskID .'<br>UserID: '.$userID .'<br>Price: '.$price.'<br>Percent: '.$percentage.'<br> Date of purchase: '.$date.'<br></p>';
$query ="INSERT INTO payment (StripeTransactionID, StripeCustomerID) VALUES ('$paymentID', '$custID')";
$result = @mysqli_query($dbConnection, $query);
$sql = "SELECT TransactionID, StripeTransactionID FROM payment WHERE StripeTransactionID = '$paymentID'";
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


        if($queryResult) {
           header("Location: index.php?success");
        } else {
            echo "error";
        }
    }
}
?>