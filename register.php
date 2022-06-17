<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GrapeFruitWebSite</title>

    <!--STYLES-->
    <link rel="stylesheet" href="style/style.css">

    <!--FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

</head>
<body>
    <div class="wrapper">
        <form class="form" method="POST" action="core/signup.php">
            <div class="formInputs">
                <div class="left">
                    <label class="loginText">Логин:</label>
                    <input name="login" type="text" class="loginInput"/>
                    <div class="hl"></div>
                    <label style="<?php if (isset($_SESSION['notSamePswrd'])){echo ';color:red;';} ?>" class="passwordText">Пароль:</label>
                    <input name="password" type="password" class="passwordInput"/>
                    <div class="hl"></div>
                    <label style="<?php if (isset($_SESSION['notSamePswrd'])){echo ';color:red;';unset($_SESSION['notSamePswrd']);} ?>" class="cpasswordText">Подтвердите пароль:</label>
                    <input name="cpassword" type="password" class="cspasswordInput"/>
                    <div class="hl"></div>
                </div>
                <div class="right">
                    <label class="emailText">E-MAIL:</label>
                    <input name="email" type="email" class="emailInput"/>
                    <div class="hl"></div>
                    <label class="full_nameText">Ваше имя:</label>
                    <input name="full_name" type="text" class="full_nameInput"/>
                    <div class="hl"></div>
                    <label class="dateText">Дата рождения:</label>
                    <input name="dateOfBirth" type="date" class="dateInput"/>
                    <div class="hl"></div>
                </div>
            </div>
            <button type="submit">Регистрироваться</button>
            <p>Уже есть аккаунт? <a href="index.php">войдите</a></p>
            <?php
                if(isset($_SESSION['regErr'])){
                    echo "<p style='color:red;'>".$_SESSION['regErr']."</p>";
                    unset($_SESSION['regErr']);
                }
            ?>
        </form>
    </div>
</body>
</html>