<?php

namespace Liateam\ApiResponse;

use \Illuminate\Http\JsonResponse;

interface Response
{
    /**
     * @return JsonResponse
     */
    public function render(): JsonResponse;
}
