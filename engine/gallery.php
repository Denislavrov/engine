<?php
function getGallery() {
    $sql = "SELECT * FROM `img` ORDER BY `views` DESC";
    $images = getAssocResult($sql);

    return $images;
}

function getImages($id) {
    $id = (int)$id;
    $sql = "SELECT * FROM `img` WHERE `name` = 'img1'";
    $img = getAssocResult($sql);
    var_dump($img);
    $result = [];
    if(isset($img[0]))
        $result = $img[0];
    return $result;
}

function getErrorMessage($errorMessage) {
    if (isset($errorMessage)) {
        switch ($errorMessage) {
            case "ok":
                return "Изображение успешно загружено";
                break;
            case "php":
                return "Загрузка php-файлов запрещена!";
                break;
            case "error":
                return "Загрузка не получилась.";
                break;
            default:
                return "";
        }
    }
}