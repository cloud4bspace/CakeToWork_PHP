<?php
/*
 * Vollständige Liste aller Einträge mit allen verfügbaren Datenfeldern
 */
$teamAccessCode = $_GET['TAC'];
$datum = $_GET['Datum'];
$conn = "";
include './dbconn.php';



$sql = "SELECT COUNT(*) AS Treffer FROM `ctwList` LEFT JOIN ctwMember ON ctwMember.MemberEmail = ctwList.ListMemberEmail LEFT JOIN ctwTeam ON ctwTeam.TeamId = ctwMember.MemberTeamId LEFT JOIN ctwCompany ON ctwCompany.CompId = ctwTeam.TeamCompId WHERE ctwList.ListDate ='$datum' AND ctwTeam.TeamAccessCode = '$teamAccessCode'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
echo $row['Treffer'];

?>