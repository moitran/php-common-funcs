<?php

namespace MoiTran\CommonFunctions;

/**
 * Class DateCommonFunctions
 * @package MoiTran\CommonFunctions
 */
class DateCommonFunctions
{
    /**
     * @codeCoverageIgnore
     *
     * @param string $format
     *
     * @return false|string
     */
    public static function getCurrentTime(string $format = 'Y-m-d')
    {
        return date($format, time());
    }

    /**
     * @codeCoverageIgnore
     * @return int
     */
    public static function getNow()
    {
        return time();
    }

    /**
     * @param string $dateStr
     * @param string $format
     *
     * @return string
     */
    public static function format(string $dateStr, string $format = 'Y-m-d H:i:s')
    {
        $date = new \DateTime($dateStr);

        return $date->format($format);
    }

    /**
     * @param string $startDate
     * @param string $endDate
     * @param string $format
     *
     * @return array
     * @throws \Exception
     */
    public static function getListDateRange(string $startDate, string $endDate, string $format = 'Y-m-d')
    {
        $startDate = new \DateTime($startDate);
        $endDate = new \DateTime($endDate);
        $endDate->modify('+1 day');

        $dateRange = new \DatePeriod($startDate, new \DateInterval('P1D'), $endDate);
        $result = [];

        foreach ($dateRange as $date) {
            /**
             * @var \DateTime $date
             */
            $result[] = $date->format($format);
        }

        return $result;
    }

    /**
     * @param string $dateStr
     * @param int $previousNumber
     * @param string $format
     *
     * @return string
     */
    public static function getPreviousDates(string $dateStr, int $previousNumber = 1, string $format = 'Y-m-d')
    {
        $date = new \DateTime($dateStr);
        $date->modify("- $previousNumber days");

        return $date->format($format);
    }

    /**
     * @param string $startDate
     * @param string $endDate
     * @param string $format
     *
     * @return array
     * @throws \Exception
     */
    public static function getPreviousDateRange(
        string $startDate,
        string $endDate,
        string $format = 'Y-m-d'
    ) {
        $startDate = new \DateTime($startDate);
        $endDate = new \DateTime($endDate);

        $diff = $startDate->diff($endDate)->format('%a');
        if ($diff == 0) {
            $previousStartDate = $startDate->modify('-1 day')->format($format);
            $previousEndDate = $endDate->modify('-1 day')->format($format);
        } else {
            $previousEndDate = $startDate->modify('-1 day')->format($format);
            $previousStartDate = $startDate->modify('- ' . $diff . ' days')->format($format);
        }

        return self::getListDateRange($previousStartDate, $previousEndDate, $format);
    }

    /**
     * @param string $dateStr1
     * @param string $dateStr2
     * @param string $returnType S: seconds, M: minutes, H: hours, D: days
     *
     * @return float|int
     */
    public static function getTimeBetweenTwoDate(string $dateStr1, string $dateStr2, $returnType = 'S')
    {
        $date1 = strtotime($dateStr1);
        $date2 = strtotime($dateStr2);
        $diff = abs($date1 - $date2);

        switch ($returnType) {
            case 'S':
                return $diff;
            case 'M':
                return round($diff / 60, 2);
            case 'H':
                return round($diff / 60 / 60, 2);
            case 'D':
                return round($diff / 60 / 60 / 24, 2);
            default:
                return $diff;
        }
    }

    /**
     * @param string $dateStr
     * @param string $currentYear
     *
     * @return string
     */
    public static function getAge(string $dateStr, $currentYear = '')
    {
        $date = new \DateTime(date('Y-m-d', strtotime($dateStr)));
        $year = $date->format('Y');
        $currentYear = $currentYear == '' ? self::getCurrentTime('Y') : $currentYear;

        return $currentYear - $year;
    }

    /**
     * @param string $dateStr
     * @param string $currentDateTime
     *
     * @return string
     */
    public static function niceTime(string $dateStr, $currentDateTime = '')
    {
        $periods = ['second', 'minute', 'hour', 'day', 'week', 'month', 'year', 'decade'];
        $lengths = ['60', '60', '24', '7', '4.35', '12', '10'];

        $now = $currentDateTime == '' ? self::getNow() : strtotime($currentDateTime);
        $unixDate = strtotime($dateStr);

        // check validity of date
        if (empty($unixDate)) {
            return '';
        }

        // is it future date or past date
        if ($now >= $unixDate && $now - $unixDate <= 60) {
            return 'just now';
        } elseif ($now > $unixDate) {
            $difference = $now - $unixDate;
            $tense = 'ago';
        } else {
            $difference = $unixDate - $now;
            $tense = 'from now';
        }

        for ($i = 0; $difference >= $lengths[$i] && $i < count($lengths) - 1; $i++) {
            $difference /= $lengths[$i];
        }

        $difference = round($difference);

        if ($difference != 1) {
            $periods[$i] .= 's';
        }

        return sprintf('%s %s %s', $difference, $periods[$i], $tense);
    }
}
