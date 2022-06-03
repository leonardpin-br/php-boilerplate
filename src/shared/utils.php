<?php

/**
 * A collection of global utility functions.
 *
 * This file is intended to be shared by the entire application by means of<br />
 * being required by the config.php file.<br />
 * Last modified in 2022-03-26<br />
 * PHP version 7.4.23<br />
 *
 * @copyright   2021 Leonardo Pinheiro
 * @author      __Leonardo Pinheiro__ <info@leonardopinheiro.net>
 * @link        https://www.leonardopinheiro.net Leonardo Pinheiro Designer's website
 *
 * @see         https://stackoverflow.com/questions/10691404/what-is-the-best-way-to-define-a-global-constant-in-php-which-is-available-in-al#answer-10691440 What is the best way to define a global constant in PHP which is available in all files?
 * @example     Using the get_project_folder() function:<br />
 *              <code>$project_folder = get_project_folder();<br />
 *              <br />
 *              !defined('PROJECT_FOLDER') && define('PROJECT_FOLDER', $project_folder);<br /></code>
 */

/**
 * Gets the name of the project root folder.
 * @return string The name of the project root folder.
 */
function get_project_folder(): string
{
    // Path array of the current working directory of this file.
    $path_array = explode(DIRECTORY_SEPARATOR, __DIR__);

    // Modifies the array in place, removing the last element
    // (current working directory, that is, 'shared').
    array_pop($path_array);

    // Removes 'src' from the array.
    array_pop($path_array);

    // Returns the project root folder.
    return array_pop($path_array);
}
