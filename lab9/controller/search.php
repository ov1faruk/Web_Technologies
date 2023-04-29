<body align = "center">
	<br><h1>Available Packages</h1><br>

	<?php
		include("Connection.php");
		$searchQuery = $_GET['query'];
		$sql = mysqli_query($conn, "SELECT * FROM package WHERE package_name LIKE '$searchQuery%'");
	?>

	<table class="table">
		<tr>
			<th>Package Name</th>
			<th>Shop Name</th>
			<th>Location</th>
			<th>Cost</th>
			<th>Rating</th>

			<?php
				while($row = mysqli_fetch_array($sql))
				{
			?>

			  	<tr align="center">
				  	<td><?php echo $row['package_name'];?></td>
				  	<td><?php echo $row['shop_name'];?></td>
				  	<td><?php echo $row['location'];?></td>
				  	<td><?php echo $row['cost'];?></td>
				  	<td><?php echo $row['score'];?></td>
				  	<td ></td>
			  	</tr>
			
			<?php
				}
			?>
			
		</tr>
	</table>
</body>