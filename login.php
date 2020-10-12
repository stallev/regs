<?php
	session_start();
	function check($login, $password){
		//echo md5("1234567");
		$conn=mysqli_connect("localhost", "user1", "123123", "reg");
		//извлекаем зашифрованный пароль из БД
		$query = mysqli_query($conn,"SELECT user_id, user_password FROM users WHERE user_login='".mysqli_real_escape_string($conn,$login)."' LIMIT 1");
		$userInfo = mysqli_fetch_assoc($query);
		$userPassword = $userInfo['user_password'];
		//сравниваем извлеченный из БД и введенный нами
		if($password==$userPassword) return true;
		else{
			echo "Неверный пароль. ";
		}
	}
	if(isset($_POST["login-submit"])){
		$login = trim($_POST["log-username"]);
		$password = md5(trim($_POST["log-password"]));
		if(check($login, $password)){
			setcookie("login", $login);
			setcookie("password", $password);
		}
		else{
			echo "Вы ввели неверные данные <br/>";
		}
	}
	function displayLogin(){
		$login = $_COOKIE["login"];
		echo "Приветствуем Вас, $login <br/>";
	}
	displayLogin();
	if(isset($_SESSION['name'])) $name = $_SESSION['name'];
	else $_SESSION['name'] = 'plem';
	echo $name;
?>