<?php

/**
 * DEPRECATED SINCE STARTED USING COMPOSER.
 *
 * Autoload functionality to load all classes.
 *
 * This autoload is intended to be used by files that will load classes.<br />
 * Last modified in 2022-03-26<br />
 * PHP version 7.4.23<br />
 *
 * @copyright 2021 Leonardo Pinheiro
 * @author    __Leonardo Pinheiro__ <info@leonardopinheiro.net>
 * @link      https://www.leonardopinheiro.net Leonardo Pinheiro Designer's website
 *
 * @see https://www.youtube.com/watch?v=buN4hEgH-KM Curso de PHP 7 OO Aula 10 Namespace e Autoload
 */

$configs = include_once __DIR__ . '/../../config/config.php';

spl_autoload_register(
    function (string $class_name_with_namespace) {

        // Path array of the current working directory of this file.
        $path_array = explode(DIRECTORY_SEPARATOR, __DIR__);

        // Loops through array in reverse, removing the folders
        // until it finds the project root folder.
        for ($i = count($path_array) - 1; $i >= 0; $i--) {
            if ($path_array[$i] == PROJECT_FOLDER) {
                break;
            } else {
                // Modifies the array in place, removing the last element.
                array_pop($path_array);
            }
        }

        // Joins the $path_array back.
        $path = implode(DIRECTORY_SEPARATOR, $path_array);

        // Replaces the root namespace with the folder it represents (src).
        $path_in_project_without_ext = str_replace("PHP_Boilerplate", "src", $class_name_with_namespace);

        // Full file path with extension.
        $file_path_with_ext = $path . DIRECTORY_SEPARATOR . $path_in_project_without_ext . ".php";

        if (file_exists($file_path_with_ext)) {
            include_once $file_path_with_ext;
        }
    }
);
