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
        $name=$_POST['name'];
        $password=$_POST['password'];

        $statement = $db->prepare("select * from login where name=? and password=?");
        $statement->execute(array($name,$password)); 
        $result = $statement->fetch();     

        $num = $statement->rowCount();
        // print_r($result[0]); die;

        if($num>0) 
        {
            session_start();
            $_SESSION['name'] = $result[0];
            $_SESSION['type'] = "user";
            header("location: main.php");
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
                if(isset($error_message))
                {
                    echo "<div class='error'>".$error_message."</div>";
                }
                ?>
                <form action="" method="POST">
                    <input type="text" name="name" placeholder="username">
                    <br>

                    <input type="text" name="password" placeholder="password">
                    <br>
                    <input type="submit" name="submit" value="Submit">
                    <br>
                    <a href="forgate.php"> forgate your password? </a><br>
                    <a href="sing_up.php"> Don't have an account? </a> 
                </form>
            </div>
        </div>
    </section>

</body>


</html> 