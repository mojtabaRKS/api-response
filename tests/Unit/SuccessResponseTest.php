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
        $this->successResponse = $successResponse
    }

    /**
     * @retun void
     */
    public function test_can_set_code_in_response()
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
    public function test_can_set_message_in_response()
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
    public function test_can_set_data_in_response()
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
    public function test_can_set_status_in_response()
    {
        $this->assertTrue(method_exists($this->successResponse, 'setStatus'));
        $this->assertTrue(method_exists($this->successResponse, 'getStatus'));

        $fakeStatus = true;
        $this->successResponse->setStatus($fakeStatus);
        $this->assertIsBool($this->successResponse->getStatus());
        $this->assertEquals($fakeStatus, $this->successResponse->getStatus());
    }

    /**
     * @retun void
     */
    public function test_can_render_response()
    {
        $successResponse = $this->successResponse
            ->setCode(Response::HTTP_OK)
            ->setMessage($this->faker->text)
            ->setStatus(true)
            ->setData([
                'name' => $this->faker->name,
                'email' => $this->faker->email
            ])
            ->render();

        $this->assertInstanceOf(Response::class, $successResponse);
    }
}
