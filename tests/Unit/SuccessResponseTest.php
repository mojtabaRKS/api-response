<?php

namespace Liateam\ApiResponse\Tests\Unit;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Liateam\ApiResponse\Tests\BaseTestCase;
use Liateam\ApiResponse\Traits\HasProperty;
use Liateam\ApiResponse\Responses\SuccessResponse;

class SuccessResponseTest extends BaseTestCase
{
    /**
     * @var SuccessResponse
     */
    public $successResponse;

    public function setUp(): void
    {
        $this->successResponse = new SuccessResponse;
        parent::setUp();
    }

    /**
     * @covers Liateam\ApiResponse\Traits\HasProperty
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::__construct
     * @return void
     */
    public function test_class_uses_hasProperty_trait () : void
    {
        $this->AssertTrue(in_array(HasProperty::class, class_uses($this->successResponse)));
    }

    /**
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::setCode
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::getCode
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::__construct
     * @return void
     */
    public function test_can_set_code_in_success_response() : void
    {
        $this->assertTrue(method_exists($this->successResponse, 'setCode'));
        $this->assertTrue(method_exists($this->successResponse, 'setCode'));

        $fakeCode = Response::HTTP_OK;
        $this->successResponse->setCode($fakeCode);
        $this->assertIsInt($this->successResponse->getCode());
        $this->assertEquals($fakeCode, $this->successResponse->getCode());
    }

    /**
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::setMessage
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::getMessage
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::__construct
     * @return void
     */
    public function test_can_set_message_in_success_response() : void
    {
        $this->assertTrue(method_exists($this->successResponse, 'setMessage'));
        $this->assertTrue(method_exists($this->successResponse, 'getMessage'));

        $fakeMessage = $this->faker->text;
        $this->successResponse->setMessage($fakeMessage);
        $this->assertIsString($this->successResponse->getMessage());
        $this->assertEquals($fakeMessage, $this->successResponse->getMessage());
    }

    /**
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::setData
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::getData
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::__construct
     * @return void
     */
    public function test_can_set_data_in_success_response() : void
    {
        $this->assertTrue(method_exists($this->successResponse, 'setData'));
        $this->assertTrue(method_exists($this->successResponse, 'getData'));

        $fakeData = [
            'name' => $this->faker->name,
            'email' => $this->faker->email
        ];

        $this->successResponse->setData($fakeData);
        $this->assertIsArray($this->successResponse->getData());
        $this->assertEquals($fakeData, $this->successResponse->getData());
    }

    /**
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::setSuccessStatus
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::getSuccessStatus
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::__construct
     * @return void
     */
    public function test_can_set_status_in_success_response(): void
    {
        $this->assertTrue(method_exists($this->successResponse, 'setSuccessStatus'));
        $this->assertTrue(method_exists($this->successResponse, 'getSuccessStatus'));

        $fakeSuccessStatus = true;
        $this->successResponse->setSuccessStatus($fakeSuccessStatus);
        $this->assertIsBool($this->successResponse->getSuccessStatus());
        $this->assertEquals($fakeSuccessStatus, $this->successResponse->getSuccessStatus());
    }

    /**
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::render
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::getCode
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::getMessage
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::getResult
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::getSuccessStatus
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::setCode
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::setMessage
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::setResult
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::setSuccessStatus
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::__construct
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::getData
     * @covers Liateam\ApiResponse\Responses\SuccessResponse::setData
     * @return void
     */
    public function test_can_render_response() : void
    {
        $successResponse = $this->successResponse
            ->setCode(Response::HTTP_OK)
            ->setMessage($this->faker->text)
            ->setSuccessStatus(true)
            ->setData([
                'name' => $this->faker->name,
                'email' => $this->faker->email
            ])
            ->render();

        $this->assertInstanceOf(JsonResponse::class, $successResponse);
    }
}
