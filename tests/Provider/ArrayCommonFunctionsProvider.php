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
            'group-by-2-keys' => [
                'params' => [
                    'array' => $sampleArray,
                    'keys' => ['key1', 'key2'],
                ],
                'expected' => [
                    '1_###_2' => [
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
                    '2_###_2' => [
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

    /**
     * @return array
     */
    public function isAssocArrayProvider()
    {
        return [
            'string' => [
                'array' => 'str',
                'expected' => false,
            ],
            'int' => [
                'array' => 1,
                'expected' => false,
            ],
            'indexed-array' => [
                'array' => [1, 2, 3, 4],
                'expected' => false,
            ],
            'assoc-array' => [
                'array' => [
                    'key1' => 1,
                    'key2' => 2,
                ],
                'expected' => true,
            ],
            'multidimensional-array' => [
                'array' => [
                    [
                        'key1' => 1,
                    ],
                    [
                        'key1' => 2,
                    ],
                ],
                'expected' => false,
            ],
        ];
    }
}
