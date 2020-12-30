<?php

namespace Liateam\ApiResponse;

use RuntimeException;
use Liateam\ApiResponse\Contracts\ResponseContract;

class ApiResponse
{
    /**
     * @param $className
     * @param $arguments
     * @return ResponseContract
     */
    public static function __callStatic($className, $arguments): ResponseContract
    {
        if (empty($className)) {
            throw new RuntimeException("please set your desired response !");
        }

        $className = ucfirst($className);
        if (!class_exists($className)) {
            throw new RuntimeException("class [{$className}] not exists !");
        }

        $nameSpace = "Liateam\\ApiResponse\\Responses";
        $class = "{$nameSpace}\\{$className}";

        return new $class($arguments);
    }
}
