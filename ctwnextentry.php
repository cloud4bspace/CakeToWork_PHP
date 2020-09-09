<?php
/*
 * Vollständige Liste aller Einträge mit allen verfügbaren Datenfeldern
 */
$teamAccessCode = $_GET['TAC'];
$conn = "";
include './dbconn.php';

$sql = "SELECT COUNT(*) AnzMitglieder FROM `ctwMember` LEFT JOIN ctwTeam ON ctwTeam.TeamId = ctwMember.MemberTeamId WHERE ctwTeam.TeamAccessCode='$teamAccessCode'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$anzMembers = $row['AnzMitglieder'];

$sql = "SELECT ctwList.ListId AS ListId, SUM(ctwRegistration.RegistrationAngemeldet) AS angemeldet, SUM(ctwRegistration.RegistrationAbgemeldet) AS abgemeldet FROM `ctwList` LEFT JOIN ctwRegistration ON ctwRegistration.RegistrationListID = ctwList.ListId GROUP BY ctwList.ListId";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {
    $unentschlossen = intval($anzMembers);
    if(!empty($row['angemeldet'])) {
        $unentschlossen -= intval($row['angemeldet']);
    }
    if(!empty($row['abgemeldet'])) {
        $unentschlossen -= intval($row['abgemeldet']);
    }

    $sql2 = "UPDATE ctwList SET ListAngemeldet='" . $row['angemeldet'] . "', ListAbgemeldet='" . $row['abgemeldet'] . "', ListUnentschlossen='$unentschlossen' WHERE ListId=" . $row['ListId'];
    $result2 = mysqli_query($conn, $sql2);
}

$sql = "SELECT * FROM `ctwList` LEFT JOIN ctwMember ON ctwMember.MemberEmail = ctwList.ListMemberEmail LEFT JOIN ctwTeam ON ctwTeam.TeamId = ctwMember.MemberTeamId LEFT JOIN ctwCompany ON ctwCompany.CompId = ctwTeam.TeamCompId WHERE ctwList.ListDate >= CURDATE() AND ctwTeam.TeamAccessCode = '$teamAccessCode' ORDER BY ListDate LIMIT 1";
//echo $sql;
$result = mysqli_query($conn, $sql);


while($row = mysqli_fetch_assoc($result)) {
    // echo var_dump($row);

    echo $row['ListId'] . "|" . $row['ListDate'] . "|" . $row['MemberName'] . "|" . $row['ListReason'] . "|" . $row['ListDaytime'] . "|" . $row['ListLocation'] ."|" . $row['ListDescription'] . "|" . $row['MemberAlias'] . "|" . $row['MemberAvatar'] . "|" . $row['ListMemberEmail'] . "|" . $row['ListAngemeldet'] . "|" . $row['ListAbgemeldet'] . "|" . $row['ListUnentschlossen'] . "|" . $row['ListFoodAndBev'];

}


//print_r($json_array);

?>