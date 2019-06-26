<?php
function gallery($dir) {
    return array_slice(scandir($dir),2);
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