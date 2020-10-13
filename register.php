<?php
		
    if ($_POST){
    	echo "Переменная POST существует";
				}
    else{
    	echo "Переменная POST не существует";
				}
    require ("conn.php");
		//$conn=mysqli_connect("localhost", "user1", "123456", "wt");
		if($conn){
			echo "Подключение установлено ";
		}
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        echo "$username";
        $query = "INSERT INTO users (user_login, user_password) VALUES ('$username', '$password')";
        $result = mysqli_query($conn, $query);
        if($result){
            echo "Регистрация прошла успешно";
        }
        else{
            echo "Ошибка";
        }
    }
    else{
    	echo "Данные формы не переданы";
				}
?>