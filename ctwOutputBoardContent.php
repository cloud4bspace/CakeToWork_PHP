
<?php
$conn = "";

require_once('./services/ImageLibrary.php');
include './dbconn.php';

$teamAccessCode = $_GET['TAC'];
if(empty($teamAccessCode)) {
    echo "TAC fehlt";
}
$sql = "SELECT * FROM `ctwList` LEFT JOIN ctwMember ON ctwMember.MemberEmail = ctwList.ListMemberEmail LEFT JOIN ctwTeam ON ctwTeam.TeamId = ctwMember.MemberTeamId LEFT JOIN ctwCompany ON ctwCompany.CompId = ctwTeam.TeamCompId WHERE ctwList.ListDate >= CURDATE() AND ctwTeam.TeamAccessCode = '$teamAccessCode' ORDER BY ctwList.ListDate";

$result = mysqli_query($conn, $sql);

$dateOld = "";

$il = new ImageLibrary();
$counter = 1;
while($row = mysqli_fetch_assoc($result)) {
    if($counter == 1) {
        echo "<h1>Znüni-Kalender " . $row['TeamBezeichnung'] . " (" . $row['CompBezeichnung'] . ")</h1>";
        echo "<h2>die nächsten Termine..</h2>";
        echo "<table>";
    }
    $counter++;
    // echo var_dump($row);
    if($dateOld != $row['ListDate']) {
        $dateOld = $row['ListDate'];
        echo "<tr>";
        echo "<th colspan='6'>";
        echo date_format(date_create($row['ListDate']), "D d.m.Y");
        echo "</th>";
        echo "</tr>";
    }
    echo "<tr>";
        echo "<td>";
           // $img = $il->getIcnName($row['MemberAvatar']) . ".png";
            echo "<img class='icn' src='./img/" . $row['MemberAvatar'] . ".png' alt='" . $row['MemberAvatar'] . "'>";
        echo "</td>";
        echo "<td class='nowrap'>";
            echo $row['MemberName'] . " (" . $row['MemberAlias'] . ")";
        echo "</td>";
        echo "<td>";
            $img = $il->getIcnName($row['ListDaytime']) . ".png";
            echo "<img class='icn' src='./img/$img' alt='Tageszeit icn'>";
        echo "</td>";

        echo "<td>";
            $img = $il->getIcnName($row['ListReason']) . ".png";
            $alt = $row['ListReason'];
            echo "<img class='icn' src='./img/$img' alt='$alt'>";
        echo "</td>";

        echo "<td>";
             echo $row['ListReason'];
        echo "</td>";
        echo "<td>";
            //echo $row['ListFoodAndBev'];
            $fablist = explode("|", $row['ListFoodAndBev']);
            foreach ($fablist as &$fab) {
                $img = $il->getIcnName($fab) . ".png";
                $alt = $fab;
                echo "<img style='margin-right:5px;' class='icn' src='./img/$img' alt='$alt'>";
            }
        echo "</td>";
    echo "</tr>";
    if(!empty($row['ListDescription'])) {
        echo "<tr class='scndrow'>";
            echo "<td class='scndrow' colspan='6'>";
                echo $row['ListDescription'];
            echo "</td>";

        echo "</tr>";
    }

}

echo "</table>";


