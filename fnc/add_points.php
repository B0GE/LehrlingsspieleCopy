<?php
$error = false;
$uhrzeit = date('H:i:s');


include 'pdo_connector.php';
include 'mysqli_connector.php';
$Gamemode = $_POST['gamemode'];
$Winnerteam = $_POST['winnerteam'];
$looserteam = $_POST['looserteam'];
$didntcome = $_POST['didntcome'];
$winnpoints = $_POST['10'];
$loosepoints = $_POST['5'];
$bottherepoints = $_POST['0'];
$winnername = "";
$loosername = "";
$didntcomename ="";
$created = false;

if(isset($_POST['gamemode'])) {
    //Überprüft od das gewinner Team schon gespiielt hat
    if(!$error){
        $statement = $pdo->prepare("SELECT * FROM Punkte WHERE Team_ID=:Team_ID AND Spiel= '$Gamemode'");
        $result = $statement->execute(array('Team_ID' => $Winnerteam));
        $user = $statement->fetch();

        if ($user !== false){
            $error = true;
            echo "Der Gewinner hat schon gespielt";
        }
    }

    //Überprüft od das verlierer Team schon gespiielt hat
    if(!$error){
        $statement = $pdo->prepare("SELECT * FROM Punkte WHERE Team_ID=:Team_ID AND Spiel= '$Gamemode'");
        $result = $statement->execute(array('Team_ID' => $looserteam));
        $user = $statement->fetch();

        if ($user !== false){
            $error = true;
            echo "Der Verlierer hat schon gespielt";
        }
    }


    //Überprüft od das nicht teilnehmer Team schon gespiielt hat
    if(!$error){
        $statement = $pdo->prepare("SELECT * FROM Punkte WHERE Team_ID=:Team_ID AND Spiel= '$Gamemode'");
        $result = $statement->execute(array('Team_ID' => $didntcome));
        $user = $statement->fetch();

        if ($user !== false){
            $error = true;
            echo "Der Nicht teilnehmende hat schon gespielt";
        }
    }


    if ($error == false) {



        //Erstellt random base64 number für die session id
        $length = 16;
        $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $matchid = "";

        for ($i = 0; $i < $length; $i++) {
            $matchid .= $chars[mt_rand(0, strlen($chars) - 1)];
        }

        //Ruft die Winner Daten ab

            $sql = "SELECT * FROM Teams WHERE Team_ID = '$Winnerteam'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {

                    $winnername = $row["Teamname"];

                }
            } else {
                $error = true;
            }

        //Ruft die looser Daten ab

            $sql = "SELECT * FROM Teams WHERE Team_ID = '$looserteam'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {

                    $loosername = $row["Teamname"];

                }
            } else {
                $error = true;
            }

        //Ruft die nicht teilgenommen daten ab

            $sql = "SELECT * FROM Teams WHERE Team_ID = '$didntcome'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {

                    $didntcomename = $row["Teamname"];

                }
            } else {
                $error = true;
            }

                //POST für den Winner
        if($Winnerteam > 0){
            $sql = "INSERT INTO Punkte (Team_ID, Teamname, Winnername, Points, Spiel,Timestamp_Time, Match_ID)
        VALUES ('$Winnerteam', '$winnername','$winnername', '10', '$Gamemode','$uhrzeit','$matchid')";

            if ($conn->query($sql) === TRUE) {
                $created = true;
            } else {
                $created = false;
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        //POST für den Verlierer
        if($looserteam > 0){
            $sql = "INSERT INTO Punkte (Team_ID, Teamname, Loosername, Points, Spiel,Timestamp_Time, Match_ID)
        VALUES ('$looserteam', '$loosername', '$loosername', '5', '$Gamemode','$uhrzeit', '$matchid')";

            if ($conn->query($sql) === TRUE) {
                $created = true;
            } else {
                $created = false;
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        if($didntcome > 0){
            $sql = "INSERT INTO Punkte (Team_ID, Teamname, Points, Spiel,Timestamp_Time, Match_ID)
        VALUES ('$didntcome', '$didntcomename', '0', '$Gamemode','$uhrzeit','$matchid')";

            if ($conn->query($sql) === TRUE) {
                $created = true;
            } else {
                $created = false;
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        if($created == true){
            echo "Match erfolgreich eingetragen. <br/> Match-ID:".$matchid;
        }
    }
}
?>

<script>
  var successPoints = "<?php echo $created; ?>";
  if (successPoints) {
    $(".ci_submit").addClass("succes");
  } else {
    $(".ci_submit").addClass("error");
  }
</script>
