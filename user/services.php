<?php
session_start();
require_once '../DB/connection.php'; // подключаем скрипт
require_once '../DB/users_info.php'; // подключаем скрипт
check_authorization();

balance();



?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Услуги</title>
    <? include '../page/header.php' ?>
    <link rel="stylesheet" href="../style/polz_style.css">


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet"
          type="text/css"/><!--Подключаем стили CSS для библиотеки Jquery UI-->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script><!--Подключаем библиотеку Jquery UI-->


</head>
<body>
<?include '../page/menu.php'?>
        <div class="col-sm-8">
            <h3>Управление услугами</h3>
<h3>Выберите сайт:</h3>

            <div class="row">
                <p></p>
                <p>Вы можете в любой момент перейти на другой тарифный план или добавить к текущему тарифу

                    дополнительные услуги.</p>
                <form class="col-sm-12" id="ajax_form_service" method="POST">
                    <select id="select_service_site" name="select_service_site" class="form-control col-sm-12">
                        <?php form_select_site(); ?>
                    </select>
                    <div class="row">
                    <div class="col-sm-6">

                        <div id="service_support">
                            <div id="polzunok_support"></div>
                            <b>Стоимость сопровождения: <span style="color:green"
                                                              id="result-polzunok_support"></span></b>

                            <input type="hidden" name="send-result-polzunok_support" id="send-result-polzunok_support"/>
                            <div class="col-sm-12">
                                <h4>Информация: </h4>
                                <small id="emailHelp" class="form-text text-muted">400 рублей - базовое размещение.</small>
                                <small id="emailHelp" class="form-text text-muted">1100 рублей - базовое размещение + 1 час поддержки</small>
                                <small id="emailHelp" class="form-text text-muted">1800 рублей - базовое размещение + 2 час поддержки</small>
                                <small id="emailHelp" class="form-text text-muted">2500 рублей - базовое размещение + 3 час поддержки</small>
                                <small id="emailHelp" class="form-text text-muted">3200 рублей - базовое размещение + 4 час поддержки</small>
                                <small id="emailHelp" class="form-text text-muted">3900 рублей - базовое размещение + 5 час поддержки</small>
                                <small id="emailHelp" class="form-text text-muted">4600 рублей - базовое размещение + 6 час поддержки</small>
                                <small id="emailHelp" class="form-text text-muted">5300 рублей - базовое размещение + 7 час поддержки</small>



                                <!--                                <p>400 рублей - базовое размещение.</p>-->
                                <!--                                <p>1100 рублей - базовое размещение + 1 час поддержки</p>-->
                                <!--                                <p>1800 рублей - базовое размещение + 2 час поддержки</p>-->
                                <!--                                <p>2500 рублей - базовое размещение + 3 час поддержки</p>-->
                                <!--                                <p>3200 рублей - базовое размещение + 4 час поддержки</p>-->
                                <!--                                <p>3900 рублей - базовое размещение + 5 час поддержки</p>-->
                                <!--                                <p>4600 рублей - базовое размещение + 6 час поддержки</p>-->
                                <!--                                <p>5300 рублей - базовое размещение + 7 час поддержки</p>-->
                                <!--                                <p>6000 рублей - базовое размещение + 8 час поддержки</p>-->
                                <!--                                <p>6700 рублей - базовое размещение + 9 час поддержки</p>-->
                                <!--                                <p>7400 рублей - базовое размещение + 10 час поддержки</p>-->
                                <!--                                <p>8100 рублей - базовое размещение + 11 час поддержки</p>-->
                            </div>
                        </div>


                        <div id="service_SEO">
                            <div id="polzunok_seo"></div>
                            <b>Стоимость SEO-продвижения: <span style="color:green" id="result-polzunok_seo"></span></b>

                            <input type="hidden" name="send-result-polzunok_seo" id="send-result-polzunok_seo"/>
                            <div class="col-sm-12"><h4>Информация:</h4>
                                <p></p></div>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div id="service_yandex">
                            <div id="polzunok_yandex"></div>
                            <b>Стоимость рекламы Яндекс: <span style="color:green"
                                                               id="result-polzunok_yandex"></span></b>

                            <input type="hidden" name="send-result-polzunok_yandex" id="send-result-polzunok_yandex"/>
                            <div class="col-sm-12">
                                <h4>Информация:</h4>
                            </div>
                        </div>
                        <div id="service_google">
                            <div id="polzunok_google"></div>
                            <b>Стоимость рекламы Google: <span style="color:green"
                                                               id="result-polzunok_google"></span></b>

                            <input type="hidden" name="send-result-polzunok" id="send-result-polzunok"/>
                            <div class="col-sm-12">
                                <h4>Информация:</h4>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div  class="row"><input style="margin: 0 auto" class="btn btn-outline-success" id="btn" name="submit_service" type="submit" value="Внести изменения"></div>


                </form>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div id="result_form">

                        <h2>Итого оплата на ИЮНЬ месяц составит: <span class="result-itog" id="#result-itog"></span>
                            рублей.
                        </h2>
                        <p>Тариф базовой поддержки <span class="itog_support"></span> рублей.</p>
                        <p>Сумма на рекламу в поисковой сети Яндекс <span class="itog_yandex"></span> рублей.</p>
                        <p>Сумма на рекламу в поисковой сети Гугл <span class="itog_google"></span> рублей.</p>
                        <p>SEO-продвижение в поисковых сетях <span class="itog_seo"></span> рублей.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../js/scripts.js"></script>
</body>
</html>