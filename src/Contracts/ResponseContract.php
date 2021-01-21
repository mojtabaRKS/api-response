<?php

namespace Mojtabarks\ApiResponse\Contracts;

use \Illuminate\Http\JsonResponse;
use Mojtabarks\ApiResponse\Traits\HasProperty;

abstract class ResponseContract
{
    use HasProperty;

    
    /**
     * renders the error response
     *
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        $this->setResult([$this->getResponseKey() => $this->getResponseValue()]);

        return response()->json(
            $this->getResult(),
            $this->getCode()
        );
    }
}
