<?php
include 'database_connect.php';
$sql = "SELECT * FROM hurensohn ORDER BY Zeitstempel DESC LIMIT 20";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
    while($ausgabe = $result->fetch_assoc()) {
        echo "<div class='einträge'><div>".$ausgabe['Punkte']."</div><div>".$ausgabe['Teamname']."</div><div>".$ausgabe['Notiz']."</div></div>";
    }
} else {

}
