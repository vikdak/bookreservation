<?php
require_once __DIR__ . '/Message.php';

function redirectIfNotAuthenticated(string $url): void
{
    if(!($_SESSION['is_authenticated'] ?? 0)) {
        redirect ($url);
    }
}

function redirect($url) :void
{
    header("Location: $url");
}

function dump(...$variables)
{
    foreach ($variables as $variable){
        echo "<pre>". print_r($variable,true) ."</pre>";
    }
}

function view($path, $data = [])
{
    //get content
    $content = getView($path, $data);
    //get document and pass content as parameter
      echo renderDocument($content);
}

function getView($path, $data)
{
    extract($data);
    ob_start();
    include $path;

    return ob_get_clean();
}

function getRootUrl()
{
    $config = include __DIR__."/config.php";

    return $config['root_uri'];
}

function publicUrl($url='')
{
    return getRootUrl().'public/'.$url;
}

function storageUrl($url='')
{
    return getRootUrl().'storage/'.$url;
}

function imageUrl($name='')
{
    return storageUrl().'images/'.$name;
}

function renderDocument($content)
{
    return getView(__DIR__ . '/Views/app/document.php', compact('content'));
}

function imageInput(string $inputName, string|array $images): string
{
    if (is_array($images)) {
        $inputName = "{$inputName}[]";
    } else {
        $images = (array)$images;
    }

    $imageBlock = '';

    foreach ($images as $image) {
        $imageBlock .= "
            <div class='old-images-block'>
                <img src='" . imageUrl("$image") . "'>
                <input type='hidden' name='{$inputName}' value='$image'>
                <label>$image</label>
            </div>
            ";
    }

    if ($imageBlock) {
        $imageBlock = "<div class='old-images'>$imageBlock</div>";
    }
    return $imageBlock;
}
