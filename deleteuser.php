<?php
/*
 * Einträge eines Users aus allen Tabellen löschen
 */

$teamAccessCode = $_GET['TAC'];
$userEmail = $_GET['UserEmail'];
$conn = "";
include './dbconn.php';

// prüfen, ob User mit diesem TAC vorhanden ist
$sql = "SELECT COUNT(*) AS Treffer FROM `ctwMember` LEFT JOIN ctwTeam on ctwMember.MemberTeamId = ctwTeam.TeamId WHERE ctwMember.MemberEmail='$userEmail' AND ctwTeam.TeamAccessCode='$teamAccessCode'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$treffer = $row['Treffer'];

$count = 0;
if($treffer>0) {
    // User in der Tabelle ctwMember löschen
    $sql = "DELETE FROM `ctwMember` WHERE `ctwMember`.`MemberEmail` ='$userEmail'";
    $result = mysqli_query($conn, $sql);
    $count = $result;

    // Einträge des Users in der Tabelle ctwList löschen
    $sql = "DELETE FROM `ctwList` WHERE `ListMemberEmail`='$userEmail'";
    $result = mysqli_query($conn, $sql);
    $count += $result;

    // Einträge des Users in der Tabelle ctwRegistration löschen
    $sql = "DELETE FROM `ctwRegistration` WHERE `RegistrationMemberEmail` = '$userEmail'";
    $result = mysqli_query($conn, $sql);
    $count += $result;

    // Einträge des Users in der Tabelle ctwChat löschen
    $sql = "DELETE FROM `ctwChat` WHERE `ChatMember` = '$userEmail'";
    $result = mysqli_query($conn, $sql);
    $count += $result;

    echo $count;
} else {


    echo "NOK";
};


?>