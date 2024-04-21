<?php
    session_start();
    require "admin/config.php";
    require "head.php";
    require "header.php";
    $count_balls = $_POST['balls'];
    #$count_drinks = mysqli_fetch_assoc(mysqli_query($database,"SELECT count(*) FROM mytable WHERE `Балл` <= $count_balls"))['count(*)'];
    $quer = mysqli_query($database, "SELECT * FROM `mytable` WHERE `Балл` <= $count_balls ORDER BY `Балл` ASC");
    ?>
    <section class="calculator">
        <div class="form__calc">
            <form action="" method="POST">
                <div class="form_input">
                <p>Ваши баллы ЕГЭ</p>
                    <input type="text" placeholder="Ваши баллы" name="balls">
                </div>
                <input type="submit" name="sub">
            </form>
        </div>
        <div class="naprs">
    <?php
    while($row = $quer->fetch_assoc())
    {
        #var_dump($row);
        $napr = $row['Направление'];
        $ball = $row['Балл'];
        $count_b = $row['КЦП_Б'];
        $count_k = $row['КЦП_К'];
        $plata = $row['Цена'];
        $conc_k = $row['Конкурс_К'];
        $conc_b = $row['Конкурс_Б'];
        ?>
        <div class="form__napr">
            <div class="first_data">
            <div class="name__etu">
                Санкт-Петербургский государственный электротехнический университет «ЛЭТИ»
            </div>
            <div class="napr_info">
                <div class="napravlenie">
                    <div class="name_napr">
                        <?=$napr?>
                    </div>
                </div>
                <div class="prohodnoy_ball">
                    <span>Проходной балл</span>
                    <?=$ball?>
                </div>
            </div>
            </div>
            <div class="info_count">
                <div class="plata">
                    <span>Стоимость</span>
                    <?=$plata?> ₽
                </div> 
                <div class="count__mest">
                    <div class="count__mest__budzhet">
                        <div class="all_count">
                            <span>Количество бюджетных мест</span>
                            <?=$count_b?>
                        </div>
                        <div class="count_on_mesto">
                            <span>Конкурс на место</span>
                            <?=$conc_b?>
                        </div>
                    </div>
                    <div class="count__mest__budzhet">
                        <div class="all_count">
                            <span>Количество контрактных мест</span>
                            <?=$count_k?>
                        </div>
                        <div class="count_on_mesto">
                            <span>Конкурс на место</span>
                            <?=$conc_k?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="img__box">
                <img src="assets/img/leti.jpg" alt="" class="img_leti">
            </div>
        </div>
        <?php
    }
?>
</div>
</section>
</body>