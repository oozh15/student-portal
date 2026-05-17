<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$file = 'data.json';

if (!file_exists($file)) {
    file_put_contents($file, json_encode(['users' => [], 'students' => []]));
}

function getData() {
    $content = file_get_contents($GLOBALS['file']);
    return json_decode($content, true) ?: ['users' => [], 'students' => []];
}

function saveData($data) {
    file_put_contents($GLOBALS['file'], json_encode($data, JSON_PRETTY_PRINT));
}
?>