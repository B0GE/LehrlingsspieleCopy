<?php
include '../php_console_log.php';
error_reporting (0);
if(isset($_POST['backuptrue'])) {

include 'php_console_log.php';
$name = "testdump";

    $host = "localhost";
    $user = "web192";
    $password = "gGM7NHPd2%";
    $database = "usr_web192_1";
    $sucess = false;
    try {

        $mysqli = new mysqli($host, $user, $password, $database);


        if ($mysqli->connect_error) {

        }

        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Transfer-Encoding: binary');

//Ouput start
        ob_start();
        $f_output = fopen("mysql_dumps/$name".date('Y-m-d_h_i_s').".sqf", 'w');


        fwrite($f_output,"-- SQL DUMP ----- Auto Backup System by  Bøøøge ツ\n");
        fwrite($f_output,"-- Server version:".$mysqli->server_info."\n");

        fwrite($f_output,"-- Generated: ".date('Y-m-d h:i:s')."\n");
        fwrite($f_output,'-- Current PHP version: '.phpversion()."\n");
        fwrite($f_output,'-- Host: '.$host."\n");
        fwrite($f_output,'-- Database:'.$database."\n");



        //liste aller tables
        $aTables = array();
        $strSQL = 'SHOW TABLES';
        if (!$res_tables = $mysqli->query($strSQL))
            throw new Exception("MySQL Error: " . $mysqli->error . 'SQL: '.$strSQL);

        while($row = $res_tables->fetch_array()) {
            $aTables[] = $row[0];
        }


        $res_tables->free();

        //now go through all the tables in the database
        foreach($aTables as $table)
        {
            fwrite($f_output,"-- --------------------------------------------------------\n");
            fwrite($f_output,"-- Structure for '". $table."'\n");
            fwrite($f_output,"--\n\n");

            // remove the table if it exists
            fwrite($f_output,'DROP TABLE IF EXISTS '.$table.';');

            // ask MySQL how to create the table
            $strSQL = 'SHOW CREATE TABLE '.$table;
            if (!$res_create = $mysqli->query($strSQL))
                throw new Exception("MySQL Error: " . $mysqli->error . 'SQL: '.$strSQL);
            $row_create = $res_create->fetch_assoc();

            fwrite($f_output,"\n".$row_create['Create Table'].";\n");


            fwrite($f_output,"-- --------------------------------------------------------\n");
            fwrite($f_output,'-- Dump Data for `'. $table."`\n");
            fwrite($f_output,"--\n\n");
            $res_create->free();

            // get the data from the table
            $strSQL = 'SELECT * FROM '.$table;
            if (!$res_select = $mysqli->query($strSQL))
                throw new Exception("MySQL Error: " . $mysqli->error . 'SQL: '.$strSQL);

            // get information about the fields
            $fields_info = $res_select->fetch_fields();

            // now we can go through every field/value pair.
            // for each field/value we build a string strFields/strValues
            while ($values = $res_select->fetch_assoc()) {

                $strFields = '';
                $strValues = '';
                foreach ($fields_info as $field) {
                    if ($strFields != '') $strFields .= ',';
                    $strFields .= "`".$field->name."`";


                    if ($strValues != '') $strValues .= ',';
                    $strValues .= '"'.preg_replace('/[^(\x20-\x7F)\x0A]*/','',$values[$field->name].'"');
                }

                // now we can put the values/fields into the insert command.
                fwrite($f_output,"INSERT INTO ".$table." (".$strFields.") VALUES (".$strValues.");\n");
            }
            fwrite($f_output,"\n\n\n");

            $res_select->free();
        }
        $sucess = true;
        echo "<p>sucessfully created backup</p>";

    } catch (Exception $e) {
        fwrite($f_output,$e->getMessage());
    }


    fclose($f_output);
    print(ob_get_clean());
    $mysqli->close();
}
?>

<script>
  var databaseSave = "<?php echo $sucess; ?>";

  if (databaseSave) {
    $(".ci_submit").addClass("succes");
    console.log("succes");
  } else {
    $(".ci_submit").addClass("error");
    console.log("error");
  }
</script>
