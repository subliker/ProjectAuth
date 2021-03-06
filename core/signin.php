<?php
    session_start();
    require('connect.php');
    
    $loginOrEmail = $_POST['loginOrEmail'];
    $lOEtype = filter_var($loginOrEmail,FILTER_VALIDATE_EMAIL)?'email':'login';
    $password = $_POST['password'];

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `$lOEtype` = '$loginOrEmail'");
    if(mysqli_num_rows($check_user)){
        $userData = mysqli_fetch_assoc($check_user);

        $hashedPassword = $userData['password'];
        if(password_verify($password,$hashedPassword)){
            $_SESSION['activeUser'] = [
                'id' => $userData['id'],
                'login' => $userData['login'],
                'full_name' => $userData['full_name'],
                'date' => $userData['date'],
                'email' => $userData['email'],
                'avatar' => $userData['avatar']
            ];
            header("Location: ../profile.php");
        }
        else{
            $_SESSION['authErr']='Неправильный логин или пароль';
            header("Location: ../index.php");
        }
        
    }else{
        $_SESSION['authErr']='Неправильный логин или пароль';
        header("Location: ../index.php");
    }
?>