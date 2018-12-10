<?php

namespace MoiTran\CommonFunctions;

/**
 * Class ArrayCommonFunctions
 * @package MoiTran\CommonFunctions
 */
class ArrayCommonFunctions
{
    const LOWER_CASE_FUNC = 'strtolower';
    const UPPER_CASE_FUNC = 'strtoupper';

    /**
     * Group items in array by values of keys
     *
     * @param array $array
     * @param array $keys List keys
     *
     * @example
     * Input:
     *      $array = [
     *          [
     *              'key1' => 1,
     *              'key2' => 2,
     *              'key3' => 3,
     *          ],
     *          [
     *              'key1' => 1,
     *              'key2' => 2,
     *              'key3' => 6,
     *          ]
     *          [
     *              'key1' => 1,
     *              'key2' => 3,
     *              'key3' => 7,
     *          ]
     *      ]
     *      $keys = ['key1', 'key2']
     * Output:
     *      [
     *          '1_2' => [
     *              [
     *                  'key1' => 1,
     *                  'key2' => 2,
     *                  'key3' => 3,
     *              ],
     *              [
     *                  'key1' => 1,
     *                  'key2' => 2,
     *                  'key3' => 6,
     *              ],
     *          ],
     *          '1_3' => [
     *              [
     *                  'key1' => 1,
     *                  'key2' => 3,
     *                  'key3' => 7,
     *              ],
     *          ],
     *      ]
     * @throws \Exception
     * @return array
     */
    public static function groupItemsByKeys(array $array, array $keys)
    {
        $result = [];
        foreach ($array as $item) {
            $groupKeyArr = [];
            foreach ($keys as $key) {
                if (!isset($item[$key])) {
                    throw new \Exception("$key does't exist in array");
                }
                $groupKeyArr[] = $item[$key];
            }
            $groupKeyStr = implode('_###_', $groupKeyArr);
            $result[$groupKeyStr][] = $item;
        }

        return $result;
    }

    /**
     * @param $array
     *
     * @return bool
     */
    public static function isAssocArray($array)
    {
        if (!is_array($array) || count($array) !== count($array, COUNT_RECURSIVE)) {
            return false;
        }

        return array_keys($array) !== range(0, count($array) - 1);
    }

    /**
     * @param $array
     *
     * @return bool
     */
    public static function isNumericArray($array)
    {
        if (!is_array($array) || count($array) !== count($array, COUNT_RECURSIVE)) {
            return false;
        }

        return array_keys($array) === range(0, count($array) - 1);
    }

    /**
     * @param $array
     * @param string $func
     *
     * @return array
     */
    public static function convertLowerUpperCase($array, $func = self::LOWER_CASE_FUNC)
    {
        if (self::isAssocArray($array) || self::isNumericArray($array)) {
            return array_map($func, $array);
        }

        return $array;
    }

    /**
     * @param array $array
     * @param array $keys
     * @param string $sortType
     *
     * @return array
     * @throws \Exception
     */
    public static function sortBy(array $array, array $keys, $sortType = 'ASC')
    {
        if (!self::isNumericArray($keys)) {
            throw new \Exception('keys must be an numeric array');
        }

        $sortFunc = function ($a, $b) use ($keys, $sortType) {
            if (!is_array($a) || !is_array($b)) {
                throw new \Exception('array must be a multidimensional array');
            }
            foreach ($keys as $key) {
                if (!isset($a[$key]) || !isset($b[$key])) {
                    throw new \Exception("item in array does't exist key: $key");
                }

                $a = $a[$key];
                $b = $b[$key];
                if ($a == $b) { // value is equal -> sort by key
                    return 0;
                }
                if ($sortType === "DESC") {
                    return $a > $b ? -1 : 1;
                } else {
                    return $a < $b ? -1 : 1;
                }
            }
        };
        usort($array, $sortFunc);

        return $array;
    }
}
