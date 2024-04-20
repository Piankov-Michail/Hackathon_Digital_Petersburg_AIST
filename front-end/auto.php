<?php
    session_start();
    require "admin/config.php";
    require "head.php";
    require "header.php";
    if ($_SESSION['is_login'] != TRUE){
?>
<form action="lk.php" class="form__auto" method="POST"> 
        <div class="login__box">
            <p class="form_auto_label">Логин</p>
            <input type="text" placeholder="Введите логин" name="login" autocomplete="off" required>        
        </div>
        <div class="password_box">
            <p class="form_auto_label">Пароль</p>
            <input type="password" placeholder="Введите пароль" name="password" autocomplete="off" required>
        </div>
        <input type="submit" value="Войти" class="sb" name="sub">
        <a href="reg.php">Регистрация</a>
</form> 
<?php
    }else{
        header("Location:/lk.php");
    }
?>