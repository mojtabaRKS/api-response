<?php

namespace Liateam\ApiResponse\Responses;

use \Illuminate\Http\JsonResponse;
use Liateam\ApiResponse\HasProperty;
use Liateam\ApiResponse\Response;

class SuccessResponse implements Response
{
    use HasProperty;

    /**
     * @var array $data
     */
    public $data = [];

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return SuccessResponse
     */
    public function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }

    /**
     * renders the error response
     *
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        $this->setResult(['data' => $this->getData()]);

        return response()->json(
            $this->getResult(),
            $this->getCode()
        );
    }
}
