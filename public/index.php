<?php

//Точка входа в приложение, сюда мы попадаем каждый раз когда загружаем страницу

//Первым делом подключим файл с константами настроек
include "../config/config.php";

//Читаем параметр page из url, чтобы определить, какую страницу-шаблон
//хочет увидеть пользователь, по умолчанию это будет index
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}


//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
$params = [];
switch ($page) {
    case 'index':

        break;
    case 'gallery':
        $params = [
            'constGallery' => $constGallery
        ];
        break;
    case 'catalog':


        if ($_POST['load']) {
            // echo "Загружаем файл";
            header("Location: ?page=catalog");
        }

        $params = [
            'catalog' => ["Чай", "Печенье", "Вафли"]
        ];
        break;

    case 'api_catalog':
        $params = [
            "catalog" => [
                "Спички",
                "Кружка",
                "Ведро"
            ]
        ];


        echo json_encode($params, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
        die();
}
//пример использования модуля для логирования данных
//можно использовать для отладки, смотреть результат
//в папке _log в public, она будет создана автоматически
//_log($params);
//Вызываем рендер, и передаем в него имя шаблона и массив подстановок
echo render($page, $params);






