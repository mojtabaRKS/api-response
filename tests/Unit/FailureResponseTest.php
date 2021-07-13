<?php

namespace Mojtabarks\ApiResponse\Tests\Unit;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Mojtabarks\ApiResponse\Contracts\ResponseContract;
use Mojtabarks\ApiResponse\Responses\FailureResponse;
use Mojtabarks\ApiResponse\Tests\BaseTestCase;
use Mojtabarks\ApiResponse\Responses\FailureResponse;
use Mojtabarks\ApiResponse\Contracts\ResponseContract;

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

    public function test_class_uses_hasProperty_trait () : void
    {
        $this->assertInstanceOf(ResponseContract::class ,$this->failureResponse);
    }

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

    public function test_can_set_error_in_failure_response(): void
    {
        $this->assertTrue(property_exists($this->failureResponse , 'responseKey'));
        $this->assertTrue(method_exists($this->failureResponse, 'setResponseKey'));
        $this->assertTrue(method_exists($this->failureResponse, 'getResponseKey'));
        $this->assertTrue(property_exists($this->failureResponse , 'responseValue'));
        $this->assertTrue(method_exists($this->failureResponse , 'getResponseValue'));
        $this->assertTrue(method_exists($this->failureResponse , 'setResponseValue'));

        $failureResponse = $this->failureResponse->setResponseKey('error');
        $this->assertEquals('error' , $failureResponse->getResponseKey());

        $fakeError = [
            'error' => $this->faker->sentence,
        ];

        $this->failureResponse->setResponseValue($fakeError);
        $this->assertIsArray($this->failureResponse->getResponseValue());
        $this->assertEquals($fakeError, $this->failureResponse->getResponseValue());
    }

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

    public function test_can_render_failure_response(): void
    {
        $failureResponse = $this->failureResponse
            ->setCode(Response::HTTP_OK)
            ->setMessage($this->faker->text)
            ->setSuccessStatus(true)
            ->setResponseKey('error')
            ->setResponseValue([
                'name'  => $this->faker->name,
                'email' => $this->faker->email,
            ])
            ->render();

        $this->assertInstanceOf(JsonResponse::class, $failureResponse);
    }
}
