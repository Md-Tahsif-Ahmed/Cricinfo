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

			<br><br><br>
			<?php
			$statement = $db->prepare("SELECT * FROM player ORDER BY run DESC");
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			?>
			<div class="row">
				<caption class="text-center"><strong>player state</strong></caption>
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
							foreach($result as $key => $row){
						?>
						<tr>
							<td><?php echo $key + 1; ?></td>
							<td><?php echo $row['player_name']; ?></td>
							<td><?php echo $row['age']; ?></td>
							<td><?php echo $row['country']; ?></td>
							<td><?php echo $row['wicket']; ?></td>
							<td><?php echo $row['run']; ?></td>
							<td><?php echo $row['best']; ?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>

</body>


</html> 