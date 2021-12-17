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
                    <input type="text" name="name" placeholder="username">
                    <br>
                    <input type="text" name="email" placeholder="email">
                    <br>
                    <input type="text" name="pass" placeholder="password">
                    <br>
                    <input type="text" name="country" placeholder="country">
                    <br>
                    <input type="text" name="team" placeholder="team">
                    <br>
                    <input type="submit" value="Submit" name="form_submit">
                    <br>
                </form>
            </div>
        </div>
    </section>

    <?php

    if(isset($_POST['form_submit'])){
        $name=$_POST['name'];

        $email=$_POST['email'];

        $pass=$_POST['pass'];
        $country=$_POST['country'];
        $team=$_POST['team'];


        $statement = $db->prepare("INSERT INTO login (name,email,password,country,team) VALUES (?,?,?,?,?)");
        $statement->execute(array($name, $email, $pass, $country, $team));

    }

    ?>

</body>


</html>