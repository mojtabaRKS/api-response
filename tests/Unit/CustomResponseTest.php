<?php

namespace Mojtabarks\ApiResponse\Tests\Unit;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Mojtabarks\ApiResponse\Contracts\ResponseContract;
use Mojtabarks\ApiResponse\Responses\CustomResponse;
use Mojtabarks\ApiResponse\Tests\BaseTestCase;
use Mojtabarks\ApiResponse\Traits\HasProperty;

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
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::__construct
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setCode
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setMessage
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setResponseKey
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setSuccessStatus
     *
     * @return void
     *
     * @uses   \Mojtabarks\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\CustomResponseTest::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\CustomResponseTest::test_class_uses_hasProperty_trait
     */
    public function test_class_uses_hasProperty_trait(): void
    {
        self::assertInstanceOf(ResponseContract::class, $this->customResponse);
    }

    /**
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::setCode
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::getCode
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::__construct
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setMessage
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setResponseKey
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setSuccessStatus
     *
     * @return void
     *
     * @uses   \Mojtabarks\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\CustomResponseTest::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\CustomResponseTest::test_can_set_code_in_custom_response
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
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::setMessage
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::getMessage
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::__construct
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setCode
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setResponseKey
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setSuccessStatus
     *
     * @return void
     *
     * @uses   \Mojtabarks\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\CustomResponseTest::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\CustomResponseTest::test_can_set_message_in_custom_response
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
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::setResponseKey
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::getResponseKey
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::getResponseValue
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::getResponseValue
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::__construct
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setCode
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setMessage
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setResponseValue
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setSuccessStatus
     *
     * @return void
     *
     * @uses   \Mojtabarks\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\CustomResponseTest::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\CustomResponseTest::test_can_set_additional_in_custom_response
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
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::setSuccessStatus
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::getSuccessStatus
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::__construct
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setCode
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setMessage
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setResponseKey
     *
     * @return void
     *
     * @uses   \Mojtabarks\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\CustomResponseTest::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\CustomResponseTest::test_can_set_status_in_custom_response
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
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::render
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::getCode
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::getMessage
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::getResult
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::getSuccessStatus
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::setCode
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::setMessage
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::setResult
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::setSuccessStatus
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::__construct
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::setResponseValue
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::getResponseValue
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::setResponseKey
     * @covers \Mojtabarks\ApiResponse\Responses\CustomResponse::getResponseKey
     *
     * @return void
     *
     * @uses   \Mojtabarks\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\CustomResponseTest::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\CustomResponseTest::test_can_render_custom_response
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
