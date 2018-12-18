<?php

namespace MoiTran\CommonFunctions\Tests;

use MoiTran\CommonFunctions\DateCommonFunctions;
use MoiTran\CommonFunctions\Tests\Provider\DateCommonFunctionsProvider;

/**
 * Class DateCommonFunctionsTest
 * @package MoiTran\CommonFunctions\Tests
 * @group DateCommons
 */
class DateCommonFunctionsTest extends BaseUnit
{
    use DateCommonFunctionsProvider;

    public function testGetCurrentTime()
    {
        global $mockTimeCreate, $mockTimeValue;
        $mockTimeValue = '1545113845';
        $mockTimeCreate = true;
        $this->assertEquals('2018-12-18 06:17:25', DateCommonFunctions::getCurrentTime('Y-m-d H:i:s'));
    }

    public function testGetNow()
    {
        global $mockTimeCreate, $mockTimeValue;
        $mockTimeValue = '1545113845';
        $mockTimeCreate = true;
        $this->assertEquals('1545113845', DateCommonFunctions::getNow());
    }

    /**
     * @param $params
     * @param $expected
     *
     * @dataProvider formatProvider
     */
    public function testFormat($params, $expected)
    {
        $actual = DateCommonFunctions::format($params['dateStr']);
        if (isset($params['format'])) {
            $actual = DateCommonFunctions::format($params['dateStr'], $params['format']);
        }

        $this->assertEquals($expected, $actual);
    }

    /**
     * @param $params
     * @param $expected
     *
     * @dataProvider getListDateRangeProvider
     * @throws \Exception
     */
    public function testGetListDateRange($params, $expected)
    {
        $actual = DateCommonFunctions::getListDateRange($params['startDate'], $params['endDate']);
        if (isset($params['format'])) {
            $actual = DateCommonFunctions::getListDateRange(
                $params['startDate'],
                $params['endDate'],
                $params['format']
            );
        }

        $this->assertEquals($expected, $actual);
    }

    /**
     * @param $params
     * @param $expected
     *
     * @dataProvider getPreviousDatesProvider
     * @throws \Exception
     */
    public function testGetPreviousDates($params, $expected)
    {
        $actual = DateCommonFunctions::getPreviousDates($params['dateStr']);
        if (isset($params['previousNumber']) && isset($params['format'])) {
            $actual = DateCommonFunctions::getPreviousDates(
                $params['dateStr'],
                $params['previousNumber'],
                $params['format']
            );
        } elseif (isset($params['previousNumber'])) {
            $actual = DateCommonFunctions::getPreviousDates(
                $params['dateStr'],
                $params['previousNumber']
            );
        }

        $this->assertEquals($expected, $actual);
    }

    /**
     * @param $params
     * @param $expected
     *
     * @dataProvider getPreviousDateRangeProvider
     * @throws \Exception
     */
    public function testGetPreviousDateRange($params, $expected)
    {
        $actual = DateCommonFunctions::getPreviousDateRange($params['startDate'], $params['endDate']);
        if (isset($params['format'])) {
            $actual = DateCommonFunctions::getPreviousDateRange(
                $params['startDate'],
                $params['endDate'],
                $params['format']
            );
        }

        $this->assertEquals($expected, $actual);
    }

    /**
     * @param $params
     * @param $expected
     *
     * @dataProvider getTimeBetweenTwoDateProvider
     * @throws \Exception
     */
    public function testGetTimeBetweenTwoDate($params, $expected)
    {
        $actual = DateCommonFunctions::getTimeBetweenTwoDate($params['dateStr1'], $params['dateStr2']);
        if (isset($params['returnType'])) {
            $actual = DateCommonFunctions::getTimeBetweenTwoDate(
                $params['dateStr1'],
                $params['dateStr2'],
                $params['returnType']
            );
        }

        $this->assertEquals($expected, $actual);
    }

    /**
     * @param $params
     * @param $expected
     *
     * @dataProvider getAgeProvider
     */
    public function testGetAge($params, $expected)
    {
        $actual = DateCommonFunctions::getAge($params['dateStr'], $params['currentYear']);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @param $params
     * @param $expected
     *
     * @dataProvider niceTimeProvider
     */
    public function testNiceTime($params, $expected)
    {
        $actual = DateCommonFunctions::niceTime($params['dateStr'], $params['currentDateTime']);
        $this->assertEquals($expected, $actual);
    }

    public function tearDown()
    {
        parent::tearDown();
        global $mockTimeCreate;
        $mockTimeCreate = false;
    }
}
