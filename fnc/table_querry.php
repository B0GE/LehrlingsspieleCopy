

<html>
<head>

</head>
<body>
<?php
include 'mysqli_connector.php';



$sql = "SELECT Teamname,SUM(Points)   FROM Punkte GROUP BY Team_ID ORDER BY SUM(Points) DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='heading'>Name</div><div class='heading'>Punkte</div>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='teamname'>" .$row["Teamname"]. "</div><div class='points'>".$row["SUM(Points)"]."</div>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();





?>
</body>
</html>
