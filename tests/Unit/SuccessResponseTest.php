<?php

namespace Tests\Unit;

use Tests\BaseTestCase;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
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
     * @retun void
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
     * @retun void
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
     * @retun void
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
     * @retun void
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
     * @retun void
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
