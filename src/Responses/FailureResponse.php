<?php

namespace Liateam\ApiResponse\Responses;

use Illuminate\Http\JsonResponse;
use Liateam\ApiResponse\Response;
use Liateam\ApiResponse\HasProperty;
use \Illuminate\Http\Response as HttpResponse;

class FailureResponse implements Response
{
    use HasProperty;

    /**
     * @var array $error
     */
    public $error = [];

    public function __construct($code = HttpResponse::HTTP_NOT_ACCEPTABLE, $message = 'something went wrong!')
    {
        $this->setCode($code)
            ->setMessage($message)
            ->setSuccessStatus(false);
    }

    /**
     * @return array
     */
    public function getError(): array
    {
        return $this->error;
    }

    /**
     * @param array $error
     * @return FailureResponse
     */
    public function setError(array $error): self
    {
        $this->error = $error;
        return $this;
    }

    /**
     * renders the response
     *
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        $this->setResult(['error' => $this->getError()]);

        return response()->json(
            $this->getResult(),
            $this->getCode()
        );
    }
}
