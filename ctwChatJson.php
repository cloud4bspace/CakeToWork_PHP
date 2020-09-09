<?php
/*
 * Vollständige Liste aller Chat-Einträge mit allen verfügbaren Datenfeldern
 */
$teamAccessCode = $_GET['TAC'];
$conn = "";
include './dbconn.php';

$sql = "SELECT * FROM `ctwChat` LEFT JOIN ctwMember ON ctwMember.MemberEmail = ctwChat.ChatMember LEFT JOIN ctwTeam ON ctwTeam.TeamId = ctwMember.MemberTeamId WHERE ctwTeam.TeamAccessCode = '$teamAccessCode' ORDER BY ChatTimestamp ASC";

$result = mysqli_query($conn, $sql);

$json_array = array();
$json_array0 = array();

while($row = mysqli_fetch_assoc($result)) {
    // echo var_dump($row);

    $json_array[] = $row;
}
$json_array0 = [ "chatmessages" => $json_array];

echo json_encode($json_array0);

//print_r($json_array);

?>