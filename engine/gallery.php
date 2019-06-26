<?php
function delete__trash($files) {
    $result = array();
    for ($i = 0; $i < count($files); $i++) {
        if ($files[$i] != "." && $files[$i] != "..") {
            $result[] = $files[$i];
        }
    }
    return $result;

}

function gallery() {
    $dir = '../public/img/gallery';
    $files = scandir($dir);
    $files = delete__trash($files);
    $links = array();

    for ($i = 0; $i < count($files); $i++) {
        $src = $dir. "/" .$files[$i];
        array_push($links, $src);
    }
    return $links;
}

$constGallery = gallery();