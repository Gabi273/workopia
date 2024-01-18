<?php

function basePath($path = ''){
    return __DIR__ . '/' . $path;
}

function loadView($name, $data = []) {
    $viewPath = require basePath("views/{$name}.view.php");
    if(file_exists($viewPath)){
        extract($data);
        require $viewPath;
    }else{
        echo "View'{$name} not found!'";
    }
}

function loadPartial($name) {
    $partialPath = require basePath("views/partials/{$name}.php");
}

function inspect($value) {
    echo '<pre>';
    var_dump($value);
    echo '<pre>';
}

function inspectAndDie($value) {
    echo '<pre>';
    die(var_dump($value));
    echo '<pre>';
}