<?php
$connect = mysqli_connect($hostname= 'localhost', $username = 'root',
    $password ='', $database ='kurs');    // Подключение к БД

if(!$connect) {    // Проверкаа успешного подключения к БД
    die('Error');
}
require_once 'connect.php';   // Ссылка на файл с подключением к БД

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
        <!--        //Ссылка данной страницы и файла css-->
        <title> Курсовая </title>
        <!--        // Название вкладки-->
    </head>
    <style>

        h3 {
            margin: 5px;      /* Оформление заголовков */
        }

        .bdl {                  /* Оформление блока с таблицами рейтинга вуза */
            display: block;
            padding: 20px;
            background-color: #fff;
            box-shadow:  0 10px 15px #1a1717;
            border-radius: 30px;
            border-color: #1a1717;
            width: 280px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .bd {                       /* Оформление блока с таблицами рейтинга факультетов */
            display: inline-block;
            padding: 20px;
            background-color: #fff;
            box-shadow:  0 10px 15px #1a1717;
            border-radius: 30px;
            border-color: #1a1717;
            width: 850px;
            margin-left: 50px;
            margin-right: 49px;
            margin-bottom: 10px;
            margin-top: 10px;
        }

        table {                                 /* Оформление таблицы */
            font-family: Courier, monospace;
            font-size: 14px;
            border-radius: 10px;
            border-spacing: 0;
            text-align: center;
            margin: 0px;
        }

        th {                        /* Оформление заголовочных ячеек таблицы */
            background: #1a1717;
            color: white;
            text-shadow: 0 1px 1px #2D2020;
            padding: 10px 20px;
        }

        th, td {                    /* Оформление заголовочных и обычных ячеек таблицы */
            border-style: solid;
            border-width: 0 1px 1px 0;
            border-color: whitesmoke;
        }

        th:first-child {            /* Оформление первой заголовочной ячейки таблицы */
            border-top-left-radius: 10px;
        }

        th:last-child {             /* Оформление последней заголовочной ячейки таблицы */
            border-top-right-radius: 10px;
            border-right: none;
        }

        td {                        /* Оформление обычных ячеек таблицы */
            padding: 10px 20px;
            background: #95928f;
        }

        tr:last-child td:first-child {         /* Оформление контейнеров ячеек таблицы */
            border-radius: 0 0 0 10px;
        }

        tr:last-child td:last-child {           /* Оформление контейнеров ячеек таблицы */
            border-radius: 0 0 10px 0;
        }

        tr td:last-child {                      /* Оформление контейнеров ячеек таблицы */
            border-right: none;
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
        <fieldset class="rate">
            <!--         // Поле для текста с классом rate-->
            <p class="card-text" style="text-indent: 30px;">   На данной странице вы можете изучить рейтинг отдельно взятого факультета
            и вуза в целом. Расчеты рейтинга вуза производились по специальной формуле: avgR = avgR1 + avgR2 + avgR3 +
            avgR4 + avgR5 + avgR6, где avgR[i] - среднее значение рейтинга каждого факультета вуза. Данное
            значение рассчитывалось из следующих показателей: avgM, avgOS и avgD, которые значат среднее
                арифметическое значение оценок, среднее арифметическое значение зачётов и среднее арифметическое значение
                балла дипломов выпускников за последний год соответственно.
            </p>
        </fieldset>
            <div class = "bd">
                <!--         // Блок для таблиц с рейтингом факультета с классом bd  -->
                <table>
                    <caption>
                        <h3>Информация об учебной деятельности факультета ФЭСиУ</h3>
                        <!--         // Заголовок таблицы-->
                    </caption>
                    <tr>
                        <!--         // Заголовочные ячейки таблицы-->
                        <th>╳</th>
                        <th>Среднее значение оценок</th>
                        <th>Среднее значение зачетов</th>
                        <th>GPA за последний год</th>
                        <th>Рейтинг факультета</th>
                    </tr>

                    <?php   // Код php для выборки данных из БД
                    $marks_fasiu = mysqli_query($connect,"SELECT * FROM `marks_fasiu`"); // Создание переменной $marks_fasiu для данных о факутьтете ФЭСиУ и запрос на подключение к БД
                    $marks_fasiu = mysqli_fetch_all($marks_fasiu); // Выборка всех строк из результирующего набора и помещаение их в ассоциативный массив
                    foreach ($marks_fasiu as $marks_fasiu){  // Перебор массива
                        $avgM = round(($marks_fasiu[0] * 5 + $marks_fasiu[1] * 4 + $marks_fasiu[2] * 3 + $marks_fasiu[3] * 2)/$marks_fasiu[6], 1); // Переменная для вычисления среднего значения оценок
                        $avgOS = round((2422 * 5)/2458,1); // Переменная для вычисления среднего значения зачетов
                        $avgR1 = round(($avgM + $avgOS + $marks_fasiu[5])/3,1); // Переменная для вычисления среднего значения рейтинга факультета
                        echo '  
                            <tr>
                                <td>Значения</td>
                                <td>'. $avgM .'</td>
                                <td>'. $avgOS .'</td>
                                <td>'. $marks_fasiu[5] .'</td>
                                <td>'. $avgR1 .'</td>
                            </tr>
                        '; // Вывод рассчитанных данных в таблицу
                    }
                    ?>
                </table>
            </div>
            <div class = "bd">
                <table>
                    <caption>
                        <h3>Информация об учебной деятельности факультета ФГО</h3>
                    </caption>
                    <tr>
                        <th>╳</th>
                        <th>Среднее значение оценок</th>
                        <th>Среднее значение зачетов</th>
                        <th>GPA за последний год</th>
                        <th>Рейтинг факультета</th>
                    </tr>

                    <?php
                    $marks_fgo = mysqli_query($connect,"SELECT * FROM `marks_fgo`");
                    $marks_fgo = mysqli_fetch_all($marks_fgo);
                    foreach ($marks_fgo as $marks_fgo){
                        $avgM = round(($marks_fgo[0] * 5 + $marks_fgo[1] * 4 + $marks_fgo[2] * 3 + $marks_fgo[3] * 2)/$marks_fgo[6], 1);
                        $avgOS = round((2422 * 5)/2458,1);
                        $avgR2 = round(($avgM + $avgOS + $marks_fgo[5])/3,1);
                        echo '
                            <tr>
                                <td>Значения</td>
                                <td>'. $avgM .'</td>
                                <td>'. $avgOS .'</td>
                                <td>'. $marks_fgo[5] .'</td>
                                <td>'. $avgR2 .'</td>
                            </tr>
                        ';
                    }
                    ?>
                </table>
            </div>
            <div class = "bd">
                <table>
                    <caption>
                        <h3>Информация об учебной деятельности факультета ФИТиКС</h3>
                    </caption>
                    <tr>
                        <th>╳</th>
                        <th>Среднее значение оценок</th>
                        <th>Среднее значение зачетов</th>
                        <th>GPA за последний год</th>
                        <th>Рейтинг факультета</th>
                    </tr>

                    <?php
                    $marks_fitx = mysqli_query($connect,"SELECT * FROM `marks_fitx`");
                    $marks_fitx = mysqli_fetch_all($marks_fitx);
                    foreach ($marks_fitx as $marks_fitx){
                        $avgM = round(($marks_fitx[0] * 5 + $marks_fitx[1] * 4 + $marks_fitx[2] * 3 + $marks_fitx[3] * 2)/$marks_fitx[6], 1);
                        $avgOS = round((2422 * 5)/2458,1);
                        $avgR3 = round(($avgM + $avgOS + $marks_fitx[5])/3,1);
                        echo '
                            <tr>
                                <td>Значения</td>
                                <td>'. $avgM .'</td>
                                <td>'. $avgOS .'</td>
                                <td>'. $marks_fitx[5] .'</td>
                                <td>'. $avgR3 .'</td>
                            </tr>
                        ';
                    }
                    ?>
                </table>
            </div>
            <div class = "bd">
                <table>
                    <caption>
                        <h3>Информация об учебной деятельности факультета ФТНГ</h3>
                    </caption>
                    <tr>
                        <th>╳</th>
                        <th>Среднее значение оценок</th>
                        <th>Среднее значение зачетов</th>
                        <th>GPA за последний год</th>
                        <th>Рейтинг факультета</th>
                    </tr>

                    <?php
                    $marks_ftng = mysqli_query($connect,"SELECT * FROM `marks_ftng`");
                    $marks_ftng = mysqli_fetch_all($marks_ftng);
                    foreach ($marks_ftng as $marks_ftng){
                        $avgM = round(($marks_ftng[0] * 5 + $marks_ftng[1] * 4 + $marks_ftng[2] * 3 + $marks_ftng[3] * 2)/$marks_ftng[6], 1);
                        $avgOS = round((2422 * 5)/2458,1);
                        $avgR4 = round(($avgM + $avgOS + $marks_ftng[5])/3,1);
                        echo '
                            <tr>
                                <td>Значения</td>
                                <td>'. $avgM .'</td>
                                <td>'. $avgOS .'</td>
                                <td>'. $marks_ftng[5] .'</td>
                                <td>'. $avgR4 .'</td>
                            </tr>
                        ';
                    }
                    ?>
                </table>
            </div>
            <div class = "bd">
                <table>
                    <caption>
                        <h3>Информация об учебной деятельности факультета ХТФ</h3>
                    </caption>
                    <tr>
                        <th>╳</th>
                        <th>Среднее значение оценок</th>
                        <th>Среднее значение зачетов</th>
                        <th>GPA за последний год</th>
                        <th>Рейтинг факультета</th>
                    </tr>

                    <?php
                    $marks_htf = mysqli_query($connect,"SELECT * FROM `marks_htf`");
                    $marks_htf = mysqli_fetch_all($marks_htf);
                    foreach ($marks_htf as $marks_htf){
                        $avgM = round(($marks_htf[0] * 5 + $marks_htf[1] * 4 + $marks_htf[2] * 3 + $marks_htf[3] * 2)/$marks_htf[6], 1);
                        $avgOS = round((2422 * 5)/2458,1);
                        $avgR5 = round(($avgM + $avgOS + $marks_htf[5])/3,1);
                        echo '
                            <tr>
                                <td>Значения</td>
                                <td>'. $avgM .'</td>
                                <td>'. $avgOS .'</td>
                                <td>'. $marks_htf[5] .'</td>
                                <td>'. $avgR5 .'</td>
                            </tr>
                        ';
                    }
                    ?>
                </table>
            </div>
            </div>
            <div class = "bd">
                <table>
                    <caption>
                        <h3>Информация об учебной деятельности факультета РТФ</h3>
                    </caption>
                    <tr>
                        <th>╳</th>
                        <th>Среднее значение оценок</th>
                        <th>Среднее значение зачетов</th>
                        <th>GPA за последний год</th>
                        <th>Рейтинг факультета</th>
                    </tr>

                    <?php
                    $marks_rtf = mysqli_query($connect,"SELECT * FROM `marks_rtf`");
                    $marks_rtf = mysqli_fetch_all($marks_rtf);
                    foreach ($marks_rtf as $marks_rtf){
                        $avgM = round(($marks_rtf[0] * 5 + $marks_rtf[1] * 4 + $marks_rtf[2] * 3 + $marks_rtf[3] * 2)/$marks_rtf[6], 1);
                        $avgOS = round((2422 * 5)/2458,1);
                        $avgR6 = round(($avgM + $avgOS + $marks_rtf[5])/3,1);
                        echo '
                            <tr>
                                <td>Значения</td>
                                <td>'. $avgM .'</td>
                                <td>'. $avgOS .'</td>
                                <td>'. $marks_rtf[5] .'</td>
                                <td>'. $avgR6 .'</td>
                            </tr>
                        ';
                    }
                    ?>
                </table>
            </div>
            <div class="bdl">
                <table>
                    <caption>
                        <h3>Информация об учебной деятельности ОмГТУ</h3>
                    </caption>
                    <tr>
                        <th>╳</th>
                        <th>Рейтинг вуза</th>
                    </tr>

                    <?php
                    $marks_rtf = mysqli_query($connect,"SELECT * FROM `marks_rtf`");
                    $marks_rtf = mysqli_fetch_all($marks_rtf);
                    foreach ($marks_rtf as $marks_rtf){
                        $avgR = round(($avgR1 + $avgR2 + $avgR3 + $avgR4 + $avgR5 + $avgR6)/6,1); // Переменная для вычисления среднего значения рейтинга вуза
                        echo '
                            <tr>
                                <td>Значения</td>
                                <td>'. $avgR .'</td>
                            </tr>
                        ';
                    }
                    ?>
                </table>
            </div>
    </body>
</html>