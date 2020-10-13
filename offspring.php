<?php
	require ("conn.php");
	$query = "select
				tm.narnazv,
				SUM(tm.Tel_Ws_cy) as 'Приплод за отчетный месяц с нарастающим',
				SUM(tm.Tel_Ws_cy-tm.Tel_Ws_pm) as 'Приплод за отчетный месяц',
				SUM(tm.Tel_Ws_py) as 'Приплод за прошлый год за отчетный месяц с нарастающим',
				SUM(tm.Tel_Ws_py-tm.Tel_Ws_pym) as 'Приплод за прошлый год за отчетный месяц'
			FROM mes_temp_summary tm
			GROUP BY tm.narnazv";
	$result = mysqli_query($conn, $query);
	$result_arr = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="style.css">
    <title>Приплод</title>
</head>
<body>
	<div class="container">
		<div class="output">
			<?php
				if (mysqli_num_rows($result) > 0) {
					// output data of each row
					echo "<table>
          <tr>
            <td>Район</td>
            <td class='value-cell'>Приплод за отчетный месяц с нарастающим</td>
            <td class='value-cell'>Приплод за отчетный месяц </td>
            <td class='value-cell'>Приплод за прошлый год за отчетный месяц с нарастающим</td>
            <td class='value-cell'>Приплод за прошлый год за отчетный месяц </td>
        </tr>";
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>
										<td class='district-name'>" . $row['narnazv']. "</td>
										<td class='value-cell'>" . $row['Приплод за отчетный месяц с нарастающим']. "</td>
										<td class='value-cell'>" . $row['Приплод за отчетный месяц']. "</td>
										<td class='value-cell'>" . $row['Приплод за прошлый год за отчетный месяц с нарастающим']. "</td>
										<td class='value-cell'>" . $row['Приплод за прошлый год за отчетный месяц']. "</td>
									</tr>";
					}
				} else {
					echo "0 results";
				}
				echo "<br/>";
			?>
		</div>
	</div>
</body>
</html>