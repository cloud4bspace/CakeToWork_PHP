<?php
/*
 * Termin und damit verbundene An-/Abmeldungen löschen
 */
$teamAccessCode = $_GET['TAC'];
$act = $_GET['ACT'];
$status = $_GET['Status'];
$userEmail = $_GET['UserEmail'];
$itemId = $_GET['ItemId'];
$conn = "";
include './dbconn.php';

// Berechtigung des Users prüfen
$sql = "SELECT COUNT(*) AS OK FROM ctwMember LEFT JOIN ctwTeam ON ctwTeam.TeamId = ctwMember.MemberTeamId WHERE ctwTeam.TeamAccessCode='$teamAccessCode' AND ctwMember.MemberEmail='$userEmail'";
echo "<h1>sql: $sql </h1>";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if($row['OK']>0) {
    echo $row['OK'];
    $sql = "DELETE FROM `ctwList` WHERE `ctwList`.`ListId` = '$itemId'";
    echo "<h1>sql: $sql </h1>";
    echo mysqli_query($conn, $sql);

    $sql = "DELETE FROM ctwRegistration WHERE RegistrationListID = '$itemId'";
    echo "<h1>sql: $sql </h1>";
    echo mysqli_query($conn, $sql);

}



?>