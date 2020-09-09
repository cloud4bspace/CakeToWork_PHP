<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
/*
 * Neuer Termin wird zur Datenbank hinzugefügt
 */
//$teamAccessCode = $_GET['TAC'];
$userEmail = $_GET['UserEmail'];
$date = $_GET['Date'];
$time = $_GET['Time'];
$reason = $_GET['Reason'];
$beverages = $_GET['Beverages'];
$conn = "";

include './dbconn.php';

// Eintrag zur Liste hinzufügen
$sql = "INSERT INTO ctwList (ListId, ListMemberEmail, ListDate, ListDaytime, ListReason, ListFoodAndBev, ListDescription, ListImage, ListAdded, ListLastChange) VALUES (NULL, ?, ?, ?, ?, ?, ?, '', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
$stmt 	= mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssssss",$_GET['UserEmail'], $_GET['Date'], $_GET['Time'], $_GET['Reason'], $_GET['Beverages'], $_GET['Infos']);

echo mysqli_stmt_execute($stmt);
$last_id = mysqli_insert_id($conn);

// Den Organisator als Teilnehmer hinzufügen
$sql = "INSERT INTO ctwRegistration (RegistrationID, RegistrationListID, RegistrationMemberEmail, RegistrationAngemeldet, RegistrationAbgemeldet) VALUES (NULL, ?, ?, '1', '0');";
$stmt 	= mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $last_id, $_GET['UserEmail']);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
?>