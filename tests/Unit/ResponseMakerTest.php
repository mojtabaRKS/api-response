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
        $successResponse = ApiResponse::make('success');

        $this->assertInstanceOf(SuccessResponse::class, $successResponse);
    }

    public function test_can_create_failure_response(): void
    {
        $failureResponse = ApiResponse::make('failure');

        $this->assertInstanceOf(FailureResponse::class, $failureResponse);
    }

    public function test_can_create_custom_response(): void
    {
        $customResponse = ApiResponse::make('custom');

        $this->assertInstanceOf(CustomResponse::class, $customResponse);
    }

    public function test_if_instace_is_empty_should_throw_runtime_error()
    {
        $this->expectException(RuntimeException::class);
        ApiResponse::make("");
    }

    public function test_if_instace_is_not_valid_throws_exception()
    {
        $this->expectException(RuntimeException::class);
        ApiResponse::make("another");
    }
}
