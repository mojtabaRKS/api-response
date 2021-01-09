<?php

namespace Liateam\ApiResponse\Responses;

use \Illuminate\Http\JsonResponse;
use Liateam\ApiResponse\Traits\HasProperty;
use Illuminate\Http\Response as HttpResponse;
use Liateam\ApiResponse\Contracts\ResponseContract;

class SuccessResponse implements ResponseContract
{
    use HasProperty;

    /**
     * @var array $data
     */
    private $data = [];

    /**
     * CustomResponse constructor.
     * @param int $code
     * @param string $message
     */
    public function __construct($code = HttpResponse::HTTP_OK, $message = 'Ok')
    {
        $this->code = $code;
        $this->message = $message;
        $this->successStatus = true;
    }


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
