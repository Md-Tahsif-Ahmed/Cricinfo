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
    $match_date=$_POST['match_date'];
    $team1=$_POST['team1'];
    $vs=$_POST['vs'];
    $team2=$_POST['team2'];
    $formate=$_POST['formate'];
    


    $statement = $db->prepare("INSERT INTO game (match_date,team1,vs,team2,formate) VALUES (?,?,?,?,?)");
    $statement->execute(array($match_date,$team1,$vs,$team2,$formate));

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
                    <input type="date" name="match_date" placeholder="match_date">
                    <br>
                    <input type="text" name="team1" placeholder="team1">
                    <br>
                    <input type="text" name="vs" placeholder="vs">
                    <br>
                    <input type="text" name="team2" placeholder="team2">
                    <br>
                    <input type="text" name="formate" placeholder="formate">
                    <br>
            
                    <input type="submit" value="Submit" name="form_submit">

                </form>
            </div>
            <a href="user.php"> user account </a><br>
        </div>
    </section>

</body>


</html>