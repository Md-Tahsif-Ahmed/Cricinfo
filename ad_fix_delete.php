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


    $statement = $db->prepare("DELETE FROM game WHERE match_date = ?");
    $statement->execute(array($match_date));

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
                    <input type="date" name="match_date" placeholder="match_date">
                    <br>
                    <input type="submit" value="Submit" name="form_submit">
             
                </form>
            </div>
			 <a href="user.php"> user account </a><br>
        </div>

</body>


</html>