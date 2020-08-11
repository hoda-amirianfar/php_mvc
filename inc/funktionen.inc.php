<?php

function autoloadControllers($controllerName)
{
    $controllerFile = 'src/Controllers/' . $controllerName . '.php';
    if (file_exists($controllerFile)) {
        require_once $controllerFile;
    }
}

function autoloadModels($modelName)
{
    $modelFile = 'src/Models/' . $modelName . '.php';
    if (file_exists($modelFile)) {
        require_once $modelFile;
    }
}

function autoloadTraits($traitName)
{
    $traitFile = 'src/Traits/' . $traitName . '.php';
    if (file_exists($traitFile)) {
        require_once $traitFile;
    }
}

function bereinige($benutzerEingabe, $encoding = 'UTF-8')
{
    return htmlspecialchars(
        strip_tags($benutzerEingabe),
        ENT_QUOTES | ENT_HTML5,
        $encoding
    );
}

function redirect($url)
{
    header('Location: ' . $url);
    exit;
}
