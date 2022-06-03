<?php

/**
 * An example superclass to show inheritance, namespaces, autoloading and documentation.
 *
 * This superclass is only an example to serve as a reference or be deleted.<br />
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

/**
 * Example of a superclass.
 */
class ExampleSuperclass
{
    /**
     * Example of a public property.
     * @var int
     */
    public int $any_number;

    /**
     * Creates an instance of ExampleSuperclass.
     * @param int $any_number An example of parameter. Defaults to 10.
     */
    public function __construct(int $any_number = 10)
    {
        $this->any_number = $any_number;
    }

    /**
     * Returns an example message.
     * @return string An example message.
     */
    public function returnMessage(): string
    {
        return "The constructor of the superclass received the number: {$this->any_number}.<br />";
    }
}
