<?php
    session_start();
    require "admin/config.php";
    require "head.php";
    $login = $_POST["login"];
    $login_is_correct = mysqli_fetch_assoc(mysqli_query($database,"SELECT * FROM `Profiles` WHERE `login` LIKE '$login'"));
    if (!$login_is_correct){
        $password = $_POST['password'];
        $password_second = $_POST['password__sec'];
        if ($password == $password_second){
            if (strlen($password >= 6) ){
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $password = md5($password);
                mysqli_query($database, "INSERT INTO `Profiles` (`id`, `login`, `password`, `name`, `surname`) VALUES (NULL, '$login', '$password', '$name', '$surname');");
                $id = mysqli_fetch_assoc(mysqli_query($database,"SELECT * FROM `Profiles` WHERE `login` LIKE '$login'"))['id'];
                $_SESSION['id'] = $id;
                $_SESSION['is_login'] = TRUE;
                header("Location:/lk.php");
            }else{
                header("Location:/reg.php");
            } 
        }else{
            header("Location:/reg.php");
        }
    }else{
        header("Location:/reg.php");
    }
?>