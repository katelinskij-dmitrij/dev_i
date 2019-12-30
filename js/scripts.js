var itog = 400;
var itog_support = 400;
var itog_seo = 0;
var itog_google = 0;
var itog_yandex = 0;
summa();
function summa() {
    var itog = itog_support + itog_seo + itog_google + itog_yandex;
    $(".result-itog").text(itog);
    console.log(itog);
}

$(function () {
    var arr = [400, 1100, 1800, 2500, 3200, 3900, 4600, 5300, 6000, 6700, 7400, 8100];
    var input = $("#result-polzunok_support");
    var slider = $("#polzunok_support").insertAfter(input).slider({
        step: 1,
        orientation: 'horizontal',
        animate: true,
        range: "min",
        value: 1,
        min: 0,
        max: 11,
        change: function (event, ui) {
            input.val(arr[ui.value]);

        },
        slide: function (event, ui) {

            $("#result-polzunok_support").text(arr[ui.value]);
            $("#send-result-polzunok_support").val(arr[ui.value]);
            itog_support = arr[ui.value];
            $(".itog_support").text(itog_support);
            summa();
        },
    });

    $("#result-polzunok_support").text(arr[1]);
    itog_support = arr[1];
    summa();
    $("#result-itog").text(itog);
    $(".itog_support").text(itog_support);
    slider.slider("option", "value", 1);


});
$(function () {
    var arr = [0, 1500, 3000, 5000, 7000, 9000, 10000, 15000, 20000, 30000, 40000, 50000];
    var input = $("#result-polzunok_seo");
    var slider = $("#polzunok_seo").insertAfter(input).slider({
        step: 1,
        orientation: 'horizontal',
        animate: true,
        range: "min",
        value: 1,
        min: 0,
        max: 11,
        change: function (event, ui) {
            input.val(arr[ui.value]);

        },
        slide: function (event, ui) {
            $("#result-polzunok_seo").text(arr[ui.value]);
            $("#send-result-polzunok_seo").val(arr[ui.value]);
            itog_seo = arr[ui.value];
            $(".itog_seo").text(itog_seo);
            summa();
        },
    });

    $("#result-polzunok_seo").text(arr[1]);
    itog_seo = arr[1];
    summa();
    $("#result-itog").text(itog);
    $(".itog_seo").text(itog_seo);
    slider.slider("option", "value", 1);

});
$(function () {
    var arr = [0, 1500, 3000, 5000, 7000, 9000, 10000, 15000, 20000, 30000, 40000, 50000];
    var input = $("#result-polzunok_yandex");
    var slider = $("#polzunok_yandex").insertAfter(input).slider({
        step: 1,
        orientation: 'horizontal',
        animate: true,
        range: "min",
        value: 1,
        min: 0,
        max: 11,
        change: function (event, ui) {
            input.val(arr[ui.value]);

        },
        slide: function (event, ui) {
            $("#result-polzunok_yandex").text(arr[ui.value]);
            $("#send-result-polzunok_yandex").val(arr[ui.value]);
            itog_yandex = arr[ui.value];
            $(".itog_yandex").text(itog_yandex);
            summa();
        },
    });
    $("#result-polzunok_yandex").text(arr[1]);
    itog_yandex = arr[1];
    summa();
    $("#result-itog").text(itog);
    $(".itog_yandex").text(itog_yandex);
    slider.slider("option", "value", 1);

});

$(function () {
    var arr = [0, 1500, 3000, 5000, 7000, 9000, 10000, 15000, 20000, 30000, 40000, 50000];
    var input = $("#result-polzunok_google");
    var slider = $("#polzunok_google").insertAfter(input).slider({
        step: 1,
        orientation: 'horizontal',
        animate: true,
        range: "min",
        value: 1,
        min: 0,
        max: 11,
        change: function (event, ui) {
            input.val(arr[ui.value]);

        },
        slide: function (event, ui) {
            $("#result-polzunok_google").text(arr[ui.value]);
            $("#send-result-polzunok_google").val(arr[ui.value]);
            itog_google = arr[ui.value];
            $(".itog_google").text(itog_google);
            summa();
        },
    });
    $("#result-polzunok_google").text(arr[1]);
    itog_google = arr[1];
    summa();
    $("#result-itog").text(itog);
    $(".itog_google").text(itog_google);
    slider.slider("option", "value", 1);

});


$(document).ready(function () {
    $("#btn").click(
        function () {


            sendAjaxForm('result_form', 'ajax_form_service', '../js/action_ajax_form.php');
            return false;
        }
    );
});


function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({

        url: url, //url страницы (action_ajax_form.php)
        type: "POST", //метод отправки
        dataType: "html", //формат данных
        data: {
            itog: itog,
            itog_support: itog_support,
            itog_yandex: itog_yandex,
            itog_google: itog_google,
            itog_seo: itog_seo,
            project:$("#select_service_site").val()
        },  // Сеарилизуем объект
        success: function (response) { //Данные отправлены успешно

        },
        error: function () { // Данные не отправлены

        }

    });

}

// $(document).ready(function () {
//     $("#delete_task_admin").click(
//         function () {
//
//             console.log(090);
//             url: '../js/delete_task.php';
//             ajax_view('task_view', '../js/delete_task.php');
//             return false;
//         }
//     );
// });
// function ajax_view(ajax_form, url) {
//     $.ajax({
//
//         url: url, //url страницы (action_ajax_form.php)
//         type: "POST", //метод отправки
//         dataType: "html", //формат данных
//         data: {},  // Сеарилизуем объект
//         success: function (response) { //Данные отправлены успешно
//
//         },
//         error: function () { // Данные не отправлены
//
//         }
//
//     });
//
// }



