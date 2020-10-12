<?php
	if ($_POST){
		echo "Переменная POST существует";
	}
	else{
		echo "Переменная POST не существует";
	}
	if(isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		echo "$username";
	}
	else{
		echo "Данные формы не переданы";
	}
?>