<?php
$page = "points";
include '../fnc/header.php';
include '../fnc/nav.php';
include '../fnc/mysqli_connector.php';
include '../fnc/login_check.php';

?>

<html>
<head>
</head>
<body>
  <form class="add_points flex" method="post">
    <div class="input-container">
    <div class="p_dropdown spielmodi" data-dropdown="1" >
      <div class="active_value gamemode" name="gamemode">Spielmodus: <span data-value=""></span></div>
      <ul>
        <li data-value="Quiddtich">Quiddtich</li>
        <li data-value="Crossboccia">Crossboccia</li>
        <li data-value="Schlauchbootrennen">Schlauchbootrennen</li>
        <li data-value="Highland Games">Highland Games</li>
        <li data-value="Ultimate Frisbee">Ultimate Frisbee</li>
        <li data-value="Badminton">Badminton</li>
        <li data-value="Takeshis Kingdom">Takeshi's Kingdom</li>
      </ul>
    </div>

    <div class="p_dropdown" data-dropdown="1">
      <div class="active_value winnerteam" name="winnerteam">Gewinner: <span class="active_value_span" data-value="0"></span></div>
      <ul>
        <li data-value="0">---</li>
        <?php
        $sql = 'SELECT * FROM Teams';
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<li data-value=".$row["Team_ID"].">" .$row["Teamname"]. "</li>";
                $error = false;
            }
        } else {
            echo "no Resulst";
        }
        ?>
      </ul>
    </div>

    <div class="p_dropdown" data-dropdown="1">
      <div class="active_value looserteam" name="looserteam">Verlierer: <span data-value="0"></span></div>
      <ul>
        <li data-value="0">---</li>
        <?php
        $sql = 'SELECT * FROM Teams';
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<li data-value=".$row["Team_ID"].">" .$row["Teamname"]. "</li>";
                $error = false;
            }
        } else {
            echo "no Resulst";
        }
        ?>
      </ul>
    </div>

    <div class="p_dropdown" data-dropdown="1">
      <div class="active_value didntcome" name"didntcome">Nicht teilgenommen: <span data-value="0"></span></div>
      <ul>
        <li data-value="0">---</li>
        <?php
        $sql = 'SELECT * FROM Teams';
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<li data-value=".$row["Team_ID"]." >" .$row["Teamname"]. "</li>";
                $error = false;
            }
        } else {
            echo "no Resulst";
        }
        ?>
      </ul>
    </div>
    <div class="ci_submit">
      <button class="add_points_button" type="submit">Senden</button>
      <div class="ci_error_handler">
        <p>
          Wähle einen Spielmodus aus!
        </p>
      </div>
        <?php
          include '../svg/succes.php';
          include '../svg/error.php';
        ?>
    </div>
    </div>
  </form>

<?php include '../fnc/scripts.php'; ?>
<script src="../js/getPoints.js"></script>
</body>
</html>
