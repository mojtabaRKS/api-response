<?php

namespace Mojtabarks\ApiResponse\Responses;

use Illuminate\Http\Response as HttpResponse;
use Mojtabarks\ApiResponse\Contracts\ResponseContract;

class FailureResponse extends ResponseContract
{
    /**
     * failure response constructor.
     *
     * @param int    $code
     * @param string $message
     */
    public function __construct($code = HttpResponse::HTTP_NOT_ACCEPTABLE, $message = 'something went wrong!', $responseKey = 'error')
    {
        $this->setCode($code);
        $this->setMessage($message);
        $this->setSuccessStatus(false);
        $this->setResponseKey($responseKey);
    }
}
