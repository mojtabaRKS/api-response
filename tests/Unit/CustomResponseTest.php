<?php

namespace Mojtabarks\ApiResponse\Tests\Unit;

use Mojtabarks\ApiResponse\Tests\BaseTestCase;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Mojtabarks\ApiResponse\Responses\CustomResponse;
use Mojtabarks\ApiResponse\Contracts\ResponseContract;

class CustomResponseTest extends BaseTestCase
{
    /**
     * @var CustomResponse
     */
    public $customResponse;

    public function setUp(): void
    {
        $this->customResponse = new CustomResponse();
        parent::setUp();
    }


    public function test_class_uses_hasProperty_trait () : void
    {
        $this->assertInstanceOf(ResponseContract::class ,$this->customResponse);
    }

    public function test_can_set_code_in_custom_response(): void
    {
        $this->assertTrue(property_exists($this->customResponse, 'code'));
        $this->assertTrue(method_exists($this->customResponse, 'setCode'));
        $this->assertTrue(method_exists($this->customResponse, 'setCode'));

        $fakeCode = Response::HTTP_OK;
        $this->customResponse->setCode($fakeCode);
        $this->assertIsInt($this->customResponse->getCode());
        $this->assertEquals($fakeCode, $this->customResponse->getCode());
    }


    public function test_can_set_message_in_custom_response(): void
    {
        $this->assertTrue(property_exists($this->customResponse , 'message'));
        $this->assertTrue(method_exists($this->customResponse, 'setMessage'));
        $this->assertTrue(method_exists($this->customResponse, 'getMessage'));

        $fakeMessage = $this->faker->text;
        $this->customResponse->setMessage($fakeMessage);
        $this->assertIsString($this->customResponse->getMessage());
        $this->assertEquals($fakeMessage, $this->customResponse->getMessage());
    }

    public function test_can_set_additional_in_custom_response(): void
    {
        $this->assertTrue(property_exists($this->customResponse , 'responseKey'));
        $this->assertTrue(method_exists($this->customResponse, 'setResponseKey'));
        $this->assertTrue(method_exists($this->customResponse, 'getResponseKey'));
        $this->assertTrue(property_exists($this->customResponse , 'responseValue'));
        $this->assertTrue(method_exists($this->customResponse , 'getResponseValue'));
        $this->assertTrue(method_exists($this->customResponse , 'setResponseValue'));

        $customResponse = $this->customResponse->setResponseKey('additional');
        $this->assertEquals('additional' , $customResponse->getResponseKey());

        $fakeAdditional = [
            'text' => $this->faker->sentence,
        ];

        $this->customResponse->setResponseValue($fakeAdditional);
        $this->assertIsArray($this->customResponse->getResponseValue());
        $this->assertEquals($fakeAdditional, $this->customResponse->getResponseValue());
    }

    public function test_can_set_status_in_custom_response(): void
    {
        $this->assertTrue(property_exists($this->customResponse , 'successStatus'));
        $this->assertTrue(method_exists($this->customResponse, 'setSuccessStatus'));
        $this->assertTrue(method_exists($this->customResponse, 'getSuccessStatus'));

        $fakeSuccessStatus = true;
        $this->customResponse->setSuccessStatus($fakeSuccessStatus);
        $this->assertIsBool($this->customResponse->getSuccessStatus());
        $this->assertEquals($fakeSuccessStatus, $this->customResponse->getSuccessStatus());
    }

    public function test_can_render_custom_response(): void
    {
        $customResponse = $this->customResponse
            ->setCode(Response::HTTP_OK)
            ->setMessage($this->faker->text)
            ->setSuccessStatus(true)
            ->setResponseKey('additional')
            ->setResponseValue([
                'text' => $this->faker->text,
            ])
            ->render();

        $this->assertInstanceOf(JsonResponse::class, $customResponse);
    }
}
