<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="style.css">
	<title>Изменение таблицы</title>
</head>
<body>
	<header></header>
	<main>
		<h2>Таблица для изменения</h2>
		<?php
			require ("conn.php");
			$query = "SELECT data_id, data_value, data_value2 FROM table_t;";
			$result = mysqli_query($conn, $query);
			if($result){
				echo "Запрс к Бд выполнен успешно <br/>";
			}
			while($conn->next_result()) $conn->store_result();
			//$row1 = mysqli_fetch_assoc( $result );
			//print_r( $row1 );
			if(mysqli_num_rows($result)>0){
				echo '<form action="post" class="edit-table">';
				// output data of each row
				echo "<table>
								<tr>
									<td class='hidden'>Id</td>
									<td>data_value</td>
									<td>data_value2</td>
								</tr>";
				while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>
										<td class='hidden'>" . $row["data_id"]. "</td>
										<td><input class='input-value' value='" . $row["data_value"]. "'></td>
										<td><input class='input-value' value='" . $row["data_value2"]. "'></td>
									</tr>";
				}
				echo "</table>";
      } else {
          echo "0 results";
      }
		?>
		
		
		<?php echo '</form>';?>
	</main>
</body>
</html>
<?php
?>