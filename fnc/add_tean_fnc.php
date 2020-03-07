<?php
error_reporting(1);
include 'mysqli_connector.php';
include 'pdo_connector.php';

$Teamname = $_POST['teamname'];
$mate1 = $_POST['memberOne'];
$mate2 = $_POST['memberTwo'];
$mate3 = $_POST['memberThree'];
$mate4 = $_POST['memberFour'];

$firstcheck = false;
$teamid="";
$testname = "test5";

$jscheck = false;

            //Überprüft od der Teamname schon vergeben ist
    if(!$error){
        $statement = $pdo->prepare("SELECT * FROM Teams WHERE Teamname=:Teamname");
        $result = $statement->execute(array('Teamname' => $Teamname));
                $user = $statement->fetch();

                if ($user !== false){
                    $error = true;
                    echo '<p class="error">Der Teamname ist bereits vergeben</p>';
                }
    }


    //Überprüft od der Vor und Nachname 1 schon vergeben ist
    if(!$error){
        $statement = $pdo->prepare("SELECT * FROM Teilnehmer WHERE Name=:Name");
        $result = $statement->execute(array('Name' => $mate1));
        $user = $statement->fetch();

        if ($user !== false){
            $error = true;
            echo '<p class="error">Der Teilnemer ist bereits registriert</p>';
        }
    }

    //Überprüft od der Vor und Nachname  2 schon vergeben ist
    if(!$error){
        $statement = $pdo->prepare("SELECT * FROM Teilnehmer WHERE Name=:Name");
        $result = $statement->execute(array('Name' => $mate2));
        $user = $statement->fetch();

        if ($user !== false){
            $error = true;
            echo '<p class="error">Der Teilnemer ist bereits registriert</p>';
        }
    }


    //Überprüft od der Vor und Nachname 3 schon vergeben ist
    if(!$error){
        $statement = $pdo->prepare("SELECT * FROM Teilnehmer WHERE Name=:Name");
        $result = $statement->execute(array('Name' => $mate3));
        $user = $statement->fetch();

        if ($user !== false){
            $error = true;
            echo '<p class="error">Der Teilnemer ist bereits registriert</p>';
        }
    }

    //Überprüft od der Vor und Nachname 4 schon vergeben ist
    if(!$error){
        $statement = $pdo->prepare("SELECT * FROM Teilnehmer WHERE Name=:Name");
        $result = $statement->execute(array('Name' => $mate4));
        $user = $statement->fetch();

        if ($user !== false){
            $error = true;
            echo '<p class="error">Der Teilnemer ist bereits registriert</p>';
        }
    }




if ($error == false) {

        //ERstellt das Team
    $sql = "INSERT INTO Teams (Teamname)
VALUES ('$Teamname')";

    if ($conn->query($sql) === TRUE) {
        $firstcheck = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }



//Ruft die Teamid ab
if($firstcheck == true) {
    $sql = "SELECT * FROM Teams WHERE Teamname = '$Teamname'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $teamid = $row["Team_ID"];
            $error = false;
        }
    } else {
        $error = true;
    }


}
        //Legt die einzelnen Spieler an

    $sql = "INSERT INTO Teilnehmer (Teamname, Team_ID, Teilnehmername)
VALUES ('$Teamname', '$teamid', '$mate1')";

    if ($conn->query($sql) === TRUE) {

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    $sql = "INSERT INTO Teilnehmer (Teamname, Team_ID, Teilnehmername)
VALUES ('$Teamname', '$teamid', '$mate2')";

    if ($conn->query($sql) === TRUE) {

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "INSERT INTO Teilnehmer (Teamname, Team_ID, Teilnehmername)
VALUES ('$Teamname', '$teamid', '$mate3')";

    if ($conn->query($sql) === TRUE) {

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "INSERT INTO Teilnehmer (Teamname, Team_ID, Teilnehmername)
VALUES ('$Teamname', '$teamid', '$mate4')";

    if ($conn->query($sql) === TRUE) {
        echo '<p class="succes">Team erfolgreich angelegt!</p>';
        $jscheck = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<script>
 var succes = "<?php echo $jscheck; ?>";
 if(succes) {
   $(".ci_submit").addClass("succes");
   $(".register_teams input").val("");
 } else {
   $(".ci_submit").addClass("error");
 }
</script>
