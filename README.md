# php-common-funs

Writing useful common functions in php

[![Latest Stable Version](https://poser.pugx.org/moitran/php-common-funcs/v/stable)](https://packagist.org/packages/moitran/php-common-funcs)
[![Latest Unstable Version](https://poser.pugx.org/moitran/php-common-funcs/v/unstable)](https://packagist.org/packages/moitran/php-common-funcs)
[![Build Status](https://travis-ci.org/moitran/php-common-funcs.svg?branch=master)](https://travis-ci.org/moitran/php-common-funcs)
[![codecov](https://codecov.io/gh/moitran/php-common-funcs/branch/master/graphs/badge.svg)](https://codecov.io/gh/moitran/php-common-funcs)
[![License](https://poser.pugx.org/moitran/php-common-funcs/license)](https://packagist.org/packages/moitran/php-common-funcs)
[![composer.lock](https://poser.pugx.org/moitran/php-common-funcs/composerlock)](https://packagist.org/packages/moitran/php-common-funcs)


## Installation
```bash
$ composer require moitran/php-common-funcs
```

## What does it have?
* ### Array
    * **groupItemsByKeys** Group items in multidimensional array by values of list keys argument.
    * **isAssocArray** Checking array input is assoc array or not [List types of array](https://www.w3schools.com/php/php_arrays.asp).
    * **isNumericArray** Checking array input is numeric array or not [List types of array](https://www.w3schools.com/php/php_arrays.asp).
    * **convertLowerUpperCase** Convert all string values in array to lower case or upper case.
    * **sortBy** Sorting multidimensional array by list keys.
* ### DateTime
    * **getCurrentTime** Get current time with format argument
    * **getNow** Return current Unix timestamp
    * **format** Receive an date string argument and return in the specified format.
    * **getListRangeDate** Return list dates between two dates in the specified format.
    * **getPreviousDates** Return previous date in the specified format with argument is number of previous date.
    * **getPreviousDateRange** Return list previous range dates opposite with date range argument.
    * **getTimeBetweenTwoDate** Return number of Seconds (S), Minutes (M), Hours (H) or Days (D) between two dates.
    * **getAge** Return age by date of birth.
    * **niceTime** Return nice time format.
## Best practice to use (*IMO)
All functions in this package have static method so that if we call functions redirect like this way. It will be so hard to write the phpunit test code.  
```php

use MoiTran\CommonFunctions\DateCommonFunctions;

class A {
    public function doSomeThing() {
        $time = DateCommonFunctions::getCurrentTime('Y/m/d');
        // do some thing
    }
}
```
The solution for it is using this trait [StaticCalling](https://github.com/moitran/php-common-funcs/blob/master/src/StaticCalling.php) to call those static functions.
The code will be like this one
```php
use MoiTran\CommonFunctions\DateCommonFunctions;
use MoiTran\CommonFunctions\StaticCalling;

class A {
    use StaticCalling;

    public function doSomeThing() {
        $time = $this->callStatic(DateCommonFunctions::class, DateCommonFunctions::GET_CURRENT_TIME_FUNC, ['Y/m/d']);
        // do some thing
    }
}
```

## License
This package is under [MIT License](https://github.com/moitran/php-common-funcs/blob/master/LICENSE)
