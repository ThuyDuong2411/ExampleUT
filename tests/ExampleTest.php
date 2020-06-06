<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Example;
class ExampleTest extends TestCase
{
    /**
     * @param $array
     * @param $value
     * @param $expectedResult
     *
     * @dataProvider providerTestPushElementToArray
     */
    public function testPushElementToArray($array, $value, $expectedResult)
    {
        $url = new Example();

        $result = $url->push($array, $value);

        $this->assertEquals($expectedResult, $result);
    }

    public function providerTestPushElementToArray()
    {
        return [
            [array(), 19, array(19)],
            [array(), 'a', array('a')],
            [array(1,2,3,4,5), 19, array(1,2,3,4,5,19)],
            [array(1,2,3,4,5), 'c', array(1,2,3,4,5,'c')],
            [array(1,'a',3,'b',5), 19, array(1,'a',3,'b',5,19)],
            [array(1,'a',3,'b',5), 'c', array(1,'a',3,'b',5,'c')],
            [array('a','b','c','d','e'), 'f', array('a','b','c','d','e','f')],
            [array('a','b','c','d','e'), 7, array('a','b','c','d','e',7)],


            [array(), 19, array()],
            [array(1,2,3,4,5), 19, array(19)],
            [array(1,2,3,4,5), 19, array(1,2,3,4,19)],
            [array(1,2,3,4,5), 19, array(19,2,3,4,5)],
            [array(1,2,3,4,5), 19, array(19,1,2,3,4,5)],
            [array(1,2,3,4,5), 19, array(1,2,3,19,4,5)],
        ];
    }

    /**
     * @param $array
     * @param $expectedResult
     *
     * @dataProvider providerTestPopElementFromArray
     */
    public function testPopElementFromArray($array, $expectedResult)
    {
        $url = new Example();

        $result = $url->pop($array);

        $this->assertEquals($expectedResult, $result);
    }

    public function providerTestPopElementFromArray()
    {
        return [
            [array(), array()],
            [array(1,2,3,4,5), array(1,2,3,4)],
            [array('a','b','c','d','e'), array('a','b','c','d')],
            [array(1,'a',3,'b',5), array(1,'a',3,'b')],

            [array(1,2,3,4,5), array(2,3,4,5)],
            [array(1,2,3,4,5), array(1,2,4,5)],
        ];
    }

    /**
     * @param $array
     * @param $expectedResult
     *
     * @dataProvider providerTestIsEmptyArray
     */
    public function testIsEmptyArray($array)
    {
        $url = new Example();

        $result = $url->isEmpty($array);

        $this->assertTrue($result);
    }

    public function providerTestIsEmptyArray()
    {
        return [
            [array()],

            [array(1,2,3,4,5)],
            [array(1,'b','c',4,5)],
            [array('a','b','c','d','e')],
        ];
    }

    /**
     * @param $array
     * @param $expectedResult
     *
     * @dataProvider providerTestPeekFromArray
     */
    public function testPeekFromArray($array, $expectedResult)
    {
        $url = new Example();

        $result = $url->peek($array);

        $this->assertEquals($expectedResult, $result);
    }

    public function providerTestPeekFromArray()
    {
        return [
            [array(), false],
            [array(1,2,3,4,5), 5],
            [array(1,'b',4,5, 'c'), 'c'],
            [array('a','b','c','d','e'), 'e'],

            [array(1,2,3,4,5), 1],
            [array(1,2,3,4,5), 3],
        ];
    }

    /**
     * @param $array
     *
     * @dataProvider providerTestClearArray
     */
    public function testClearArray($array)
    {
        $url = new Example();

        $result = $url->clear($array);

        $this->assertTrue($result);
    }

    public function providerTestClearArray()
    {
        return [
            [array()],
            [array(1,2,3,4,5)],
            [array(1,'b',4,5, 'c')],
            [array('a','b','c','d','e')],
        ];
    }

    /**
     * @param $array
     * @param $expectedResult
     *
     * @dataProvider providerTestArrayContainsElement
     */
    public function testArrayContainsElement($array, $value, $expectedResult)
    {
        $url = new Example();

        $result = $url->contains($array, $value);

        $this->assertEquals($expectedResult, $result);
    }

    public function providerTestArrayContainsElement()
    {
        return [
            [array(), 8, false],
            [array(1,2,3,4,5), 5, 4],
            [array(1,'b',4, 5, 'c'), 'b', 1],
            [array('a','b','c','d','e'), 'c', 2],
            [array(1,2,3,4,5), 6, false],
        ];
    }
}