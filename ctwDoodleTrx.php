<?php
/*
 * An- und Abmeldungen für Termine bewirtschaften
 */
$teamAccessCode = $_GET['TAC'];
$act = $_GET['ACT'];
$status = $_GET['Status'];
$userEmail = $_GET['UserEmail'];
$itemId = $_GET['ItemId'];
$conn = "";
include './dbconn.php';


switch($act) {
    case "getStatus":
        $sql = "SELECT * FROM `ctwRegistration` WHERE RegistrationMemberEmail='$userEmail' AND RegistrationListID = $itemId";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if(sizeof($row)>0) {
            echo $row['RegistrationAngemeldet'] . "|" . $row['RegistrationAbgemeldet'];
        } else {
            echo "9|9";
        }
        break;

    case "setStatus":
        switch($status) {
            case "1":
                $sql = "DELETE FROM ctwRegistration WHERE  RegistrationMemberEmail='$userEmail' AND RegistrationListID = $itemId";
                $result = mysqli_query($conn, $sql);

                $sql = "INSERT INTO ctwRegistration (RegistrationID, RegistrationListID, RegistrationMemberEmail, RegistrationAngemeldet, RegistrationAbgemeldet) VALUES (NULL, '$itemId', '$userEmail', '1', '0');";
                $result = mysqli_query($conn, $sql);
                echo "angemeldet";
                break;
            case "2":
                $sql = "DELETE FROM ctwRegistration WHERE  RegistrationMemberEmail='$userEmail' AND RegistrationListID = $itemId";
                $result = mysqli_query($conn, $sql);

                $sql = "INSERT INTO ctwRegistration (RegistrationID, RegistrationListID, RegistrationMemberEmail, RegistrationAngemeldet, RegistrationAbgemeldet) VALUES (NULL, '$itemId', '$userEmail', '0', '1');";
                $result = mysqli_query($conn, $sql);
                echo "abgemeldet";
                break;
            case "9":
                $sql = "DELETE FROM ctwRegistration WHERE  RegistrationMemberEmail='$userEmail' AND RegistrationListID = $itemId";
                $result = mysqli_query($conn, $sql);
                echo "zurückgesetzt";
                break;
        }


        $row = mysqli_fetch_assoc($result);

        break;

}



?>