<?php

namespace Liateam\ApiResponse\Contracts;

use \Illuminate\Http\JsonResponse;

interface ResponseContract
{
    /**
     * @return JsonResponse
     */
    public function render(): JsonResponse;
}
