<?php

namespace Liateam\ApiResponse\Responses;

use Illuminate\Http\JsonResponse;
use Liateam\ApiResponse\HasProperty;
use Liateam\ApiResponse\Response;

class FailureResponse implements Response
{
    use HasProperty;

    /**
     * @var array $error
     */
    public $error = [];

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
