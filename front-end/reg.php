<?php
    session_start();
    require "admin/config.php";
    require "head.php";
    require "header.php";
    if ($_SESSION['is_login'] != TRUE){
?>
<section class="reg">
<form action="reg__process.php" class="form__reg" method="POST">
        <h2>Регистрация</h2><br>
        <div class="login__box">
            <p class="form_auto_label">Логин</p>
            <input type="text" placeholder="Введите логин" name="login" autocomplete="off" required>        
        </div>
        <div class="login__box">
            <p class="form_auto_label">Имя</p>
            <input type="text" placeholder="Введите логин" name="name" autocomplete="off" required>        
        </div>
        <div class="login__box">
            <p class="form_auto_label">Фамилия</p>
            <input type="text" placeholder="Введите логин" name="surname" autocomplete="off" required>        
        </div>
        <div class="password_box">
            <p class="form_auto_label">Пароль</p>
            <input type="password" placeholder="Введите пароль" name="password" autocomplete="off" required>
        </div>
        <div class="password_box">
            <p class="form_auto_label">Повторите пароль</p>
            <input type="password" placeholder="Введите пароль" name="password__sec" autocomplete="off" required>
        </div>
        <br><input id="reg_button" type="submit" value="Зарегистрироваться" class="sb" name="sub"><br><br>
        <a href="auto.php">Уже есть аккаунт</a>
</form>  
</section>
<?php
    }else{
        header("Location:/lk.php");
    }
?>