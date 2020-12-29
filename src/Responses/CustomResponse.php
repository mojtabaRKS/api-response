<?php

namespace Liateam\ApiResponse\Responses;

use Illuminate\Http\JsonResponse;
use Liateam\ApiResponse\Traits\HasProperty;
use \Illuminate\Http\Response as HttpResponse;
use Liateam\ApiResponse\Contracts\ResponseContract;

class CustomResponse implements ResponseContract
{
    use HasProperty;

    /**
     * @var array
     */
    private $additional = [];

    public function __construct($code = HttpResponse::HTTP_MULTI_STATUS, $message = 'multi status')
    {
        $this->setCode($code)
            ->setMessage($message)
            ->setSuccessStatus(true);
    }

    /**
     * @return array
     */
    public function getAdditional(): array
    {
        return $this->additional;
    }

    /**
     * @param array $additional
     * @return CustomResponse
     */
    public function setAdditional(array $additional): self
    {
        $this->additional = $additional;
        return $this;
    }

    /**
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        $this->setResult(['additional' => $this->getAdditional()]);

        return response()->json(
            $this->getResult(),
            $this->getCode()
        );
    }
}
