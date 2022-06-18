<?php
    session_start();
    require('connect.php');
    
    $login = $_POST['login'];
    $full_name = $_POST['full_name'];
    $cpassword = $_POST['cpassword'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $dateOfBirth = $_POST['dateOfBirth'];

    $isSamePswrd = $cpassword === $password;
    $isRightPassword = strlen($password) >= 6;
    $isUniqueLogin = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM `users` WHERE `login` = '$login'"))?false:true;
    $isUniqueEmail = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM `users` WHERE `email` = '$email'"))?false:true;

    $registrationStatus = $isSamePswrd & $isRightPassword & $isUniqueLogin & $isUniqueEmail;

    if ($registrationStatus){
        $password = password_hash($password,PASSWORD_BCRYPT);
        $uploadData = mysqli_query($connect,"INSERT INTO `users` (`id`, `full_name`, `login`, `password`, `date`, `email`) VALUES (NULL, '$full_name', '$login', '$password', '$dateOfBirth', '$email')");
        header('Location: ../index.php');
    }
    else{
        $_SESSION['regErr'] = '';
        if(!$isSamePassword){
            $_SESSION['regErr'] .= 'Пароли не сопадают</br>';
            $_SESSION['notSamePassword'] = true;
        }
        if(!$isRightPassword){
            $_SESSION['regErr'] .= 'Пароль не соответсвует требованиям</br>';
            $_SESSION['notRightPassword'] = true;
        }
        if(!$isUniqueLogin){
            $_SESSION['regErr'] .= 'Такой логин уже используется</br>';
            $_SESSION['notUniqueLogin'] = true;
        }
        if(!$isUniqueEmail){
            $_SESSION['regErr'] .= 'Такая почта уже используется</br>';
            $_SESSION['notUniqueEmail'] = true;
        }
        header('Location: ../register.php');
    }
?>