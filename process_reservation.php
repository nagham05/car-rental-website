<?php
include 'config.php';
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];
$pickuplocation = $_POST['pickuplocation'];
$dropofflocation = $_POST['dropofflocation'];
$pickuptime = $_POST['pickuptime'];
$dropofftime = $_POST['dropofftime'];
$UID = $_POST['UID'];
$CID = $_POST['CID'];
$PID = $_POST['PID'];

$sql = "INSERT INTO reservation (startdate, enddate, pickuplocation, dropofflocation, pickuptime, dropofftime, UID , CID , PID ) VALUES ('$startdate', '$enddate', '$pickuplocation', '$dropofflocation','$pickuptime', '$dropofftime', '$UID','$CID', '$PID ')";
if ($conn->query($sql) === TRUE) {
    header('Location: reservation.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>