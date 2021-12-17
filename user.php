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


if(isset($_POST['name'])){
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