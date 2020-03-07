<?php
include 'mysqli_connector.php';



$sql = "SELECT Winnername,Loosername,Match_ID,Timestamp_Time FROM Punkte WHERE Points > 0   ORDER BY Timestamp_Time DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if ($row["Winnername"] != "") {
        echo "<div class='recent_games' data-id='".$row['Timestamp_Time']."'>" .$row["Winnername"]. "</div>";
      } else if($row["Loosername"] != "") {
        echo "<div class='recent_games' data-id='".$row['Timestamp_Time']."'>".$row["Loosername"]."</div>";
      }
    }
} else {
    echo "0 results";
}
$conn->close();





?>
