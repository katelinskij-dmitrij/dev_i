<?php
session_start();
require_once '../DB/admin_info.php'; // подключаем скрипт

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Доска проектов</title>
    <? include '../page/header.php' ?>

</head>
<body style="background: #eaeeec">
<div class="container_kanban">
    <div class="row centered">
        <div class="col-sm-2">
            <div class="title_kanban_1">
                <h4>Подготовка</h4></div>
            <div class="create_block"><p>Быстрое создание</p></div>
            <div class="col-sm-12 kanban_block">
                <h5>Создание интернет магазина</h5>
                <p>500000</p>
                <hr>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Заполнить бриф</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Структура сайта</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Собрать материалы</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Написать ТЗ</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Согласовать ТЗ</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Подписать договор</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Получить предоплату</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Анализ конкурентов</label>
                    </div>
                </div>
                <div class="col-12"><p>Иванов Иван</p></div>
            </div>

            <div class="col-sm-12 kanban_block">
                <h5>Создание интернет магазина</h5>
                <p>500000</p>
                <hr>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Разработать прототип</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Структура сайта</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Собрать материалы</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Написать ТЗ</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Согласовать ТЗ</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Подписать договор</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Получить предоплату</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Анализ конкурентов</label>
                    </div>
                </div>
                <div class="col-12"><p>Иванов Иван</p></div>
            </div>

            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
        <div class="col-sm-2">
            <div class="title_kanban_2">
            <h4>Дизайн</h4>
            </div>
            <div class="col-sm-12 kanban_block">
                <h5>Создание интернет магазина</h5>
                <p>500000</p>
                <hr>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Разработать прототип</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Согласовать прототип</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Разработать концепцию</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Согласовать концепцию</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Разработать дизайн</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Согласовать дизайн</label>
                    </div>
                </div>

                <div class="col-12"><p>Иванов Иван</p></div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="title_kanban_3">
            <h4>Разработка</h4>
            </div>
            <div class="col-sm-12 kanban_block">
                <h5>Создание интернет магазина</h5>
                <p>500000</p>
                <hr>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Сборка главной и структуры</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Главная страница</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Каталог товаров</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Контентные разделы</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Интеграция</label>
                    </div>
                </div>
                <div class="col-12"><p>Иванов Иван</p></div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="title_kanban_4">
            <h4>Верстка</h4>
            </div>
            <div class="col-sm-12 kanban_block">
                <h5>Создание интернет магазина</h5>
                <p>500000</p>
                <hr>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Верстка основного макета</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Верстка внутренних страниц</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Добаление Яндекс метрики</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Добавление Гугл метрики</label>
                    </div>
                </div>

                <div class="col-12"><p>Иванов Иван</p></div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="title_kanban_5">
            <h4>Тестирование</h4>
            </div>
            <div class="col-sm-12 kanban_block">
                <h5>Создание интернет магазина</h5>
                <p>500000</p>
                <hr>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Тестирование главной страницы</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Тестирование внутренних страниц</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Тестрирование форм</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Проверка на видимость сайта</label>
                    </div>
                </div>

                <div class="col-12"><p>Иванов Иван</p></div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="title_kanban_6">
            <h4>Сдача проекта</h4>
            </div>
            <div class="col-sm-12 kanban_block">
                <h5>Создание интернет магазина</h5>
                <p>500000</p>
                <hr>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Окончательная оплата</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Выдача доступов</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Предложение дополнительных услуг</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Составление акта приема-передачи сайта</label>
                    </div>
                </div>

                <div class="col-12"><p>Иванов Иван</p></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
