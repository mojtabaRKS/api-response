<?php

namespace Tests\Unit;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Liateam\ApiResponse\Responses\FailureResponse;
use Tests\BaseTestCase;

class FailureResponseTest extends BaseTestCase
{
    /**
     * @var FailureResponse
     */
    public $failureResponse;

    public function setUp(): void
    {
        $this->failureResponse = new FailureResponse();
        parent::setUp();
    }

    /**
     * @retun void
     */
    public function test_can_set_code_in_failure_response(): void
    {
        $this->assertTrue(property_exists($this->failureResponse , 'code'));
        $this->assertTrue(method_exists($this->failureResponse, 'setCode'));
        $this->assertTrue(method_exists($this->failureResponse, 'setCode'));

        $fakeCode = Response::HTTP_OK;
        $this->failureResponse->setCode($fakeCode);
        $this->assertIsInt($this->failureResponse->getCode());
        $this->assertEquals($fakeCode, $this->failureResponse->getCode());
    }

    /**
     * @retun void
     */
    public function test_can_set_message_in_failure_response(): void
    {
        $this->assertTrue(property_exists($this->failureResponse , 'message'));
        $this->assertTrue(method_exists($this->failureResponse, 'setMessage'));
        $this->assertTrue(method_exists($this->failureResponse, 'getMessage'));

        $fakeMessage = $this->faker->text;
        $this->failureResponse->setMessage($fakeMessage);
        $this->assertIsString($this->failureResponse->getMessage());
        $this->assertEquals($fakeMessage, $this->failureResponse->getMessage());
    }

    /**
     * @retun void
     */
    public function test_can_set_error_in_failure_response(): void
    {
        $this->assertTrue(property_exists($this->failureResponse , 'error'));
        $this->assertTrue(method_exists($this->failureResponse, 'setError'));
        $this->assertTrue(method_exists($this->failureResponse, 'getError'));

        $fakeError = [
            'error' => $this->faker->sentence,
        ];

        $this->failureResponse->setError($fakeError);
        $this->assertIsArray($this->failureResponse->getError());
        $this->assertEquals($fakeError, $this->failureResponse->getError());
    }

    /**
     * @retun void
     */
    public function test_can_set_status_in_failure_response(): void
    {
        $this->assertTrue(property_exists($this->failureResponse , 'successStatus'));
        $this->assertTrue(method_exists($this->failureResponse, 'setSuccessStatus'));
        $this->assertTrue(method_exists($this->failureResponse, 'getSuccessStatus'));

        $fakeSuccessStatus = true;
        $this->failureResponse->setSuccessStatus($fakeSuccessStatus);
        $this->assertIsBool($this->failureResponse->getSuccessStatus());
        $this->assertEquals($fakeSuccessStatus, $this->failureResponse->getSuccessStatus());
    }

    /**
     * @retun void
     */
    public function test_can_render_failure_response(): void
    {
        $failureResponse = $this->failureResponse
            ->setCode(Response::HTTP_OK)
            ->setMessage($this->faker->text)
            ->setSuccessStatus(true)
            ->setError([
                'name' => $this->faker->name,
                'email' => $this->faker->email
            ])
            ->render();

        $this->assertInstanceOf(JsonResponse::class, $failureResponse);
    }
}
