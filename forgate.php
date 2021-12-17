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


if(isset($_POST['submit'])){

    try{
        $country=$_POST['country'];
        $team=$_POST['team'];

        $statement = $db->prepare("select * from login where country=? and team=?");
        $statement->execute(array($country,$team)); 
        $result = $statement->fetch();     

        $num = $statement->rowCount();

        if($num>0) 
        {
            $password = $result[2];
        }
        else
        {
            throw new Exception('Invalid Username and/or password');
        }
    }
    catch(Exception $e) {
        $error_message = $e->getMessage();
    }

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
                <?php
                    if(isset($password)){
                        echo "<h3>Your Password is ".$password." </h3>";
                    }
                ?>
                <form action="" method="POST">
                    <input type="text" name="country" placeholder="country Name">
                        <br>

                    <input type="text" name="team" placeholder="Your favourite team">
                        <br>
                    <input type="submit" name="submit" value="Submit">
                    <br>
                </form>
            </div>
        </div>
    </section>
	
</body>


</html> 