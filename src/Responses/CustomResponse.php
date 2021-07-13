<?php

namespace Mojtabarks\ApiResponse\Responses;

use Illuminate\Http\Response as HttpResponse;
use Mojtabarks\ApiResponse\Contracts\ResponseContract;

class CustomResponse extends ResponseContract
{
    /**
     * custom response constructor.
     *
     * @param int    $code
     * @param string $message
     * @param string $responseKey
     * @param bool $successStatus
     */
    public function __construct($code = HttpResponse::HTTP_MULTI_STATUS, $message = 'multi status' , $responseKey = 'additional', $successStatus = true)
    {
        $this->setCode($code);
        $this->setMessage($message);
        $this->setSuccessStatus($successStatus);
        $this->setResponseKey($responseKey);
    }
}
