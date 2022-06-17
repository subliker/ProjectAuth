<?php
    session_start();
    require('connect.php');
    
    $login = $_POST['login'];
    $full_name = $_POST['full_name'];
    $cpassword = $_POST['cpassword'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $dateOfBirth = $_POST['dateOfBirth'];

    if ($cpassword === $password){
        $password = password_hash($password,PASSWORD_BCRYPT);
        $uploadData = mysqli_query($connect,"INSERT INTO `users` (`id`, `full_name`, `login`, `password`, `date`, `email`) VALUES (NULL, '$full_name', '$login', '$password', '$dateOfBirth', '$email')");
        header('Location: ../index.php');
    }
    else{
        $_SESSION['regErr'] = 'Пароли не сопадают';
        $_SESSION['notSamePswrd'] = true;

        header('Location: ../register.php');
    }
?>