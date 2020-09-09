<?php
/*
 * Vollständige Liste aller Einträge mit allen verfügbaren Datenfeldern
 */

//https://cloud4b.space/caketowork/registration.php?TAC=1234567890&Username=Carole Wüthrich&UserEmail=carole.wuethrich@zuerich.ch&UserOrg=Stadt Zürich&UserTeam=Finanzkontrolle&UserSex=male
$teamAccessCode = $_GET['TAC'];
$userName = $_GET['Username'];
$userEmail = $_GET['UserEmail'];
$userOrg = $_GET['UserOrg'];
$userTeam = $_GET['UserTeam'];
$userAvatar = $_GET['UserAvatar'];
$userAlias = $_GET['UserAlias'];
$conn = "";
include './dbconn.php';
/*
echo "<br>TAC: $teamAccessCode";
echo "<br>Username: $userName";
echo "<br>UserEmail: $userEmail";
echo "<br>UserOrg: $userOrg";
echo "<br>UserTeam: $userTeam";*/

// TeamID ermittelnt
$sql = "SELECT * FROM `ctwTeam` WHERE `TeamAccessCode` LIKE '$teamAccessCode'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$teamId = $row['TeamId'];

if($teamId>0) {
    // gibt es bereits einen User mit dieser E-Mail-Adresse? Wenn nicht, wird ein neuer User angelegt
    $sql = "SELECT COUNT(*) AS Treffer FROM ctwMember WHERE MemberEmail='$userEmail'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if($row['Treffer']<1) {
        $sql = "INSERT INTO `ctwMember` (`MemberID`, `MemberTeamId`, `MemberEmail`, `MemberName`, MemberAlias, MemberSex, MemberAvatar, MemberAdmin, `MemberPhoto`, MemberAdded, MemberLastChange) VALUES (NULL, '$teamId', '$userEmail', '$userName', '$userAlias', '', '$userAvatar', '0', 'pic', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
        $result = mysqli_query($conn, $sql);
    } else {
        $sql = "UPDATE ctwMember SET MemberName='$userName', MemberAlias='$userAlias', MemberAvatar='$userAvatar', MemberLastChange=CURRENT_TIMESTAMP WHERE MemberEmail='$userEmail'";
        $result = mysqli_query($conn, $sql);
    };
    echo "OK";
} else {


    echo "NOK";
};


?>