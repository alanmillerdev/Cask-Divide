<?php

include '../../../../Database/dbConnect.inc.php';

$dbConnection = Connect();

//Define connections for ftp
if(isset($_POST['add']))
{
$tbl_name = 'cask';
$ftp_user = '';
$ftp_pass = '';
$ftp_server = '';

$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
//Login with username and password
$login_result = ftp_login($ftp_conn, $ftp_user, $ftp_pass);

//Check connection
if ((!$ftp_conn) || (!$login_result)) {
    echo "FTP connection has failed!";
    echo "Attempted to connect to $ftp_server for user $ftp_user";
    exit;
}

$caskName = $_POST['NameOfCask'];
$percentageAvailable = $_POST['PercentageAvailable'];
$wholeCaskPrice = $_POST['WholeCaskPrice'];
$ola = $_POST['OLA'];
$rla = $_POST['RLA'];
$percentageAlcohol = $_POST['PercentageAlcohol'];
$caskType = $_POST['CaskType'];
$woodType = $_POST['WoodType'];
$distilleryName = $_POST['DistilleryName'];
<<<<<<< HEAD
$uploadDir = '../';
$fileName = $_FILES['fileToUpload']['name'];
$filePath = $uploadDir . $fileName;

//Move uploaded file into the ftp
if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],"../".$_FILES["fileToUpload"]["name"]))
{
//If file has uploaded successfully, store its name in data base
$query_image = "INSERT INTO $tbl_name(img) VALUES ('$filePath')";
if(mysqli_query($con,$query_image))
{
header("Location: ");
}
else
{
echo 'File name not stored in database';
}
}
else{echo 'File not uploaded';}

}

=======
$caskImagePath = $_POST[''];
>>>>>>> 501cc3812595d92ac7df26dc5817836fbf9fe500

//Prepared Statement
$stmt = $dbConnection->prepare("INSERT INTO cask (CaskName, PercentageAvailable, WholeCaskPrice, OLA, RLA, PercentageAlcohol, CaskType, WoodType, DistilleryName, CaskImageLocation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sddddissss", $CaskName, $PercentageAvailable, $WholeCaskPrice, $OLA, $RLA, $PercentageAlcohol, $CaskType, $WoodType, $DistilleryName, $CaskImageLocation);

$CaskName = $distilleryName;
$PercentageAvailable = $percentageAvailable;
$WholeCaskPrice = $wholeCaskPrice;
$OLA = $ola;
$RLA = $rla;
$PercentageAlcohol = $percentageAlcohol;
$CaskType = $caskType;
$WoodType = $woodType;
$DistilleryName = $distilleryName;
$CaskImageLocation = $caskImageLocation;

$stmt->execute();
$stmt->close();
$dbConnection->close();
