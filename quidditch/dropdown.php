<?php
include 'database_connect.php';
$sql = "SELECT * FROM Teams";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
    while($ausgabe = $result->fetch_assoc()) {
        echo "<option value=".$ausgabe['Teamname'].">".$ausgabe['Teamname']."</option>";
    }
} else {

}
