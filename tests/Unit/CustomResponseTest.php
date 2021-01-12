<?php

namespace Liateam\ApiResponse\Tests\Unit;

use Liateam\ApiResponse\Tests\BaseTestCase;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Liateam\ApiResponse\Responses\CustomResponse;
use Liateam\ApiResponse\Contracts\ResponseContract;

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
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::__construct
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setCode
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setMessage
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setResponseKey
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setSuccessStatus
     *
     * @return void
     *
     * @uses   \Liateam\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\CustomResponseTest::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\CustomResponseTest::test_class_uses_hasProperty_trait
     */
    public function test_class_uses_hasProperty_trait(): void
    {
        self::assertInstanceOf(ResponseContract::class, $this->customResponse);
    }

    /**
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::setCode
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::getCode
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::__construct
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setMessage
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setResponseKey
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setSuccessStatus
     *
     * @return void
     *
     * @uses   \Liateam\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\CustomResponseTest::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\CustomResponseTest::test_can_set_code_in_custom_response
     */
    public function test_can_set_code_in_custom_response(): void
    {
        self::assertTrue(property_exists($this->customResponse, 'code'));
        self::assertTrue(method_exists($this->customResponse, 'setCode'));
        self::assertTrue(method_exists($this->customResponse, 'setCode'));

        $fakeCode = Response::HTTP_OK;
        $this->customResponse->setCode($fakeCode);
        self::assertIsInt($this->customResponse->getCode());
        self::assertEquals($fakeCode, $this->customResponse->getCode());
    }

    /**
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::setMessage
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::getMessage
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::__construct
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setCode
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setResponseKey
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setSuccessStatus
     *
     * @return void
     *
     * @uses   \Liateam\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\CustomResponseTest::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\CustomResponseTest::test_can_set_message_in_custom_response
     */
    public function test_can_set_message_in_custom_response(): void
    {
        self::assertTrue(property_exists($this->customResponse, 'message'));
        self::assertTrue(method_exists($this->customResponse, 'setMessage'));
        self::assertTrue(method_exists($this->customResponse, 'getMessage'));

        $fakeMessage = $this->faker->text;
        $this->customResponse->setMessage($fakeMessage);
        self::assertIsString($this->customResponse->getMessage());
        self::assertEquals($fakeMessage, $this->customResponse->getMessage());
    }

    /**
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::setResponseKey
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::getResponseKey
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::getResponseValue
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::getResponseValue
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::__construct
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setCode
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setMessage
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setResponseValue
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setSuccessStatus
     *
     * @return void
     *
     * @uses   \Liateam\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\CustomResponseTest::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\CustomResponseTest::test_can_set_additional_in_custom_response
     */
    public function test_can_set_additional_in_custom_response(): void
    {
        self::assertTrue(property_exists($this->customResponse, 'responseKey'));
        self::assertTrue(method_exists($this->customResponse, 'setResponseKey'));
        self::assertTrue(method_exists($this->customResponse, 'getResponseKey'));
        self::assertTrue(property_exists($this->customResponse, 'responseValue'));
        self::assertTrue(method_exists($this->customResponse, 'getResponseValue'));
        self::assertTrue(method_exists($this->customResponse, 'setResponseValue'));

        $customResponse = $this->customResponse->setResponseKey('additional');
        self::assertEquals('additional', $customResponse->getResponseKey());

        $fakeAdditional = [
            'text' => $this->faker->sentence,
        ];

        $this->customResponse->setResponseValue($fakeAdditional);
        self::assertIsArray($this->customResponse->getResponseValue());
        self::assertEquals($fakeAdditional, $this->customResponse->getResponseValue());
    }

    /**
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::setSuccessStatus
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::getSuccessStatus
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::__construct
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setCode
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setMessage
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setResponseKey
     *
     * @return void
     *
     * @uses   \Liateam\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\CustomResponseTest::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\CustomResponseTest::test_can_set_status_in_custom_response
     */
    public function test_can_set_status_in_custom_response(): void
    {
        self::assertTrue(property_exists($this->customResponse, 'successStatus'));
        self::assertTrue(method_exists($this->customResponse, 'setSuccessStatus'));
        self::assertTrue(method_exists($this->customResponse, 'getSuccessStatus'));

        $fakeSuccessStatus = true;
        $this->customResponse->setSuccessStatus($fakeSuccessStatus);
        self::assertIsBool($this->customResponse->getSuccessStatus());
        self::assertEquals($fakeSuccessStatus, $this->customResponse->getSuccessStatus());
    }


    /**
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::render
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::getCode
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::getMessage
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::getResult
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::getSuccessStatus
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::setCode
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::setMessage
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::setResult
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::setSuccessStatus
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::__construct
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::setResponseValue
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::getResponseValue
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::setResponseKey
     * @covers \Liateam\ApiResponse\Responses\CustomResponse::getResponseKey
     *
     * @return void
     *
     * @uses   \Liateam\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\CustomResponseTest::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\CustomResponseTest::test_can_render_custom_response
     */
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

        self::assertInstanceOf(JsonResponse::class, $customResponse);
    }
}
