<?php
	require ("conn.php");
	if($_POST["submit"]){
		echo "значение даты передано <br/>";
		$curr_date = $_POST["current-month"];
		$prev_month_date = date("Y-m-d", strtotime($curr_date."-1 months"));
		$prev_year_date = date("Y-m-d", strtotime($curr_date."-1 year"));
		$prev_year_month_date = date("Y-m-d", strtotime($curr_date."-13 months"));
		echo "Дата $curr_date <br/>";
		echo "Дата на месяц раньше $prev_month_date <br/>";
		echo "Дата на год раньше $prev_year_date <br/>";
		echo "Дата на год и месяц раньше $prev_year_month_date <br/>";
	}
	
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