<?php
$page_title = isset($page_title) ? $page_title : '';
$page_styles = isset($page_styles) ? $page_styles : '';
$page_scripts = isset($page_scripts) ? $page_scripts : '';

$page_main = isset($page_main) ? $page_main : '';
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title><?= $page_title ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=block" rel="stylesheet">
    <link rel="stylesheet" href="/static/styles.css">
    <?= $page_styles ?>
    <?= $page_scripts ?>
</head>

<body class="Body LightTheme">
    <? include __DIR__ . "/Header.php" ?>
    <main class="Main"><?= $page_main ?></main>
    <? include __DIR__ . "/Footer.php" ?>
</body>

</html>