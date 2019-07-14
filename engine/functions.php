<?php
//Файл с функциями нашего движка
function prepareVariables($page)
{

//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
    $params = [];
    switch ($page) {
        case 'index':

            break;
        case 'gallery':

            loadFile();

            $params = [
                'arrayImages' => getGallery(),
                'errorMessage' => getErrorMessage($_GET['errorMessage'])
            ];
            break;
        case 'imagepage':

            $params = [
                'url' => getImages($_GET['id'])['url'],
                'name' => getImages($_GET['id'])['name'],
                'views' => updateViews($_GET['id'])['views'],
                'span' => showImagesViews($_GET['id'])['views']
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
    }
    return $params;
}
//Функция, возвращает текст шаблона $page с подстановкой переменных
//из массива $params, содержимое шабона $page подставляется в
//переменную $content главного шаблона layout для всех страниц
function render($page, array $params = [])
{
    $content = renderTemlate(LAYOUTS_DIR . 'main', [
        'content' => renderTemlate($page, $params),
        'menu' => 'Меню<br>'
    ]);
    return $content;
}

//Функция возвращает текст шаблона $page с подставленными переменными из
//массива $params, просто текст
function renderTemlate($page, array $param = [])
{
    ob_start();

    if (!is_null($param)) {
        extract($param);
    }


    $fileName = TEMPLATES_DIR . $page . ".php";


    if (file_exists($fileName)) {
        include $fileName;
    } else {
        Die("Страницы {$fileName} не существует.");
    }


    return ob_get_clean();
}