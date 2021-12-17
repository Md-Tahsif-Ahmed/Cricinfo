<?php 

include "header.php";

$dbhost = 'localhost';
$dbname = 'cricinfo';
$dbuser = 'root';
$dbpass = '';

try {
    $db = new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e) {
    echo "Connection error: ".$e->getMessage();
}
?>

<?php

if(isset($_POST['form_submit'])){
    $player_name=$_POST['player_name'];


    $statement = $db->prepare("DELETE FROM player WHERE player_name = ?");
    $statement->execute(array($player_name));

    header("location: admin_home.php");

}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <title>Page Title</title>
</head>


<body>
    <section>
        <div class="container">
            <div class="login-form">
                <h1> login here </h1>
                <form action="" method="POST">
                    <input type="text" name="player_name" placeholder="player_name">
                    <br>
                    <input type="submit" value="Submit" name="form_submit">
             
                </form>
            </div>
			 <a href="user.php"> user account </a><br>
        </div>

</body>


</html>