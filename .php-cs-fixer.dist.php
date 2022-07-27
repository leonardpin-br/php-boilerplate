<?php

/**
 * The .php-cs-fixer.dist.php acts as a config file for the __friendsofphp/php-cs-fixer__ Composer package.
 *
 * This file is intended to be in the project's root folder.<br />
 * Last modified in 2022-04-13<br />
 * PHP version 7.4.23<br />
 *
 * @copyright   2022 Leonardo Pinheiro
 * @author      __Leonardo Pinheiro__ <info@leonardopinheiro.net>
 * @link        https://www.leonardopinheiro.net Leonardo Pinheiro Designer's website
 *
 * @see         https://github.com/FriendsOfPHP/PHP-CS-Fixer/blob/master/doc/config.rst#config-file Config file
 * @example     This command will fix the entire project:<br />
 *              <code>php "C:\Users\leonardo\AppData\Roaming\Composer\vendor\bin\php-cs-fixer" fix</code>
 */

$finder = PhpCsFixer\Finder::create()
    // The exclude method only excludes folders.
    ->exclude('docs')
    ->exclude('nbproject')
    ->exclude('public/css')
    ->exclude('public/img')
    ->exclude('public/js')
    ->exclude('resources')
    ->exclude('src/scss')
    ->exclude('src/sh')
    ->exclude('vendor')

    // The notPath method only excludes files.
    ->notPath('ignoredFile.php')

    // Where to look for files.
    ->in(__DIR__)
;

$config = new PhpCsFixer\Config();
return $config->setRules([
        '@PSR12' => true
    ])
    ->setFinder($finder)
;
