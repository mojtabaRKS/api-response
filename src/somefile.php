<?php


namespace App\Traits;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class ApiResponseTrait
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var null
     */
    protected $responseMessage = null; // custom message

    /**
     * @var bool
     */
    protected $status = true; // false or true

    /**
     * @var int
     */
    protected $httpCode = Response::HTTP_OK; // http code example 400, 401, 200

    /**
     * @var array
     */
    protected $result = []; //result that return to client

    /**
     * @var array
     */
    protected $errors = []; //error response

    /**
     * @param array $data
     * @return $this
     */
    public function setData($data = [])
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param string $responseMessage
     * @return $this
     */
    public function setResponseMessage(string $responseMessage)
    {
        $this->responseMessage = $responseMessage;
        return $this;
    }

    /**
     * @return null
     */
    public function getResponseMessage()
    {
        return $this->responseMessage;
    }

    /**
     * @param $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $httpCode
     * @return $this
     */
    public function setHttpCode(int $httpCode)
    {
        $this->httpCode = $httpCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getHttpCode()
    {
        return $this->httpCode;
    }

    /**
     * @return $this
     */
    public function setResult()
    {
        $this->result['result']  = $this->getData();
        $this->result["message"] = $this->getResponseMessage();
        $this->result["status"]  = $this->getStatus();
        $this->result['errors']  = $this->getErrors();
        return $this;
    }

    /**
     * @return array
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param array $errors
     * @return $this
     */
    public function setErrors($errors = [])
    {
        $this->errors = $errors;
        return $this;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param string $message
     * @param int $httpCode
     * @param bool $status
     * @return $this
     */
    public function setParams(string $message, int $httpCode, bool $status)
    {
        $this->setHttpCode($httpCode)
            ->setResponseMessage($message)
            ->setStatus($status);
        return $this;
    }

    /**
     * @return JsonResponse
     */
    public function response(): JsonResponse
    {
        $this->setResult();
        return response()->json($this->getResult(), $this->getHttpCode());
    }

    /**
     * @param string|null $message
     * @return $this
     */
    public function successResponse(string $message = null)
    {
        $message = $message ?? trans('global.successfully_response');
        $this->setParams($message, Response::HTTP_OK, true);
        return $this;
    }

    /**
     * @param string|null $message
     * @param int $httpCode
     * @return $this
     */
    public function errorResponse(string $message = null, int $httpCode = Response::HTTP_NOT_ACCEPTABLE)
    {
        $message = $message ?? trans('global.failed_response');
        $this->setParams($message, $httpCode, false);
        return $this;
    }

    /**
     * @param string|null $message
     * @return $this
     */
    public function createdResponse(string $message = null)
    {
        $message = $message ?? trans('global.item_created');
        $this->setParams($message, Response::HTTP_CREATED, true);
        return $this;
    }

    /**
     * @param string|null $message
     * @return $this
     */
    public function notFoundResponse(string $message = null)
    {
        $message = $message ?? trans('global.item_not_found');
        $this->setParams($message, Response::HTTP_NOT_FOUND, false);
        return $this;
    }

    /**
     * @param string|null $message
     * @return $this
     */
    public function failedResponse(string $message = null)
    {
        $message = $message ?? trans('global.an_error_occurred');
        $this->setParams($message, Response::HTTP_INTERNAL_SERVER_ERROR, false);
        return $this;
    }

    /**
     * @param string|null $message
     * @return $this
     */
    public function internalErrorResponse(string $message = null)
    {
        $message = $message ?? trans('global.internal_error');
        $this->setParams($message, Response::HTTP_INTERNAL_SERVER_ERROR, false);
        return $this;
    }

    /**
     * @param string|null $message
     * @return $this
     */
    public function queryErrorResponse(string $message = null)
    {
        $message = $message ?? trans('global.query_error');
        $this->setParams($message, Response::HTTP_INTERNAL_SERVER_ERROR, false);
        return $this;
    }

    /**
     * @param string|null $message
     * @return $this
     */
    public function notAuthenticatedResponse(string $message = null)
    {
        $message = $message ?? trans('global.unauthenticated');
        $this->setParams($message, Response::HTTP_UNAUTHORIZED, false);
        return $this;
    }

    /**
     * @param string|null $message
     * @return $this
     */
    public function methodNotAllowedHttpException(string $message = null)
    {
        $message = $message ?? trans('global.method_not_allowed');
        $this->setParams($message, Response::HTTP_METHOD_NOT_ALLOWED, false);
        return $this;
    }

    /**
     * @param string|null $message
     * @return $this
     */
    public function notAuthorizedResponse(string $message = null)
    {
        $message = $message ?? trans('global.unauthorized_error');
        $this->setParams($message, Response::HTTP_FORBIDDEN, false);
        return $this;
    }

    /**
     * @param string|null $message
     * @return $this
     */
    public function badRequestResponse(string $message = null)
    {
        $message = $message ?? trans('global.bad_request_error');
        $this->setParams($message, Response::HTTP_BAD_REQUEST, false);
        return $this;
    }

    /**
     * @param string|null $message
     * @return $this
     */
    public function unprocessableEntityResponse(string $message = null)
    {
        $message = $message ?? trans('global.bad_request_error');
        $this->setParams($message, Response::HTTP_UNPROCESSABLE_ENTITY, false);
        return $this;
    }

    /**
     * @param string $message
     * @return $this
     */
    public function validationErrorResponse(string $message = null)
    {
        $message = $message ?? trans('global.validation_error_message');
        $this->setParams($message, Response::HTTP_UNPROCESSABLE_ENTITY, false);
        return $this;
    }

    /**
     * @param             $data
     * @param bool $status
     * @param int $httpCode
     * @param string|null $message
     * @param array $errors
     * @return $this
     */
    public function customResponse(
        $data,
        bool $status = true,
        int $httpCode = Response::HTTP_OK,
        string $message = null,
        array $errors = []
    ) {
        $this->setData($data);
        $this->setErrors($errors);
        $this->setParams($message, $httpCode, $status);
        return $this;
    }
}
