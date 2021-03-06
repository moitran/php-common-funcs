<?php

namespace MoiTran\CommonFunctions\Tests;

use MoiTran\CommonFunctions\ArrayCommonFunctions;
use MoiTran\CommonFunctions\Tests\Provider\ArrayCommonFunctionsProvider;

/**
 * Class ArrayCommonFunctionsTest
 * @package MoiTran\CommonFunctions\Tests
 * @group ArrayCommons
 */
class ArrayCommonFunctionsTest extends BaseUnit
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

    /**
     * @param $array
     * @param $expected
     *
     * @dataProvider isAssocArrayProvider
     */
    public function testIsAssocArray($array, $expected)
    {
        $actual = ArrayCommonFunctions::isAssocArray($array);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @param $array
     * @param $expected
     *
     * @dataProvider isNumericArrayProvider
     */
    public function testIsNumericArray($array, $expected)
    {
        $actual = ArrayCommonFunctions::isNumericArray($array);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @param $params
     * @param $expected
     * @dataProvider convertLowerUpperCaseProvider
     */
    public function testConvertLowerUpperCase($params, $expected)
    {
        $actual = ArrayCommonFunctions::convertLowerUpperCase($params['array'], $params['func']);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @param $params
     * @param $expected
     *
     * @dataProvider sortByProvider
     */
    public function testSortBy($params, $expected)
    {
        try {
            $actual = ArrayCommonFunctions::sortBy($params['array'], $params['keys'], $params['sortType']);
            $this->assertEquals($expected, $actual);
        } catch (\Exception $e) {
            $this->assertEquals($expected, $e->getMessage());
        }
    }
}
