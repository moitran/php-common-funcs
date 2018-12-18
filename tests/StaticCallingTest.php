<?php

namespace MoiTran\CommonFunctions\Tests;

use MoiTran\CommonFunctions\ClassA;
use MoiTran\CommonFunctions\StaticCalling;

/**
 * Class StaticCallingTest
 * @package MoiTran\CommonFunctions\Tests
 */
class StaticCallingTest extends BaseUnit
{
    /**
     * @throws \ReflectionException
     */
    public function testCallingStatic()
    {
        /**
         * @var StaticCalling $mock
         */
        $mock = $this->getMockForTrait(StaticCalling::class);
        $this->assertEquals(2, $mock->callStatic(ClassA::class, 'test', [1,1]));
    }
}
