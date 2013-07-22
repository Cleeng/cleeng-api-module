<?php
/**
 * CleengApiModule
 *
 * @link      http://cleeng.com
 * @link      https://github.com/cleeng
 * @author    Mateusz Tymek <mtymek@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 *
 * Based on test for Zend\Stdlib\AbstractOptions
 */

namespace ZendTest\Stdlib;

use CleengApiModule\Options\CleengApi as CleengApiOptions;
use ArrayObject;

class OptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CleengApiOptions
     */
    protected $options;

    public function setUp()
    {
        $this->options = new CleengApiOptions();
    }

    public function testConstructionWithArray()
    {
        $options = new CleengApiOptions(array('batchMode' => 1));

        $this->assertEquals(1, $options->batchMode);
    }

    public function testConstructionWithTraversable()
    {
        $config = new ArrayObject(array('batchMode' => 1));
        $options = new CleengApiOptions($config);

        $this->assertEquals(1, $options->batchMode);
    }

    public function testConstructionWithOptions()
    {
        $options = new CleengApiOptions(new CleengApiOptions(array('batchMode' => 1)));

        $this->assertEquals(1, $options->batchMode);
    }

    public function testInvalidFieldThrowsException()
    {
        $this->setExpectedException('BadMethodCallException');
        $options = new CleengApiOptions(array('foo' => 'bar'));
    }

    public function testConstructionWithNull()
    {
        try {
            $options = new CleengApiOptions(null);
        } catch (InvalidArgumentException $e) {
            $this->fail("Unexpected InvalidArgumentException raised");
        }
    }

    public function testUnsetting()
    {
        $options = new CleengApiOptions(array('batchMode' => 1));

        $this->assertEquals(true, isset($options->batchMode));
        unset($options->batchMode);
        $this->assertEquals(false, isset($options->batchMode));
    }

    public function testUnsetThrowsInvalidArgumentException()
    {
        $this->setExpectedException('InvalidArgumentException');
        $options = new CleengApiOptions;
        unset($options->foobarField);
    }

    public function testGetThrowsBadMethodCallException()
    {
        $this->setExpectedException('BadMethodCallException');
        $options = new CleengApiOptions();
        $options->fieldFoobar;
    }

    public function testSetFromArrayAcceptsArray()
    {
        $array = array('batchMode' => 3);
        $options = new CleengApiOptions();

        $this->assertSame($options, $options->setFromArray($array));
        $this->assertEquals(3, $options->batchMode);
    }

    public function testSetFromArrayThrowsInvalidArgumentException()
    {
        $this->setExpectedException('InvalidArgumentException');
        $options = new CleengApiOptions;
        $options->setFromArray('asd');
    }
}