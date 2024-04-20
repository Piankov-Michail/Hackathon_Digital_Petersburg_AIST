<?php
    session_start();
    require "admin/config.php";
    require "head.php";
    require "header.php";
    if (isset($_POST['unlogin'])){
        $_SESSION['is_login'] = FALSE;
    }
    if ($_SESSION['is_login'] != TRUE){
        $inputed_login = $_POST["login"];
        $inputed_password = md5($_POST["password"]);
        $log = mysqli_fetch_assoc(mysqli_query($database,"SELECT * FROM `Profiles` WHERE `login` LIKE '$inputed_login'"));
        if ($log){
            $password_is_true = $log['password'];
            if ($inputed_password == $password_is_true){
                $_SESSION['is_login'] = TRUE;
                $_SESSION['id'] = $log['id'];
            }
        }
    }
    if ($_SESSION['is_login'] == TRUE){
        $id = $_SESSION['id'];
        $info_profile = mysqli_fetch_assoc(mysqli_query($database,"SELECT * FROM `Profiles` WHERE `id` LIKE '$id'"));
        $name = $info_profile['name'];
        $login = $info_profile['login'];
        $surname = $info_profile['surname'];
?>
<section class="lk_section">
    <h1 class="lk_title">
        Личный кабинет
    </h1>
    <div class="my_info">
        <div class="my_info__login">
            <span>Логин:</span>
            <?=$login?>
        </div>    
        <div class="my_info__name">
            <span>Имя:</span>
            <?=$name?>
        </div>
        <div class="my_info__surname">
            <span>Фамилия:</span>
            <?=$surname?>
        </div>
    </div>
    <div class="unlog">
        <form action="" method="POST">
            <input type="submit" name="unlogin" value="Выйти">
        </form>
    </div>
</section>
<?php
    }else{
        header("Location:/auto.php");
    }
?>