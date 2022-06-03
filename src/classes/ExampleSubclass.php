<?php

/**
 * An example subclass to show inheritance, namespaces, autoloading and documentation.
 *
 * This subclass is only an example to serve as a reference or be deleted.<br />
 * Last modified in 2022-03-26<br />
 * PHP version 7.4.23<br />
 *
 * @copyright   2021 Leonardo Pinheiro
 * @author      __Leonardo Pinheiro__ <info@leonardopinheiro.net>
 * @link        https://www.leonardopinheiro.net Leonardo Pinheiro Designer's website
 *
 * @see         https://www.w3schools.com/php/php_namespaces.asp PHP Namespaces
 * @example     Declaring a Namespace:<br />
 *              <code>namespace PHP_Boilerplate\classes;</code>
 */

/**
 * PHP_Boilerplate is the root namespace
 * and corresponds to the src directory.
 * @package PHP_Boilerplate\classes
 */

namespace PHP_Boilerplate\classes;

require_once(__DIR__ . '/../shared/autoload.php');

/**
 * Creates an instance of the example subclass.
 * @used-by <a href="classes/tests-ExampleSubclassTest.html">tests\ExampleSubclassTest</a> for testing purposes.
 */
class ExampleSubclass extends ExampleSuperclass
{
    public function __construct(int $any_number = 10)
    {
        parent::__construct($any_number);
    }

    /**
     * Returns a greeting to the user.
     * @return string The greeting message.
     */
    public function greeter(): string
    {
        return "Hello from subclass!<br />";
    }
}
