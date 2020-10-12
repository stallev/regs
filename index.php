<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>TEST</title>
</head>
<body>
    <div class="container">
        <form action="register.php" method="post" class="register-form">
            <div class="form-item">
                <label for="username">Логин</label>
                <input type="text" name="username">
            </div>
            <div class="form-item">
                <label for="password">Пароль</label>
                <input type="password" name="password">
            </div>
            <div class="form-item">
                <input class="register-form__submit" type="submit" value="Зарегистрировать">
            </div>
        </form>
    </div>
    <div class="container">
        <h3>Форма входа</h3>
        <form action="login.php" method="post" class="login-form">
            <div class="form-item">
                <label>Логин</label>
                <input type="text" name="log-username">
            </div>
            <div class="form-item">
                <label >Пароль</label>
                <input type="password" name="log-password">
            </div>
            <div class="form-item">
                <input class="register-form__submit" type="submit" value="Войти" name="login-submit">
            </div>
        </form>
    </div>
    <div class="container">
        <h3>Форма выхода</h3>
        <div class="logout">
            <form action="logout.php" class="logout-form">
                <input type="submit" name="logout" value="Выйти">
            </form>
        </div>
    </div>
</body>
</html>