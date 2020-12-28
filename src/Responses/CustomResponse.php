<?php

namespace Liateam\ApiResponse\Responses;

use Illuminate\Http\JsonResponse;
use Liateam\ApiResponse\HasProperty;
use Liateam\ApiResponse\Response;

class CustomResponse implements Response
{
    use HasProperty;

    /**
     * @var array
     */
    private $additional = [];

    public function render(): JsonResponse
    {
        $this->setResult(['additional' => $this->getAdditional()]);

        return response()->json(
            $this->getResult(),
            $this->getCode()
        );
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
}
