<?php

namespace MoiTran\CommonFunctions\Tests\Provider;

use MoiTran\CommonFunctions\ArrayCommonFunctions;

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
            'numeric-array' => [
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
            'multidimensional-numeric-array' => [
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
            'multidimensional-assoc-array' => [
                'array' => [
                    'key1' => [
                        'key1' => 1,
                    ],
                    'key2' => [
                        'key1' => 2,
                    ],
                ],
                'expected' => false,
            ],
        ];
    }

    /**
     * @return array
     */
    public function isNumericArrayProvider()
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
            'numeric-array' => [
                'array' => [1, 2, 3, 4],
                'expected' => true,
            ],
            'assoc-array' => [
                'array' => [
                    'key1' => 1,
                    'key2' => 2,
                ],
                'expected' => false,
            ],
            'multidimensional-numeric-array' => [
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
            'multidimensional-assoc-array' => [
                'array' => [
                    'key1' => [
                        'key1' => 1,
                    ],
                    'key2' => [
                        'key1' => 2,
                    ],
                ],
                'expected' => false,
            ],
        ];
    }

    public function convertLowerUpperCaseProvider()
    {
        return [
            'string-input-upper' => [
                'params' => [
                    'array' => 'str',
                    'func' => ArrayCommonFunctions::LOWER_CASE_FUNC,
                ],
                'expected' => 'str',
            ],
            'string-input-lower' => [
                'params' => [
                    'array' => 'str',
                    'func' => ArrayCommonFunctions::UPPER_CASE_FUNC,
                ],
                'expected' => 'str',
            ],
            'int-input-upper' => [
                'params' => [
                    'array' => 1,
                    'func' => ArrayCommonFunctions::LOWER_CASE_FUNC,
                ],
                'expected' => 1,
            ],
            'int-input-lower' => [
                'params' => [
                    'array' => 1,
                    'func' => ArrayCommonFunctions::UPPER_CASE_FUNC,
                ],
                'expected' => 1,
            ],
            'multidimensional-array-lower' => [
                'params' => [
                    'array' => [
                        [
                            'key1' => 'val1',
                        ],
                        [
                            'key1' => 'val1',
                        ],
                    ],
                    'func' => ArrayCommonFunctions::LOWER_CASE_FUNC,
                ],
                'expected' => [
                    [
                        'key1' => 'val1',
                    ],
                    [
                        'key1' => 'val1',
                    ],
                ],
            ],
            'multidimensional-array-upper' => [
                'params' => [
                    'array' => [
                        [
                            'key1' => 'val1',
                        ],
                        [
                            'key1' => 'val1',
                        ],
                    ],
                    'func' => ArrayCommonFunctions::UPPER_CASE_FUNC,
                ],
                'expected' => [
                    [
                        'key1' => 'val1',
                    ],
                    [
                        'key1' => 'val1',
                    ],
                ],
            ],
            'assoc-array-number-lower-lower' => [
                'params' => [
                    'array' => [1, 2, 3],
                    'func' => ArrayCommonFunctions::LOWER_CASE_FUNC,
                ],
                'expected' => [1, 2, 3],
            ],
            'assoc-array-str-lower-lower' => [
                'params' => [
                    'array' => ['val1', 'val2', 'val3'],
                    'func' => ArrayCommonFunctions::LOWER_CASE_FUNC,
                ],
                'expected' => ['val1', 'val2', 'val3'],
            ],
            'numeric-array-str-upper-lower' => [
                'params' => [
                    'array' => ['VAL1', 'VAL2', 'VAL3'],
                    'func' => ArrayCommonFunctions::LOWER_CASE_FUNC,
                ],
                'expected' => ['val1', 'val2', 'val3'],
            ],
            'numeric-array-str-lower-upper' => [
                'params' => [
                    'array' => ['val1', 'val2', 'val3'],
                    'func' => ArrayCommonFunctions::UPPER_CASE_FUNC,
                ],
                'expected' => ['VAL1', 'VAL2', 'VAL3'],
            ],
            'numeric-array-str-upper-upper' => [
                'params' => [
                    'array' => ['VAL1', 'VAL2', 'VAL3'],
                    'func' => ArrayCommonFunctions::UPPER_CASE_FUNC,
                ],
                'expected' => ['VAL1', 'VAL2', 'VAL3'],
            ],
            'assoc-array-str-upper-lower' => [
                'params' => [
                    'array' => ['key1' => 'VAL1', 'key2' => 'VAL2', 'key3' => 'VAL3'],
                    'func' => ArrayCommonFunctions::LOWER_CASE_FUNC,
                ],
                'expected' => ['key1' => 'val1', 'key2' => 'val2', 'key3' => 'val3'],
            ],
        ];
    }
}
