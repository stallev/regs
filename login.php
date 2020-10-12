<?php
	session_start();
	function check($login, $password){
		if($login=="user" && $password=="1234567") return true;
		elseif ($login!="user"){
			echo "неверный логин <br/>";
			return false;
		}
		elseif ($login!="1234567"){
			echo "неверный пароль  <br/>";
			return false;
		}
	}
	if(isset($_POST["login-submit"])){
		$login = $_POST["log-username"];
		$password = $_POST["log-password"];
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