<?php

namespace Mojtabarks\ApiResponse\Responses;

use Illuminate\Http\Response as HttpResponse;
use Mojtabarks\ApiResponse\Contracts\ResponseContract;

class SuccessResponse extends ResponseContract
{
    /**
     * CustomResponse constructor.
     *
     * @param int    $code
     * @param string $message
     */
    public function __construct($code = HttpResponse::HTTP_OK, $message = 'Ok', $responseKey = 'data')
    {
        $this->setCode($code);
        $this->setMessage($message);
        $this->setSuccessStatus(true);
        $this->setResponseKey($responseKey);
    }
}
