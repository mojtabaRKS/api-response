<?php


namespace Mojtabarks\ApiResponse\Traits;

trait HasProperty
{
    /**
     * response status code
     *
     * @var int|null $code
     */
    protected $code;

    /**
     * response status message
     *
     * @var string|null $message
     */
    protected $message;

    /**
     * response success status
     *
     * @var int $successStatus
     */
    protected $successStatus;

    /**
     * response key
     *
     * @var string
     */
    protected $responseKey = 'data';

    /**
     * response value
     *
     * @var array
     */
    protected $responseValue = [];

    /**
     * response result
     *
     * @var array $result
     */
    protected $result = [];

    /**
     * set response key
     *
     * @param string $key
     * @return self
     */
    public function setResponseKey($key)
    {
        $this->responseKey = $key;
        return $this;
    }

    /**
     * get response key
     *
     * @return string
     */
    public function getResponseKey()
    {
        return $this->responseKey;
    }

    /**
     * set response value
     *
     * @param string $value
     * @return self
     */
    public function setResponseValue($value)
    {
        $this->responseValue = $value;
        return $this;
    }

    /**
     * get Response value
     *
     * @return string
     */
    public function getResponseValue()
    {
        return $this->responseValue;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return (int) $this->code;
    }

    /**
     * @param int|null $code
     * @return self
     */
    public function setCode(?int $code): self
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     * @return self
     */
    public function setMessage(?string $message): self
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return bool
     */
    public function getSuccessStatus(): bool
    {
        return (bool) $this->successStatus;
    }

    /**
     * @param bool|null $successStatus
     * @return self
     */
    public function setSuccessStatus(?bool $successStatus): self
    {
        $this->successStatus = $successStatus;
        return $this;
    }

    /**
     * @param array $parameters
     * @return self
     */
    protected function setResult(array $parameters): self
    {
        $this->result = array_merge([
            'success' => $this->getSuccessStatus(),
            'code' => $this->getCode(),
            'message' => $this->getMessage(),
        ] , $parameters);

        return $this;
    }

    /**
     * @return array
     */
    protected function getResult(): array
    {
        return $this->result;
    }
}
