<?php

namespace Mojtabarks\ApiResponse\Tests\Unit;

use RuntimeException;
use Mojtabarks\ApiResponse\ApiResponse;
use Mojtabarks\ApiResponse\Tests\BaseTestCase;
use Mojtabarks\ApiResponse\Contracts\ResponseContract;

class ResponseMakerTest extends BaseTestCase
{

    /**
     * @covers \Mojtabarks\ApiResponse\ApiResponse::__callStatic
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::__construct
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setCode
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setMessage
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setSuccessStatus
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setResponseKey
     *
     * @return void
     *
     * @uses   \Mojtabarks\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\ResponseMakerTest::test_can_create_success_response
     */
    public function test_can_create_success_response(): void
    {
        $successResponse = ApiResponse::successResponse();

        self::assertInstanceOf(ResponseContract::class, $successResponse);
    }

    /**
     * @covers \Mojtabarks\ApiResponse\ApiResponse::__callStatic
     * @covers \Mojtabarks\ApiResponse\Responses\FailureResponse::__construct
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setCode
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setMessage
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setSuccessStatus
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setResponseKey
     * @return void
     *
     * @uses   \Mojtabarks\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\ResponseMakerTest::test_can_create_failure_response
     */
    public function test_can_create_failure_response(): void
    {
        $failureResponse = ApiResponse::failureResponse();

        self::assertInstanceOf(ResponseContract::class, $failureResponse);
    }

    /**
     * @covers \Mojtabarks\ApiResponse\ApiResponse::__callStatic
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::__construct
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setCode
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setMessage
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setSuccessStatus
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setResponseKey
     * @return void
     *
     * @uses   \Mojtabarks\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\ResponseMakerTest::test_can_create_custom_response
     */
    public function test_can_create_custom_response(): void
    {
        $customResponse = ApiResponse::customResponse();

        self::assertInstanceOf(ResponseContract::class, $customResponse);
    }

    /**
     * @covers \Mojtabarks\ApiResponse\ApiResponse::__callStatic
     * @return void
     *
     * @uses   \Mojtabarks\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\ResponseMakerTest::test_if_instance_is_not_valid_throws_exception
     */
    public function test_if_instance_is_not_valid_throws_exception()
    {
        $this->expectException(RuntimeException::class);
        ApiResponse::another();
    }
}
