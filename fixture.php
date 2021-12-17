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
			$statement = $db->prepare("SELECT * FROM game ORDER BY match_date DESC");
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			?>
			<div class="row">
				<caption class="text-center"><strong>fixture</strong></caption>
				<br><br>
				<table class="table">
					<thead>
						<th>SL</th>
						<th>match_date</th>
						<th>team1</th>
						<th>vs</th>
						<th>team2</th>
						<th>formate</th>
					</thead>
					<tbody>
						<?php
							foreach($result as $key => $row){
						?>
						<tr>
							<td><?php echo $key + 1; ?></td>
							<td><?php echo $row['match_date']; ?></td>
							<td><?php echo $row['team1']; ?></td>
							<td><?php echo $row['vs']; ?></td>
							<td><?php echo $row['team2']; ?></td>
							<td><?php echo $row['formate']; ?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>

</body>


</html> 