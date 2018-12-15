<?php

namespace MoiTran\CommonFunctions;

/**
 * Trait StaticCalling
 * @package MoiTran\CommonFunctions
 * @codeCoverageIgnore
 */
trait StaticCalling
{
    /**
     * @param $className
     * @param $methodName
     * @param array $parameters
     *
     * @return mixed
     */
    public function callStatic($className, $methodName, $parameters = [])
    {
        return call_user_func_array($className . '::' . $methodName, $parameters);
    }
}
