<?php

namespace Liateam\ApiResponse\Tests\Unit;

use Faker\Generator as Faker;
use Illuminate\Http\Response;
use PHPUnit\Framework\TestCase;
use Liateam\ApiResponse\SuccessResponse;

class SuccessResponseTest extends TestCase
{
    /**
     * @var SuccessResponse
     */
    public $successResponse;

    /**
     * @var Faker $faker
     */
    public $faker;

    /**
     * @param SuccessResponse $successResponse
     * @param Faker $faker
     */
    public function setUp(SuccessResponse $successResponse, Faker $faker): void
    {
        $this->successResponse = $successResponse;
        $this->faker = $faker;
    }

    /**
     * @retun void
     */
    public function test_can_set_code_in_response() : void
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
    public function test_can_set_message_in_response() : void
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
    public function test_can_set_data_in_response() : void
    {
        $this->assertTrue(method_exists($this->successResponse, 'setData'));
        $this->assertTrue(method_exists($this->successResponse, 'getData'));

        $fakeData = [
            'name' => $this->faker->name,
            'email' => $this->faker->email
        ];

        $this->successResponse->setData($fakeData);
        $this->assertIsArray($this->successResponse->getMessage());
        $this->assertEquals($fakeData, $this->successResponse->getMessage());
    }

    /**
     * @retun void
     */
    public function test_can_set_status_in_response(): void
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

        $this->assertInstanceOf(Response::class, $successResponse);
    }
}
