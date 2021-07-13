<?php

namespace Mojtabarks\ApiResponse\Tests\Unit;

use Mojtabarks\ApiResponse\ApiResponse;
use Mojtabarks\ApiResponse\Contracts\ResponseContract;
use Mojtabarks\ApiResponse\Tests\BaseTestCase;
use RuntimeException;

class ResponseMakerTest extends BaseTestCase
{

    public function test_can_create_success_response(): void
    {
        $successResponse = ApiResponse::successResponse();

        $this->assertInstanceOf(ResponseContract::class, $successResponse);
    }

    public function test_can_create_failure_response(): void
    {
        $failureResponse = ApiResponse::failureResponse();

        $this->assertInstanceOf(ResponseContract::class, $failureResponse);
    }

    public function test_can_create_custom_response(): void
    {
        $customResponse = ApiResponse::customResponse();

        $this->assertInstanceOf(ResponseContract::class, $customResponse);
    }

    public function test_if_instance_is_not_valid_throws_exception()
    {
        $this->expectException(RuntimeException::class);
        ApiResponse::another();
    }
}
