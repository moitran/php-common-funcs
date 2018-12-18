<?php

namespace MoiTran\CommonFunctions {
    function time()
    {
        global $mockTimeCreate;
        global $mockTimeValue;
        if (isset($mockTimeCreate) && $mockTimeCreate === true) {
            return $mockTimeValue;
        }

        return call_user_func_array('\time', func_get_args());
    }

    class ClassA {
        public static function test($arg1, $arg2)
        {
            return $arg1 + $arg2;
        }
    }
}
