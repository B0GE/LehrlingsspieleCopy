<?php
$gamemode = $_POST['spielmodus'];
$servername = "localhost";
$username = "web192";
$password = "gGM7NHPd2%";
$dbname = "usr_web192_1";
$testval = "lol";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT Team_ID FROM Punkte WHERE Spiel = '$gamemode'";
$result = $conn->query($sql);
$array = array();
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    $array[] = $row["Team_ID"];
    }
}


$sql = 'SELECT * FROM Teams';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc())

    {
      if (!in_array($row["Team_ID"], $array)) {
        echo "<li data-value=".$row["Team_ID"].">" .$row["Teamname"]. "</li>";
        $error = false;
      }
    }
} else {
    echo "no Resulst";
}


?>
