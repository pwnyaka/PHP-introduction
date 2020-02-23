<?php
function renderTemplate($page, $nav = '', $content = '') {
    ob_start();
    include $page . ".php";
    return ob_get_clean();
}

$nav = renderTemplate('nav');
$content = renderTemplate('content');

echo renderTemplate('main', $nav, $content);