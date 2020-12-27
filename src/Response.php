<?php

namespace Liateam\ApiResponse;

abstract class Response
{
    public $code = null;

    public $message = null;

    public $successStatus = false;

    /**
     * @return null
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param null $code
     * @return Response
     */
    public function setCode($code): self
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return null
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param null $message
     * @return Response
     */
    public function setMessage($message): self
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return bool
     */
    public function getSuccessStatus(): bool
    {
        return $this->successStatus;
    }

    /**
     * @param bool $successStatus
     * @return Response
     */
    public function setSuccessStatus(bool $successStatus): self
    {
        $this->successStatus = $successStatus;
        return $this;
    }


}
