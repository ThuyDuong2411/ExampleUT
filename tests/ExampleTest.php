<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Example;
class ExampleTest extends TestCase
{
    /**
     * @param $capacity
     * @param $stack
     * @param $expectedResult
     *
     * @dataProvider providerTestIsEmptyStack
     */
    public function testIsEmptyStack($capacity, $stack, $expectedResult)
    {
        $url = new Example($capacity, $stack);

        $result = $url->isEmpty();

        $this->assertEquals($expectedResult, $result);
    }

    public function providerTestIsEmptyStack()
    {
        return [
            [5, array(), true],
            [0, array(), true],

            [5, array(1,2,3,4,5,6), "Stack is over."],
            [0, '', "Stack is not an array."],
            [5, 8, "Stack is not an array."],
            [-3, array(), "Capacity is invalid."],
            [-3, '', "Please check stack and capacity."],
            [5, array(2), false],
            [5, array('s','b'), false],
        ];
    }

    /**
     * @param $capacity
     * @param $stack
     * @param $value
     * @param $expectedResult
     *
     * @dataProvider providerTestPushElementToStack
     */
    public function testPushElementToStack($capacity, $stack, $value, $expectedResult)
    {
        $url = new Example($capacity, $stack);

        $result = $url->push($value);

        $this->assertEquals($expectedResult, $result);
    }

    public function providerTestPushElementToStack()
    {
        return [
            [5, array(), 10, array(10)],
            [5, array(), 'a', array('a')],
            [5, array(1,2,3,4), 10, array(1,2,3,4,10)],
            [5, array(1,2,3,4), 'c', array(1,2,3,4,'c')],
            [5, array(1,'a',3,'b'), 10, array(1,'a',3,'b',10)],
            [5, array(1,'a',3,'b'), 'c', array(1,'a',3,'b','c')],
            [5, array('a','b','c','d'), 'f', array('a','b','c','d','f')],
            [5, array('a','b','c','d'), 7, array('a','b','c','d',7)],

            [5, array(1,2,3,4,5,6), 10, "Stack is over."],
            [5, array(1,2,3,4,5), 10, "Stack is full."],
            [-7, array(1,2,3,4), 10, "Capacity is invalid."],
            [5, 9, 10, "Stack is not an array."],
            [-3, '', 10, "Please check stack and capacity."],
        ];
    }

    /**
     * @param $capacity
     * @param $stack
     * @param $expectedResult
     *
     * @dataProvider providerTestPopElementFromStack
     */
    public function testPopElementFromStack($capacity, $stack, $expectedResult)
    {
        $url = new Example($capacity, $stack);

        $result = $url->pop();

        $this->assertEquals($expectedResult, $result);
    }

    public function providerTestPopElementFromStack()
    {
        return [
            [5, array(1,2,3), array(1,2)],
            [5, array('a','b','c','d'), array('a','b','c')],
            [5, array(1,'a',3,'b'), array(1,'a',3)],

            [5, array(1,2,3,4,5,6), "Stack is over."],
            [5, array(), "Stack is empty."],
            [-7, array(1,2,3,4), "Capacity is invalid."],
            [5, 9, "Stack is not an array."],
            [-3, '', "Please check stack and capacity."],
        ];
    }

    /**
     * @param $capacity
     * @param $stack
     * @param $expectedResult
     *
     * @dataProvider providerTestPeekFromStack
     */
    public function testPeekFromStack($capacity, $stack, $expectedResult)
    {
        $url = new Example($capacity, $stack);

        $result = $url->peek();

        $this->assertEquals($expectedResult, $result);
    }

    public function providerTestPeekFromStack()
    {
        return [
            [5, array(1,2,3), 3],
            [5, array('a','b','c','d'), 'd'],
            [5, array(1,'a',3,'b'), 'b'],

            [5, array(1,2,3,4,5,6), "Stack is over."],
            [5, array(), "Stack is empty."],
            [-7, array(1,2,3,4), "Capacity is invalid."],
            [5, 9, "Stack is not an array."],
            [-3, '', "Please check stack and capacity."],
        ];
    }

    /**
     * @param $capacity
     * @param $stack
     * @param $expectedResult
     *
     * @dataProvider providerTestClearStack
     */
    public function testStackArray($capacity, $stack, $expectedResult)
    {
        $url = new Example($capacity, $stack);

        $result = $url->clear();

        $this->assertEquals($result, $expectedResult);
    }

    public function providerTestClearStack()
    {
        return [
            [5, array(1,2,3,4), true],
            [5, array(1,'b',4,5), true],
            [5, array('a','b','c','d','e'), true],

            [5, array(1,2,3,4,5,6), "Stack is over."],
            [5, array(), "Stack is empty."],
            [-7, array(1,2,3,4), "Capacity is invalid."],
            [5, 9, "Stack is not an array."],
            [-3, '', "Please check stack and capacity."],
        ];
    }

    /**
     * @param $capacity
     * @param $stack
     * @param $value
     * @param $expectedResult
     *
     * @dataProvider providerTestStackContainsElement
     */
    public function testStackContainsElement($capacity, $stack, $value, $expectedResult)
    {
        $url = new Example($capacity, $stack);

        $result = $url->contains($value);

        $this->assertEquals($expectedResult, $result);
    }

    public function providerTestStackContainsElement()
    {
        return [
            [5, array(1,2,3,4), 3, "Element at index 3 in stack."],
            [5, array(1,'b',4, 5, 'c'), 'b', "Element at index 2 in stack."],
            [5, array('a','b','c','d','e'), 'c', "Element at index 3 in stack."],

            [5, array(1,2,3,4,5), 6, "No element in stack."],
            [5, array(), 8, "Stack is empty."],
            [5, array(1,2,3,4,5,6), 9, "Stack is over."],
            [-7, array(1,2,3,4), 8, "Capacity is invalid."],
            [5, 9, 6, "Stack is not an array."],
            [-3, '', 7, "Please check stack and capacity."],
        ];
    }
}