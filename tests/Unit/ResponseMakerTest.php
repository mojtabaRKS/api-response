<?php

namespace Liateam\ApiResponse\Tests\Unit;

use RuntimeException;
use Liateam\ApiResponse\ApiResponse;
use Liateam\ApiResponse\Tests\BaseTestCase;
use Liateam\ApiResponse\Contracts\ResponseContract;

class ResponseMakerTest extends BaseTestCase
{

    /**
     * @covers Liateam\ApiResponse\ApiResponse::__callStatic
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::__construct
     * @covers Liateam\ApiResponse\Traits\HasProperty::setCode
     * @covers Liateam\ApiResponse\Traits\HasProperty::setMessage
     * @covers Liateam\ApiResponse\Traits\HasProperty::setSuccessStatus
     * @return void
     */
    public function test_can_create_success_response(): void
    {
        $successResponse = ApiResponse::successResponse();

        $this->assertInstanceOf(ResponseContract::class, $successResponse);
    }

    /**
     * @covers Liateam\ApiResponse\ApiResponse::__callStatic
     * @covers Liateam\ApiResponse\Responses\FailureResponse::__construct
     * @covers Liateam\ApiResponse\Traits\HasProperty::setCode
     * @covers Liateam\ApiResponse\Traits\HasProperty::setMessage
     * @covers Liateam\ApiResponse\Traits\HasProperty::setSuccessStatus
     * @return void
     */
    public function test_can_create_failure_response(): void
    {
        $failureResponse = ApiResponse::failureResponse();

        $this->assertInstanceOf(ResponseContract::class, $failureResponse);
    }

    /**
     * @covers Liateam\ApiResponse\ApiResponse::__callStatic
     * @covers Liateam\ApiResponse\Responses\CustomResponse::__construct
     * @covers Liateam\ApiResponse\Traits\HasProperty::setCode
     * @covers Liateam\ApiResponse\Traits\HasProperty::setMessage
     * @covers Liateam\ApiResponse\Traits\HasProperty::setSuccessStatus
     * @return void
     */
    public function test_can_create_custom_response(): void
    {
        $customResponse = ApiResponse::customResponse();

        $this->assertInstanceOf(ResponseContract::class, $customResponse);
    }

    /**
     * @covers Liateam\ApiResponse\ApiResponse::__callStatic
     * @return void
     */
    public function test_if_instance_is_not_valid_throws_exception()
    {
        $this->expectException(RuntimeException::class);
        ApiResponse::another();
    }
}
