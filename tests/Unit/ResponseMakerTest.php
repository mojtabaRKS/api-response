<?php

namespace Liateam\ApiResponse\Tests\Unit;

use RuntimeException;
use Liateam\ApiResponse\ApiResponse;
use Liateam\ApiResponse\Tests\BaseTestCase;
use Liateam\ApiResponse\Contracts\ResponseContract;

class ResponseMakerTest extends BaseTestCase
{

    /**
     * @covers \Liateam\ApiResponse\ApiResponse::__callStatic
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::__construct
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setCode
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setMessage
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setSuccessStatus
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setResponseKey
     *
     * @return void
     *
     * @uses   \Liateam\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\ResponseMakerTest::test_can_create_success_response
     */
    public function test_can_create_success_response(): void
    {
        $successResponse = ApiResponse::successResponse();

        self::assertInstanceOf(ResponseContract::class, $successResponse);
    }

    /**
     * @covers \Liateam\ApiResponse\ApiResponse::__callStatic
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::__construct
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setCode
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setMessage
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setSuccessStatus
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setResponseKey
     * @return void
     *
     * @uses   \Liateam\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\ResponseMakerTest::test_can_create_failure_response
     */
    public function test_can_create_failure_response(): void
    {
        $failureResponse = ApiResponse::failureResponse();

        self::assertInstanceOf(ResponseContract::class, $failureResponse);
    }

    /**
     * @covers \Liateam\ApiResponse\ApiResponse::__callStatic
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::__construct
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setCode
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setMessage
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setSuccessStatus
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setResponseKey
     * @return void
     *
     * @uses   \Liateam\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\ResponseMakerTest::test_can_create_custom_response
     */
    public function test_can_create_custom_response(): void
    {
        $customResponse = ApiResponse::customResponse();

        self::assertInstanceOf(ResponseContract::class, $customResponse);
    }

    /**
     * @covers \Liateam\ApiResponse\ApiResponse::__callStatic
     * @return void
     *
     * @uses   \Liateam\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\ResponseMakerTest::test_if_instance_is_not_valid_throws_exception
     */
    public function test_if_instance_is_not_valid_throws_exception()
    {
        $this->expectException(RuntimeException::class);
        ApiResponse::another();
    }
}
