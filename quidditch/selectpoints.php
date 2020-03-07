<?php
include 'database_connect.php';
$sql = "SELECT Notiz,Teamname,SUM(Punkte)  FROM hurensohn  GROUP BY Teamname ORDER BY Zeitstempel DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
    while($ausgabe = $result->fetch_assoc()) {
        echo "<div class='team_points flex'><div>".$ausgabe['SUM(Punkte)']."</div><div>".$ausgabe['Teamname']."</div></div>";
    }
} else {

}
