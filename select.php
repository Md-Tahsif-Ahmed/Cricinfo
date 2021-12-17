
<?php
include "header.php";

$dbhost = "localhost";
$dbname = 'cricinfo';
$dbuser = 'root';
$dbpass = '';

try {
    $conn = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE player SET age='34' WHERE player_name=sakib";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>