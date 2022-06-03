<?php

/**
 * An example test class to show syntax and documentation.
 *
 * This test class is only an example to serve as a reference or be deleted.<br />
 * Last modified in 2022-04-17<br />
 * PHP version 7.4.23<br />
 *
 * @copyright   2022 Leonardo Pinheiro
 * @author      __Leonardo Pinheiro__ <info@leonardopinheiro.net>
 * @link        https://www.leonardopinheiro.net Leonardo Pinheiro Designer's website
 *
 * @see         https://stackoverflow.com/questions/45506414/how-to-document-phpunit-tests How to document PHPUnit tests
 */

namespace tests\classes;

require_once(__DIR__ . '/../../src/shared/autoload.php');

use PHP_Boilerplate\classes\ExampleSubclass;

/**
 * @covers  PHP_Boilerplate\classes\ExampleSubclass
 * @uses    <a href="classes/PHP-Boilerplate-classes-ExampleSubclass.html">PHP_Boilerplate\classes\ExampleSubclass</a> to test its functionality.
 */
class ExampleSubclassTest extends \PHPUnit\Framework\TestCase
{
    private $exampleSubclass;

    protected function setUp(): void
    {
        $this->exampleSubclass = new ExampleSubclass();
    }

    public function testPrintMessage(): void
    {
        $result = $this->exampleSubclass->printMessage();
        $expected_result = "The constructor of the superclass received the number: 10.<br />";
        $this->assertEquals($expected_result, $result);
    }
}
