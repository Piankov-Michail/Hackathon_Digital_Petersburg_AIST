<?php
    session_start();
    require "admin/config.php";
    require "head.php";
    require "header.php";
    if ($_SESSION['is_login'] != TRUE){
?>
<section class="auto">
<form action="lk.php" class="form__auto" method="POST"> 
    <div class = "input_container">
        <h2>Авторизация</h2><br><br>
        <div class="login__box">
            <p class="form_auto_label">Логин</p>
            <input type="text" placeholder="Введите логин" name="login" autocomplete="off" required>      
        </div>
        <div class="password_box">
            <p class="form_auto_label">Пароль</p>
            <input type="password" placeholder="Введите пароль" name="password" autocomplete="off" required>
        </div>
        <input id='auto_button' type="submit" value="Войти" class="sb" name="sub">
        <br><br><a href="reg.php">Регистрация</a>
    </div>
</form> 
</section>
<?php
    }else{
        header("Location:/lk.php");
    }
?>