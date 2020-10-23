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
	$queryCreateTempTables = "
	CREATE TEMPORARY TABLE IF NOT EXISTS mes_temp_cur_y_test AS (
		SELECT
		m.Rn, m.Hoz, m.Data, m.Tel_Ws, m.Tel_Kor, m.Rast_Kor, m.Rast_Net, m.Sl_Ws, m.Sl_Tel, m.Mr_Kor, m.Mr_Net, m.Ab_Kor, m.Ab_Net, m.Ab_Ws
		FROM mes m
		JOIN nahoz nh ON m.Hoz=nh.Hoz
		JOIN narn r ON m.Rn=r.Rn
		WHERE m.Data ='$curr_date');
	CREATE TEMPORARY TABLE IF NOT EXISTS mes_temp_prev_y_test AS (
		SELECT
		m.Rn, m.Hoz, m.Data, m.Tel_Ws, m.Tel_Kor, m.Rast_Kor, m.Rast_Net, m.Sl_Ws, m.Sl_Tel, m.Mr_Kor, m.Mr_Net, m.Ab_Kor, m.Ab_Net, m.Ab_Ws
		FROM mes m
		JOIN nahoz nh ON m.Hoz=nh.Hoz
		JOIN narn r ON m.Rn=r.Rn
		WHERE m.Data ='$prev_year_date');
	CREATE TEMPORARY TABLE IF NOT EXISTS mes_temp_prev_m_test AS (
		SELECT
		m.Rn, m.Hoz, m.Data, m.Tel_Ws, m.Tel_Kor, m.Rast_Kor, m.Rast_Net, m.Sl_Ws, m.Sl_Tel, m.Mr_Kor, m.Mr_Net, m.Ab_Kor, m.Ab_Net, m.Ab_Ws
		FROM mes m
		JOIN nahoz nh ON m.Hoz=nh.Hoz
		JOIN narn r ON m.Rn=r.Rn
		WHERE m.Data ='$prev_month_date');
	CREATE TEMPORARY TABLE IF NOT EXISTS mes_temp_prev_pym_test AS (
		SELECT
		m.Rn, m.Hoz, m.Data, m.Tel_Ws, m.Tel_Kor, m.Rast_Kor, m.Rast_Net, m.Sl_Ws, m.Sl_Tel, m.Mr_Kor, m.Mr_Net, m.Ab_Kor, m.Ab_Net, m.Ab_Ws
		FROM mes m
		JOIN nahoz nh ON m.Hoz=nh.Hoz
		JOIN narn r ON m.Rn=r.Rn
		WHERE m.Data ='$prev_year_month_date');
	CREATE TEMPORARY TABLE IF NOT EXISTS mes_temp_summary_test AS (
		SELECT
		mpy.Rn as RnID, mpy.Hoz as Hoz, nrn.narnazv as RnName, hoz.nazvhoz as HozName,
		 COALESCE(mcy.Tel_Ws, 0) as 'mcy.Tel_Ws', COALESCE(mcy.Tel_Kor, 0) as 'mcy.Tel_Kor', COALESCE(mcy.Rast_Kor, 0) as 'mcy.Rast_Kor', COALESCE(mcy.Rast_Net, 0) as 'mcy.Rast_Net', COALESCE(mcy.Sl_Ws, 0) as 'mcy.Sl_Ws', COALESCE(mcy.Sl_Tel, 0) as 'mcy.Sl_Tel', COALESCE(mcy.Mr_Kor, 0) as 'mcy.Mr_Kor', COALESCE(mcy.Mr_Net, 0) as 'mcy.Mr_Net', COALESCE(mcy.Ab_Kor, 0) as 'mcy.Ab_Kor', COALESCE(mcy.Ab_Net, 0) as 'mcy.Ab_Net', COALESCE(mcy.Ab_Ws, 0) as 'mcy.Ab_Ws',
		 COALESCE(mpy.Tel_Ws,0)  as 'mpy.Tel_Ws', COALESCE(mpy.Tel_Kor,0) as 'mpy.Tel_Kor', COALESCE(mpy.Rast_Kor,0) as 'mpy.Rast_Kor', COALESCE(mpy.Rast_Net,0) as 'mpy.Rast_Net', COALESCE(mpy.Sl_Ws,0) as 'mpy.Sl_Ws', COALESCE(mpy.Sl_Tel,0) as 'mpy.Sl_Tel', COALESCE(mpy.Mr_Kor,0) as 'mpy.Mr_Kor', COALESCE(mpy.Mr_Net,0) as 'mpy.Mr_Net', COALESCE(mpy.Ab_Kor,0) as 'mpy.Ab_Kor', COALESCE(mpy.Ab_Net,0) as 'mpy.Ab_Net', COALESCE(mpy.Ab_Ws,0) as 'mpy.Ab_Ws',
		 COALESCE(mpm.Tel_Ws, 0) as 'mpm.Tel_Ws', COALESCE(mpm.Tel_Kor, 0) as 'mpm.Tel_Kor', COALESCE(mpm.Rast_Kor, 0) as 'mpm.Rast_Kor', COALESCE(mpm.Rast_Net, 0) as 'mpm.Rast_Net', COALESCE(mpm.Sl_Ws, 0) as 'mpm.Sl_Ws', COALESCE(mpm.Sl_Tel, 0) as 'mpm.Sl_Tel', COALESCE(mpm.Mr_Kor, 0) as 'mpm.Mr_Kor', COALESCE(mpm.Mr_Net, 0) as 'mpm.Mr_Net', COALESCE(mpm.Ab_Kor, 0) as 'mpm.Ab_Kor', COALESCE(mpm.Ab_Net, 0) as 'mpm.Ab_Net', COALESCE(mpm.Ab_Ws, 0) as 'mpm.Ab_Ws',
		 COALESCE(mpym.Tel_Ws, 0) as 'mpym.Tel_Ws', COALESCE(mpym.Tel_Kor, 0) as 'mpym.Tel_Kor', COALESCE(mpym.Rast_Kor, 0) as 'mpym.Rast_Kor', COALESCE(mpym.Rast_Net, 0) as 'mpym.Rast_Net', COALESCE(mpym.Sl_Ws, 0) as 'mpym.Sl_Ws', COALESCE(mpym.Sl_Tel, 0) as 'mpym.Sl_Tel', COALESCE(mpym.Mr_Kor, 0) as 'mpym.Mr_Kor', COALESCE(mpym.Mr_Net, 0) as 'mpym.Mr_Net', COALESCE(mpym.Ab_Kor, 0) as 'mpym.Ab_Kor', COALESCE(mpym.Ab_Net, 0) as 'mpym.Ab_Net', COALESCE(mpym.Ab_Ws,0) as 'mpym.Ab_Ws'
		FROM mes_temp_prev_y mpy
		LEFT JOIN mes_temp_cur_y mcy
			ON mpy.Hoz=mcy.Hoz
		LEFT JOIN mes_temp_prev_m mpm
			ON mpy.Hoz=mpm.Hoz
		LEFT JOIN mes_temp_prev_pym mpym
			ON mpy.Hoz=mpym.Hoz
		LEFT JOIN narn nrn
			ON mpy.Rn=nrn.Rn
		LEFT JOIN nahoz hoz
			ON mpy.Hoz=hoz.Hoz);
	";
	$query = "SELECT * FROM mes_temp_summary_test";
	//создаем временные таблицы
	mysqli_multi_query($conn, $queryCreateTempTables);
	//В случае же, когда процедура возвращает таблицу, вторичный результат тоже надо вытянуть, иначе буфер результатов останется неочищенным и остальные запросы не пройдут — не смогут туда написать.
	while($conn->next_result()) $conn->store_result();
	$result = mysqli_query( $conn, $query );
	$row = mysqli_fetch_assoc( $result );
	print_r( $row );
	/* удаление выборки */
	mysqli_free_result( $result );
	
	/* закрытие соединения */
	mysqli_close($conn);
?>