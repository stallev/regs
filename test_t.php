<?php
	require ("conn.php");
	if($_POST["submit"]) {
		echo "значение даты передано <br/>";
		$curr_date = $_POST["current-month"];
		$prev_month_date = date("Y-m-d", strtotime($curr_date . "-1 months"));
		$prev_year_date = date("Y-m-d", strtotime($curr_date . "-1 year"));
		$prev_year_month_date = date("Y-m-d", strtotime($curr_date . "-13 months"));
		echo "Дата $curr_date <br/>";
		echo "Дата на месяц раньше $prev_month_date <br/>";
		echo "Дата на год раньше $prev_year_date <br/>";
		echo "Дата на год и месяц раньше $prev_year_month_date <br/>";
	}
?>