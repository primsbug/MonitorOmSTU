
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <!--        //Ссылка данной страницы-->
    <title> Курсовая </title>
    <!--        // Название вкладки-->
</head>
<style>
    a:hover {                           /* Оформление взаимодействия пользователя со ссылкой */
        border-bottom: 1px solid;
        background: #615ce3;
    }

    a:focus {                           /* Оформление взаимодействия пользователя со ссылкой */
        border-bottom: 1px solid;
        background: #615ce3;
    }
</style>
<body>
    <header>
        <div class="logo">
            <!--         // Класс logo для блока с названием сайта-->
            <a class="h" href="index.php">MonitorOmSTU</a>
            <!--         // Ссылка при нажатии на название с классом h-->
        </div>
        <div class="menu">
            <!--         // Класс menu для блока навигации-->
            <ul>
                <li><p></p></li>
            </ul>
        </div>
        <div>
            <!--         // Блок с ссылками в навигационной панели  -->
            <a class = "log" href="rating.php">Рейтинг</a>
            <a class = "log" href="About_us.html">О нас</a>
            <a class = "log" href="structure.html">Структура работы</a>
        </div>
    </header>
    <fieldset class="card" style="padding-bottom: 5px; padding-top: 5px;">
        <!--         // Поле для текста с классом card-->
        <p class="card-text" style="text-indent: 30px;">MonitorOmSTU - сайт, который мы разработали для того чтобы упростить
            анализ учебной деятельности ОмГТУ. Данный сайт даёт каждому желающему доступ к информации об учебной деятельности нашего вуза.
            Мы надеемся, что наш проект помог вам!</p>
        <!--            // Класс card-text для оформления текста-->
        <a href="https://omgtu.ru/"><img src="img/logotip.png" class="model" alt="Картинка в отпуске" style="width: 200px; height: 200px; display: block; margin: 5px auto 1px;"></a>
    </fieldset>
</body>
</html>