<?php

namespace Liateam\ApiResponse\Tests\Unit;

use Liateam\ApiResponse\Tests\BaseTestCase;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Liateam\ApiResponse\Traits\HasProperty;
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
     * @covers HasProperty
     * @covers CustomResponse::__construct
     * @return void
     */
    public function test_class_uses_hasProperty_trait () : void
    {
        $this->AssertTrue(in_array(HasProperty::class , class_uses($this->customResponse)));
    }

    /**
     * @covers CustomResponse::setCode
     * @covers CustomResponse::getCode
     * @covers CustomResponse::__construct
     * @return void
     */
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

    /**
     * @covers CustomResponse::setMessage
     * @covers CustomResponse::getMessage
     * @covers CustomResponse::__construct
     * @return void
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
     * @covers CustomResponse::setAdditional
     * @covers CustomResponse::getAdditional
     * @covers CustomResponse::__construct
     * @return void
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
     * @covers CustomResponse::setSuccessStatus
     * @covers CustomResponse::getSuccessStatus
     * @covers CustomResponse::__construct
     * @return void
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
     * @covers CustomResponse::render
     * @covers CustomResponse::getCode
     * @covers CustomResponse::getMessage
     * @covers CustomResponse::getResult
     * @covers CustomResponse::getSuccessStatus
     * @covers CustomResponse::setCode
     * @covers CustomResponse::setMessage
     * @covers CustomResponse::setResult
     * @covers CustomResponse::setSuccessStatus
     * @covers CustomResponse::__construct
     * @covers CustomResponse::getAdditional
     * @covers CustomResponse::setAdditional
     * @return void
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
