<?php

/**
 * Global configuration file to be used by the entire application.
 *
 * This file will hold any global constants, database configuration<br />
 * and any other important configuration that is relevant to the app as a hole.<br />
 * Last modified in 2022-03-26<br />
 * PHP version 7.4.23<br />
 *
 * @copyright   2021 Leonardo Pinheiro
 * @author      __Leonardo Pinheiro__ <info@leonardopinheiro.net>
 * @link        https://www.leonardopinheiro.net Leonardo Pinheiro Designer's website
 *
 * @see         https://stackoverflow.com/questions/10691404/what-is-the-best-way-to-define-a-global-constant-in-php-which-is-available-in-al#answer-10691440 What is the best way to define a global constant in PHP which is available in all files?
 * @example     Defining a global constant:<br />
 *              <code>!defined('PROJECT_FOLDER') && define('PROJECT_FOLDER', $project_folder);</code>
 * @see         https://stackoverflow.com/questions/2266661/cygwin-and-phpunit-could-not-open-input-file-cygdrive-c-xampp-php-phpunit Cygwin and PHPUnit: Could not open input file: /cygdrive/c/xampp/php/phpunit
 * @see         https://stackoverflow.com/questions/6065730/why-fatal-error-class-phpunit-framework-testcase-not-found-in Why, Fatal error: Class 'PHPUnit_Framework_TestCase' not found in ...?
 * @example     Alterations in the ~/.bash_profile ("C:\cygwin64\home\\<span style="font-weight: bold;">\<username\></span>\\.bash_profile") file:<br />
 *              <code style="font-size: 0.775em;">alias phpcbf="/cygdrive/c/Users/leonardo/AppData/Roaming/Composer/vendor/bin/phpcbf.bat"<br />
 *              alias phpcs="/cygdrive/c/Users/leonardo/AppData/Roaming/Composer/vendor/bin/phpcs.bat"<br />
 *              alias php-cs-fixer="/cygdrive/c/Users/leonardo/AppData/Roaming/Composer/vendor/bin/php-cs-fixer.bat"<br />
 *              alias php-parse="/cygdrive/c/Users/leonardo/AppData/Roaming/Composer/vendor/bin/php-parse.bat"<br />
 *              alias phpunit="/cygdrive/c/Users/leonardo/AppData/Roaming/Composer/vendor/bin/phpunit.bat"<br />
 *              alias phpunit-skelgen="/cygdrive/c/Users/leonardo/AppData/Roaming/Composer/vendor/bin/phpunit-skelgen.bat"</code>
 */

require_once(__DIR__ . '/../src/shared/utils.php');

$project_folder = get_project_folder();

!defined('PROJECT_FOLDER') && define('PROJECT_FOLDER', $project_folder);
