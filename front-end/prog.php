<?php
    session_start();
    require "admin/config.php";
    require "head.php";
    require "header.php";
    $proffesia = $_POST['city'];
    $query = mysqli_query($database, "SELECT * FROM `Programs` WHERE `Profession` LIKE '$proffesia' ORDER BY `Hours` DESC");
?>
<section class="prog_sec">
<form action="" method="POST" class="prog__form">
<p>Введите желаемую профессию</p>
<input name="city" list="cities" placeholder="Профессия..."/>
<datalist id="cities">
   <option value="Backend developer"/>
   <option value="Backend-разработчик"/>
   <option value="BI аналитик"/>
   <option value="Data Analyst"/>
   <option value="Data Engineer"/>
   <option value="Data Scientist"/>
   <option value="Data Scientist ML"/>
   <option value="DevOps"/>
   <option value="DevOps инженер"/>
   <option value="Frontend developer"/>
   <option value="Frontend-разработчик"/>
   <option value="Fullstack-разработчик"/>
   <option value="IT Project Manager"/>
   <option value="Machine Learning Engineer"/>
   <option value="Project Manager"/>
   <option value="Аналитик"/>
   <option value="Аналитик данных"/>
   <option value="Бизнес-аналитик"/>
   <option value="Инженер"/>
   <option value="Инженер данных"/>
   <option value="Менеджер IT-проектов"/>
   <option value="Менеджер проектов"/>
   <option value="Программист"/>
   <option value="Разработчик"/>
   <option value="Руководитель IT-проектов"/>
   <option value="Сетевой администратор"/>
   <option value="Сетевой инженер"/>
   <option value="Системный администратор"/>
   <option value="Системный аналитик"/>
   <option value="Системный инженер"/>
   <option value="Тестировщик"/>
   <option value="Технический писатель"/>
</datalist>
<input type="submit" name="sub">
</form>
<div class="prof_blocks">
    <?php
    while($row = $query->fetch_assoc())
    {
        $hours = $row['Hours'];
        $napr = $row['Program'];
        $prof = $row['Profession'];
    ?>
    <div class="prof_block">
        <div class="first__prof__block">
            <div class="name_prof">
                <span>Название профессии: <?=$prof?></span> 
            </div>
            <div class="name_programm">
                <span>Программа: <?=$napr?></span>
            </div>
        </div>
        <div class="count_hours">
            <span>Часы профильных дисциплин:</span>
            <?=$hours?>
        </div>
    </div>
    <?php
    }
    ?>
</div>
</section>
</body>