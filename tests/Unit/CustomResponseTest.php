<?php

namespace Tests\Unit;

use Tests\BaseTestCase;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Liateam\ApiResponse\Responses\CustomResponse;

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

    /**
     * @retun void
     */
    public function test_can_set_code_in_custom_response(): void
    {
        $this->assertTrue(property_exists($this->customResponse , 'code'));
        $this->assertTrue(method_exists($this->customResponse, 'setCode'));
        $this->assertTrue(method_exists($this->customResponse, 'setCode'));

        $fakeCode = Response::HTTP_OK;
        $this->customResponse->setCode($fakeCode);
        $this->assertIsInt($this->customResponse->getCode());
        $this->assertEquals($fakeCode, $this->customResponse->getCode());
    }

    /**
     * @retun void
     */
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

    /**
     * @retun void
     */
    public function test_can_set_additional_in_custom_response(): void
    {
        $this->assertTrue(property_exists($this->customResponse , 'additional'));
        $this->assertTrue(method_exists($this->customResponse, 'setAdditional'));
        $this->assertTrue(method_exists($this->customResponse, 'getAdditional'));

        $fakeAdditional = [
            'text' => $this->faker->sentence,
        ];

        $this->customResponse->setAdditional($fakeAdditional);
        $this->assertIsArray($this->customResponse->getAdditional());
        $this->assertEquals($fakeAdditional, $this->customResponse->getAdditional());
    }

    /**
     * @retun void
     */
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

    /**
     * @retun void
     */
    public function test_can_render_custom_response(): void
    {
        $customResponse = $this->customResponse
            ->setCode(Response::HTTP_OK)
            ->setMessage($this->faker->text)
            ->setSuccessStatus(true)
            ->setAdditional([
                'text' => $this->faker->text,
            ])
            ->render();

        $this->assertInstanceOf(JsonResponse::class, $customResponse);
    }
}
