<?php

namespace MoiTran\CommonFunctions\Tests\Provider;

/**
 * Trait ArrayCommonFunctionsProvider
 * @package MoiTran\Test\Provider
 */
trait ArrayCommonFunctionsProvider
{
    /**
     * @return array
     */
    public function groupItemsByKeysProvider()
    {
        $sampleArray = [
            [
                'key1' => 1,
                'key2' => 2,
                'key3' => 3,
            ],
            [
                'key1' => 1,
                'key2' => 2,
                'key3' => 4,
            ],
            [
                'key1' => 1,
                'key2' => 2,
                'key3' => 6,
            ],
            [
                'key1' => 2,
                'key2' => 2,
                'key3' => 6,
            ],
        ];

        return [
            'key-not-exit-in-array' => [
                'params' => [
                    'array' => $sampleArray,
                    'keys' => ['key1', 'key4'],
                ],
                'expected' => 'key4 does\'t exist in array',
            ],
            'group-by-one-key' => [
                'params' => [
                    'array' => $sampleArray,
                    'keys' => ['key1'],
                ],
                'expected' => [
                    '1' => [
                        [
                            'key1' => 1,
                            'key2' => 2,
                            'key3' => 3,
                        ],
                        [
                            'key1' => 1,
                            'key2' => 2,
                            'key3' => 4,
                        ],
                        [
                            'key1' => 1,
                            'key2' => 2,
                            'key3' => 6,
                        ],
                    ],
                    '2' => [
                        [
                            'key1' => 2,
                            'key2' => 2,
                            'key3' => 6,
                        ],
                    ],
                ],
            ],
        ];
    }
}
