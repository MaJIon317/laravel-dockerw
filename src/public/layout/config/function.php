<?php
$get_url = (((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . trim($_SERVER['HTTP_HOST'], '/') . (preg_replace('|([/]+)|s', '/', str_replace('pages', '/pages/', $_SERVER['REQUEST_URI'] . (strpos($_SERVER['REQUEST_URI'], 'pages') ? '' : '/pages/')))));
$get_url = substr($get_url, 0, strpos($get_url, "pages/")) . 'pages/';
 
$link_v = strtotime('NOW');

$sort_name = require('name.php');

$links = array(); 

 
foreach (getFiles(realpath('./pages')) as $file) {
    $file_str_replace = mb_strtolower(str_replace(['.php', '.html'], '', $file));

    if ((strpos($file, 'php') !== false) || (strpos($file, 'html') !== false)) {
        $links[$file_str_replace] = array(
            'href'    => $get_url . str_replace(['index.php'], '', $file),
            'name'    => isset($sort_name[$file_str_replace]) ? $sort_name[$file_str_replace] : $file_str_replace
        );
    }
}
 
$links = !empty($links) ? array_merge($sort_name, $links) : [];

$url = end(explode('/', str_replace(['.php', '.html'], '', $_SERVER['PHP_SELF'])));

$title = (isset($sort_name) && isset($sort_name[$url])) ? $sort_name[$url] : 'Заголовок страницы';


function getFiles($path) {
    if ($path[mb_strlen($path) - 1] != '/') {
        $path .= '/';
    }
 
    $files = array();

    $dh = opendir($path);
      
    while (false !== ($file = readdir($dh))) {
        if ($file != '.' && $file != '..' && !is_dir($path.$file) && $file[0] != '.') {
            $files[] = $file;
        }
    }
 
    closedir($dh);

    return $files;
}