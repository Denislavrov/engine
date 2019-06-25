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
    $dir = 'img';

}