<?php

namespace Liateam\ApiResponse;

use RuntimeException;
use Liateam\ApiResponse\Contracts\ResponseContract;

class ApiResponse
{
    /**
     * @param string $instance
     * @return ResponseContract
     * @throws RuntimeException
     */
    public static function make(string $instance): ResponseContract
    {
        if (empty($instance)) {
            throw new RuntimeException("please set your desired response !");
        }

        $nameSpace = "Liateam\\ApiResponse\\Responses";
        $instance = ucfirst($instance) . 'Response';
        $class = "{$nameSpace}\\{$instance}";

        if (!class_exists($class)) {
            throw new RuntimeException("class [{$instance}] not exists !");
        }

        return new $class;
    }
}
