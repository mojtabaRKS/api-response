<?php

namespace Liateam\ApiResponse\Responses;

use Illuminate\Http\Response as HttpResponse;
use Liateam\ApiResponse\Contracts\ResponseContract;

class CustomResponse extends ResponseContract
{
    /**
     * custom response constructor
     *
     * @param int $code
     * @param string $message
     * @param string $responseKey
     */
    public function __construct($code = HttpResponse::HTTP_MULTI_STATUS, $message = 'multi status' , $responseKey = 'additional')
    {
        $this->setCode($code);
        $this->setMessage($message);
        $this->setSuccessStatus(true);
        $this->setResponseKey($responseKey);
    }
}
