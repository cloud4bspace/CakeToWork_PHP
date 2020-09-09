<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
 * Vollständige Liste aller Einträge mit allen verfügbaren Datenfeldern
 */
$teamAccessCode = $_GET['TAC'];
$userEmail = $_GET['UserEmail'];
$chatMessage = $_GET['ChatMessage'];
$conn = "";

include './dbconn.php';

// prepare and bind
//$sql = "INSERT INTO ctwList (ListId, ListMemberEmail, ListDate, ListDaytime, ListReason, ListFoodAndBev, ListDescription, ListImage, ListAdded, ListLastChange) VALUES (NULL, ?, ?, ?, ?, ?, ?, '', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
$sql = "INSERT INTO `ctwChat` (`ChatID`, `ChatMember`, `ChatMessage`, `ChatTimestamp`) VALUES (NULL, ?, ?, CURRENT_TIMESTAMP);";
$stmt 	= mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss",$_GET['UserEmail'], $_GET['ChatMessage']);

mysqli_stmt_execute($stmt);
echo $stmt->insert_id;
mysqli_stmt_close($stmt);

?>