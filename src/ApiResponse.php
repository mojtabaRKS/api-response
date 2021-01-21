<?php

namespace Mojtabarks\ApiResponse;

use RuntimeException;
use Mojtabarks\ApiResponse\Contracts\ResponseContract;

class ApiResponse
{
    /**
     * @param $className
     * @param $arguments
     * @return ResponseContract
     */
    public static function __callStatic($className, $arguments): ResponseContract
    {
        $className = ucfirst($className);
        $nameSpace = "Mojtabarks\\ApiResponse\\Responses";
        $class = "{$nameSpace}\\{$className}";

        if (!class_exists($class)) {
            throw new RuntimeException("class [{$class}] not exists !");
        }

        return new $class;
    }
}
