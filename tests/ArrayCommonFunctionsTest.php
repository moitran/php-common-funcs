<?php

namespace MoiTran\CommonFunctions\Tests;

use MoiTran\CommonFunctions\ArrayCommonFunctions;
use MoiTran\CommonFunctions\Tests\Provider\ArrayCommonFunctionsProvider;
use PHPUnit\Framework\TestCase;

/**
 * Class ArrayCommonFunctionsTest
 * @package MoiTran\Test
 */
class ArrayCommonFunctionsTest extends TestCase
{
    use ArrayCommonFunctionsProvider;

    /**
     * @param $params
     * @param $expected
     *
     * @dataProvider groupItemsByKeysProvider
     * @throws \Exception
     */
    public function testGroupItemsByKeys($params, $expected)
    {
        try {
            $actual = ArrayCommonFunctions::groupItemsByKeys($params['array'], $params['keys']);
            $this->assertEquals($expected, $actual);
        } catch (\Exception $e) {
            $this->assertEquals($expected, $e->getMessage());
        }
    }
}
