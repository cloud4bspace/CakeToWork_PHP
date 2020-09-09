<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Cake-To-Work-Board">
    <meta name="author" content="Bernhard Kämpf (cloud4b.space)">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link href='./css/stylesheet.css?v=<?=time();?>' type='text/css' rel='stylesheet'>
    <title>CTW-Board</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript">

        function getListe() {
                var $_GET = <?php echo json_encode($_GET); ?>;
                var $tac = $_GET['TAC'];
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("liste").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "https://www.cloud4b.space/caketowork/ctwOutputBoardContent.php?TAC=" + $tac, true);
                xhttp.send();
        }

        setInterval(getListe, 10000);
    </script>
</head>

<body onload="getListe();">
<div class='gridPage001' id='gridPage001'>
    <div id='liste' class='liste'>Inhalt wird geladen..</div>
    <div id='nav' class='nav'><a href='https://cloud4b.space/dashboard/overview.php'>  HOME</a></div>
</div>
</body>
</html>
