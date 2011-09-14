<?php
/**
 * Portable PHP password hashing framework.
 *
 * @package PHPass
 * @subpackage Tests
 * @category Cryptography
 * @author Solar Designer <solar at openwall.com>
 * @author Ryan Chouinard <rchouinard at gmail.com>
 * @license Public Domain
 * @link http://www.openwall.com/phpass/ Original phpass project page.
 * @version 0.5
 */

/**
 * @namespace
 */
namespace Phpass\Adapter;
use Phpass\Adapter\Base;

/**
 * @see PHPUnit_Framework_TestCase
 */
require_once 'PHPUnit/Framework/TestCase.php';

/**
 * @see Phpass\Adapter\Base
 */
require_once 'Phpass/Adapter/Base.php';

/**
 * Portable PHP password hashing framework.
 *
 * @package PHPass
 * @subpackage Tests
 * @category Cryptography
 * @author Solar Designer <solar at openwall.com>
 * @author Ryan Chouinard <rchouinard at gmail.com>
 * @license Public Domain
 * @link http://www.openwall.com/phpass/ Original phpass project page.
 * @version 0.5
 */
class BaseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return array
     */
    public function providerForFactoryTest()
    {
        return array (
            array (
                'blowfish',
                'Blowfish'
            ),
            array (
                'extdes',
                'ExtDes'
            ),
            array (
                'portable',
                'Portable'
            ),
            array (
                'Phpass\Adapter\Blowfish',
                'Blowfish'
            ),
            array (
                'Phpass\Adapter\ExtDes',
                'ExtDes'
            ),
            array (
                'Phpass\Adapter\Portable',
                'Portable'
            )
        );
    }

    /**
     * @test
     * @dataProvider providerForFactoryTest
     * @runInSeparateProcess
     * @param string $adapter
     * @param string $className
     * @return void
     */
    public function factoryMethodProperlyLoadsAdapter($adapter, $className)
    {
        if (method_exists($this, 'assertInstanceOf')) {
            $this->assertInstanceOf(
                $className, // Expected
                Base::factory($adapter) // Actual
            );
        } else {
            $this->assertType(
                $className, // Expected
                Base::factory($adapter) // Actual
            );
        }
    }

}