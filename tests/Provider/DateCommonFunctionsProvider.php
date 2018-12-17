<?php

namespace MoiTran\CommonFunctions\Tests\Provider;

/**
 * Trait DateCommonFunctionsProvider
 * @package MoiTran\CommonFunctions\Tests\Provider
 */
trait DateCommonFunctionsProvider
{
    /**
     * @return array
     */
    public static function formatProvider()
    {
        return [
            'default-format' => [
                'params' => [
                    'dateStr' => '2018-01-10 10:00:05',
                ],
                'expected' => '2018-01-10 10:00:05',
            ],
            'date' => [
                'params' => [
                    'dateStr' => '2018-01-10 10:00:05',
                    'format' => 'Y/m/d',
                ],
                'expected' => '2018/01/10',
            ],
            'datetime' => [
                'params' => [
                    'dateStr' => '2018-01-10 10:00:05',
                    'format' => 'Y/m/d H-i-s',
                ],
                'expected' => '2018/01/10 10-00-05',
            ],
            'week' => [
                'params' => [
                    'dateStr' => '2018-01-10 10:00:05',
                    'format' => 'W',
                ],
                'expected' => '02',
            ],
            'month' => [
                'params' => [
                    'dateStr' => '2018-01-10 10:00:05',
                    'format' => 'm',
                ],
                'expected' => '01',
            ],
            'year' => [
                'params' => [
                    'dateStr' => '2018-01-10 10:00:05',
                    'format' => 'Y',
                ],
                'expected' => '2018',
            ],
        ];
    }

    /**
     * @return array
     */
    public static function getListDateRangeProvider()
    {
        return [
            'default-format' => [
                'params' => [
                    'startDate' => '2018-01-10',
                    'endDate' => '2018-01-13',
                ],
                'expected' => [
                    '2018-01-10',
                    '2018-01-11',
                    '2018-01-12',
                    '2018-01-13',
                ],
            ],
            'new-format' => [
                'params' => [
                    'startDate' => '2018-01-10',
                    'endDate' => '2018-01-13',
                    'format' => 'd/m/Y',
                ],
                'expected' => [
                    '10/01/2018',
                    '11/01/2018',
                    '12/01/2018',
                    '13/01/2018',
                ],
            ],
            'one-day' => [
                'params' => [
                    'startDate' => '2018-01-10',
                    'endDate' => '2018-01-10',
                ],
                'expected' => [
                    '2018-01-10',
                ],
            ],
            'two-days' => [
                'params' => [
                    'startDate' => '2018-01-10',
                    'endDate' => '2018-01-11',
                ],
                'expected' => [
                    '2018-01-10',
                    '2018-01-11',
                ],
            ],
            'between-two-month' => [
                'params' => [
                    'startDate' => '2018-02-27',
                    'endDate' => '2018-03-01',
                ],
                'expected' => [
                    '2018-02-27',
                    '2018-02-28',
                    '2018-03-01',
                ],
            ],
            'between-two-year' => [
                'params' => [
                    'startDate' => '2018-12-30',
                    'endDate' => '2019-01-02',
                ],
                'expected' => [
                    '2018-12-30',
                    '2018-12-31',
                    '2019-01-01',
                    '2019-01-02',
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public static function getPreviousDatesProvider()
    {
        return [
            'default-params' => [
                'params' => [
                    'dateStr' => '2018-01-10',
                ],
                'expected' => '2018-01-09',
            ],
            'default-format' => [
                'params' => [
                    'dateStr' => '2018-01-10',
                    'previousNumber' => 2,
                ],
                'expected' => '2018-01-08',
            ],
            'more-days' => [
                'params' => [
                    'dateStr' => '2018-01-10',
                    'previousNumber' => 6,
                ],
                'expected' => '2018-01-04',
            ],
            'previous-month' => [
                'params' => [
                    'dateStr' => '2018-03-03',
                    'previousNumber' => 3,
                ],
                'expected' => '2018-02-28',
            ],
            'previous-year' => [
                'params' => [
                    'dateStr' => '2018-01-01',
                    'previousNumber' => 5,
                ],
                'expected' => '2017-12-27',
            ],
        ];
    }

    /**
     * @return array
     */
    public static function getPreviousDateRangeProvider()
    {
        return [
            'default-format' => [
                'params' => [
                    'startDate' => '2018-01-07',
                    'endDate' => '2018-01-10',
                ],
                'expected' => [
                    '2018-01-03',
                    '2018-01-04',
                    '2018-01-05',
                    '2018-01-06',
                ],
            ],
            'one-day' => [
                'params' => [
                    'startDate' => '2018-01-07',
                    'endDate' => '2018-01-07',
                ],
                'expected' => [
                    '2018-01-06',
                ],
            ],
            'two-days' => [
                'params' => [
                    'startDate' => '2018-01-07',
                    'endDate' => '2018-01-08',
                ],
                'expected' => [
                    '2018-01-05',
                    '2018-01-06',
                ],
            ],
            'more-days' => [
                'params' => [
                    'startDate' => '2018-01-07',
                    'endDate' => '2018-01-10',
                ],
                'expected' => [
                    '2018-01-03',
                    '2018-01-04',
                    '2018-01-05',
                    '2018-01-06',
                ],
            ],
            'between-two-month' => [
                'params' => [
                    'startDate' => '2018-03-03',
                    'endDate' => '2018-03-07',
                ],
                'expected' => [
                    '2018-02-26',
                    '2018-02-27',
                    '2018-02-28',
                    '2018-03-01',
                    '2018-03-02',
                ],
            ],
            'between-two-year' => [
                'params' => [
                    'startDate' => '2018-01-03',
                    'endDate' => '2018-01-07',
                ],
                'expected' => [
                    '2017-12-29',
                    '2017-12-30',
                    '2017-12-31',
                    '2018-01-01',
                    '2018-01-02',
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public function getTimeBetweenTwoDateProvider()
    {
        return [
            'default-return-type' => [
                'params' => [
                    'dateStr1' => '2018-01-10 10:10:10',
                    'dateStr2' => '2018-01-10 10:10:26',
                ],
                'expected' => 16,
            ],
            'minutes' => [
                'params' => [
                    'dateStr1' => '2018-01-10 10:10:10',
                    'dateStr2' => '2018-01-10 11:10:40',
                    'returnType' => 'M',
                ],
                'expected' => 60.5,
            ],
            'hours' => [
                'params' => [
                    'dateStr1' => '2018-01-10 10:10:10',
                    'dateStr2' => '2018-01-10 11:10:40',
                    'returnType' => 'H',
                ],
                'expected' => 1.01,
            ],
            'days' => [
                'params' => [
                    'dateStr1' => '2018-01-10 10:10:10',
                    'dateStr2' => '2018-01-11 11:10:40',
                    'returnType' => 'D',
                ],
                'expected' => 1.04,
            ],
            'wrong-unit' => [
                'params' => [
                    'dateStr1' => '2018-01-10 10:10:10',
                    'dateStr2' => '2018-01-10 10:10:26',
                    'returnType' => 'test'
                ],
                'expected' => 16,
            ],
        ];
    }

    /**
     * @return array
     */
    public function getAgeProvider()
    {
        return [
            '1-age' => [
                'params' => [
                    'dateStr' => '2019-01-01',
                    'currentYear' => '2020',
                ],
                'expected' => 1,
            ],
            '2-age' => [
                'params' => [
                    'dateStr' => '2018-01-01',
                    'currentYear' => '2020',
                ],
                'expected' => 2,
            ],
            '>-2-age' => [
                'params' => [
                    'dateStr' => '1992-01-01',
                    'currentYear' => '2020',
                ],
                'expected' => 28,
            ],
        ];
    }

    /**
     * @return array
     */
    public function niceTimeProvider()
    {
        return [
            'invalid-date-str' => [
                'params' => [
                    'dateStr' => '',
                    'currentDateTime' => '2018-01-10 10:00:50',
                ],
                'expected' => '',
            ],
            'just-now' => [
                'params' => [
                    'dateStr' => '2018-01-10 10:00:30',
                    'currentDateTime' => '2018-01-10 10:00:50',
                ],
                'expected' => 'just now',
            ],
            '1minute-ago' => [
                'params' => [
                    'dateStr' => '2018-01-10 10:00:30',
                    'currentDateTime' => '2018-01-10 10:01:50',
                ],
                'expected' => '1 minute ago',
            ],
            '2minute-ago' => [
                'params' => [
                    'dateStr' => '2018-01-10 10:00:30',
                    'currentDateTime' => '2018-01-10 10:02:50',
                ],
                'expected' => '2 minutes ago',
            ],
            '1hour-ago' => [
                'params' => [
                    'dateStr' => '2018-01-10 10:00:30',
                    'currentDateTime' => '2018-01-10 11:01:50',
                ],
                'expected' => '1 hour ago',
            ],
            '2hour-ago' => [
                'params' => [
                    'dateStr' => '2018-01-10 10:00:30',
                    'currentDateTime' => '2018-01-10 12:02:50',
                ],
                'expected' => '2 hours ago',
            ],
            '1day-ago' => [
                'params' => [
                    'dateStr' => '2018-01-10 10:00:30',
                    'currentDateTime' => '2018-01-11 10:02:50',
                ],
                'expected' => '1 day ago',
            ],
            '2day-ago' => [
                'params' => [
                    'dateStr' => '2018-01-10 10:00:30',
                    'currentDateTime' => '2018-01-12 10:02:50',
                ],
                'expected' => '2 days ago',
            ],
            '1month-ago' => [
                'params' => [
                    'dateStr' => '2018-01-10 10:00:30',
                    'currentDateTime' => '2018-02-11 10:02:50',
                ],
                'expected' => '1 month ago',
            ],
            '2month-ago' => [
                'params' => [
                    'dateStr' => '2018-01-10 10:00:30',
                    'currentDateTime' => '2018-03-11 10:02:50',
                ],
                'expected' => '2 months ago',
            ],
            '1year-ago' => [
                'params' => [
                    'dateStr' => '2018-01-10 10:00:30',
                    'currentDateTime' => '2019-02-11 10:02:50',
                ],
                'expected' => '1 year ago',
            ],
            '2year-ago' => [
                'params' => [
                    'dateStr' => '2018-01-10 10:00:30',
                    'currentDateTime' => '2020-03-11 10:02:50',
                ],
                'expected' => '2 years ago',
            ],
            '1hour-from-now' => [
                'params' => [
                    'dateStr' => '2018-01-10 10:00:30',
                    'currentDateTime' => '2018-01-10 08:30:50',
                ],
                'expected' => '1 hour from now',
            ],
        ];
    }
}
