<?php
function getGallery() {
    $sql = "SELECT * FROM `img` ORDER BY `views` DESC";
    $images = getAssocResult($sql);

    return $images;
}

function getImages($id) {
    $id = (int)$id;
    $sql = "SELECT * FROM `img` WHERE `id` = {$id}";
    $img = getAssocResult($sql);
    $result = [];
    if(isset($img[0]))
        $result = $img[0];
    return $result;

}

function updateViews($id) {
    $sql = "UPDATE `img` SET `views` = `views` + 1 WHERE `id` = $id";
    return executeQuery($sql);
}

function showImagesViews($id) {
    $sql = "SELECT `views` FROM `img` WHERE `id` = {$id}";
    $views = getAssocResult($sql);
    $result = [];
    if(isset($views[0]))
        $result = $views[0];
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