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


<body>
	<section>
		<div class="container mt-5">
			<div class="col-md-8 offset-md-6">
				<a href="admin_update.php" class="btn btn-success">Insert State</a>
				<a href="admin_delete.php" class="btn btn-danger">Delete State</a>
				<a href="ad_fix_update.php" class="btn btn-success">insert fixture</a>
				<a href="search.php" class="btn btn-success">Upadate State</a>
				<a href="ad_fix_delete.php" class="btn btn-danger">Delete fixture</a>
			</div>

			<!--<br><br><br>
			<?php
			$statement1= $db->prepare("SELECT * FROM player ORDER BY run DESC");
			$statement1->execute();
			$result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
			
			$statement2 = $db->prepare("SELECT * FROM country ORDER BY run DESC");
			$statement2->execute();
			$result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);

			?>
			<div class="row">
				<caption class="text-center"><strong>player_state</strong></caption>
				<br><br>
				<table class="table">
					<thead>
						<th>SL</th>
						<th>player_name</th>
						<th>age</th>
						<th>country</th>
						<th>wicket</th>
						<th>run</th>
						<th>best</th>
					</thead>
					<tbody>
						<?php
							foreach($result1 as $key => $row){
						?>
						<tr>
							<td><?php echo $key + 1; ?></td>
							<td><?php echo $row['player_name']; ?></td>
							<td><?php echo $row['age']; ?></td>
							<td><?php echo $row['coutry']; ?></td>
							<td><?php echo $row['wicket']; ?></td>
							<td><?php echo $row['run']; ?></td>
							<td><?php echo $row['best']; ?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
				
				<br>
				<table class="table">
					<thead>
						<th>player_name</th>
						<th>run</th>
						<th>country</th>
					</thead>
					<tbody>
						<?php
							foreach($result2 as $key => $row){
						?>
						<tr>
							<td><?php echo $row['player_name']; ?></td>
							<td><?php echo $row['run']; ?></td>
							<td><?php echo $row['country']; ?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>				
				
				
				
				
				
				
				
			</div> 
		-->
		</div>
	</section>

</body>


</html> 