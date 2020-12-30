<?php


namespace Liateam\ApiResponse\Traits;

trait HasProperty
{
    /**
     * response status code
     *
     * @var int|null $code
     */
    private $code;

    /**
     * response status message
     *
     * @var string|null $message
     */
    private $message;

    /**
     * response success status
     *
     * @var int $successStatus
     */
    private $successStatus;

    /**
     * response result
     *
     * @var array $result
     */
    private $result = [];

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
    private function setResult(array $parameters): self
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
    private function getResult(): array
    {
        return $this->result;
    }
}
