  <?php
include "header.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cricinfo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}





	if(isset($_POST['form_submit'])){
			$player_name=$_POST['player_name'];  
			$age=$_POST['age'];
			$wicket=$_POST['wicket'];
			$run=$_POST['run'];
			
	}

$sql = "update player set age ='$age',wicket ='$wicket', run ='$run' where player_name ='$player_name'";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?> 





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
                    <input type="text" name="age" placeholder="age">
                    <br>
                    <input type="text" name="wicket" placeholder="wicket">
                    <br>
                    <input type="text" name="run" placeholder="run">
                    <br>

                    <input type="submit" value="Submit" name="form_submit">
                </form>
            </div>
             <a href="user.php"> user account </a><br>
        </div>
	  </section>

  </body>
</html>