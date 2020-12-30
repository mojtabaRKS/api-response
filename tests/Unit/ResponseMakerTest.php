<?php

namespace Tests\Unit;

use RuntimeException;
use Tests\BaseTestCase;
use Liateam\ApiResponse\ApiResponse;
use Liateam\ApiResponse\Responses\CustomResponse;
use Liateam\ApiResponse\Responses\FailureResponse;
use Liateam\ApiResponse\Responses\SuccessResponse;

class ResponseMakerTest extends BaseTestCase
{
    public function test_can_create_success_response(): void
    {
        $successResponse = ApiResponse::successResponse();

        $this->assertInstanceOf(SuccessResponse::class, $successResponse);
    }

    public function test_can_create_failure_response(): void
    {
        $failureResponse = ApiResponse::failureResponse();

        $this->assertInstanceOf(FailureResponse::class, $failureResponse);
    }

    public function test_can_create_custom_response(): void
    {
        $customResponse = ApiResponse::customResponse();

        $this->assertInstanceOf(CustomResponse::class, $customResponse);
    }

    public function test_if_instace_is_not_valid_throws_exception()
    {
        $this->expectException(RuntimeException::class);
        ApiResponse::another();
    }
}
