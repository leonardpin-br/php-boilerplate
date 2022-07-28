<?php
require_once(__DIR__ . '/../../vendor/autoload.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="A simple PHP boilerplate based on Bootstrap.">
        <meta name="author" content="Leonardo Pinheiro based on Bootstrap Album example.">
        <title><?php echo $page_title; ?></title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">

        <!-- Bootstrap core CSS -->
        <link href="./css/bootstrap.min.css" rel="stylesheet">

        <!-- Optional CSS -->
        <?php
        if (isset($optional_css)) {
            echo $optional_css;
        }
        ?>

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="./img/favicons/apple-touch-icon.png" sizes="180x180">
        <link rel="icon" href="./img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
        <link rel="icon" href="./img/favicons/favicon-16by16.png" sizes="16x16" type="image/png">
        <link rel="manifest" href="./img/favicons/manifest.json">
        <link rel="mask-icon" href="./img/favicons/safari-pinned-tab.svg" color="#7952b3">
        <link rel="icon" href="./img/favicons/favicon.ico">
        <meta name="theme-color" content="#7952b3">

        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>

    </head>

    <body<?php echo(isset($body_class) ? $body_class : ""); ?>>
