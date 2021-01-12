<?php

namespace Liateam\ApiResponse\Tests\Unit;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Liateam\ApiResponse\Tests\BaseTestCase;
use Liateam\ApiResponse\Responses\SuccessResponse;
use Liateam\ApiResponse\Contracts\ResponseContract;

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
     * @covers \Liateam\ApiResponse\Traits\HasProperty
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::__construct
     * @return void
     * @uses   \Liateam\ApiResponse\Tests\Unit\SuccessResponseTest::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\SuccessResponseTest::test_class_uses_hasProperty_trait
     * @uses   \Liateam\ApiResponse\Tests\BaseTestCase::setUp
     */
    public function test_class_uses_hasProperty_trait(): void
    {
        self::assertInstanceOf(ResponseContract::class, $this->successResponse);
    }

    /**
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::setCode
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::getCode
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::__construct
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setMessage
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setResponseKey
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setSuccessStatus
     * @return void
     *
     * @uses   \Liateam\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\SuccessResponseTest::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\SuccessResponseTest::test_can_set_code_in_success_response
     */
    public function test_can_set_code_in_success_response(): void
    {
        self::assertTrue(method_exists($this->successResponse, 'setCode'));
        self::assertTrue(method_exists($this->successResponse, 'setCode'));

        $fakeCode = Response::HTTP_OK;
        $this->successResponse->setCode($fakeCode);
        self::assertIsInt($this->successResponse->getCode());
        self::assertEquals($fakeCode, $this->successResponse->getCode());
    }

    /**
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::setMessage
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::getMessage
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::__construct
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setCode
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setResponseKey
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setSuccessStatus
     * @return void
     *
     * @uses   \Liateam\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\SuccessResponseTest::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\SuccessResponseTest::test_can_set_message_in_success_response
     */
    public function test_can_set_message_in_success_response(): void
    {
        self::assertTrue(method_exists($this->successResponse, 'setMessage'));
        self::assertTrue(method_exists($this->successResponse, 'getMessage'));

        $fakeMessage = $this->faker->text;
        $this->successResponse->setMessage($fakeMessage);
        self::assertIsString($this->successResponse->getMessage());
        self::assertEquals($fakeMessage, $this->successResponse->getMessage());
    }

    /**
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::getResponseKey
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::getResponseKey
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::getResponseValue
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::getResponseValue
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setCode
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setMessage
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setResponseKey
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setResponseValue
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setSuccessStatus
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::__construct
     * @return void
     *
     * @uses   \Liateam\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\SuccessResponseTest::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\SuccessResponseTest::test_can_set_data_in_success_response
     */
    public function test_can_set_data_in_success_response(): void
    {
        self::assertTrue(property_exists($this->successResponse, 'responseKey'));
        self::assertTrue(method_exists($this->successResponse, 'setResponseKey'));
        self::assertTrue(method_exists($this->successResponse, 'getResponseKey'));
        self::assertTrue(property_exists($this->successResponse, 'responseValue'));
        self::assertTrue(method_exists($this->successResponse, 'getResponseValue'));
        self::assertTrue(method_exists($this->successResponse, 'setResponseValue'));

        $successResponse = $this->successResponse->setResponseKey('data');
        self::assertEquals('data', $successResponse->getResponseKey());

        $fakeData = [
            'name' => $this->faker->name,
            'email' => $this->faker->email
        ];

        $this->successResponse->setResponseValue($fakeData);
        self::assertIsArray($this->successResponse->getResponseValue());
        self::assertEquals($fakeData, $this->successResponse->getResponseValue());
    }

    /**
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::setSuccessStatus
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::getSuccessStatus
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::__construct
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setCode
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setMessage
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setResponseKey
     *
     * @return void
     *
     * @uses   \Liateam\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\SuccessResponseTest::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\SuccessResponseTest::test_can_set_status_in_success_response
     */
    public function test_can_set_status_in_success_response(): void
    {
        self::assertTrue(method_exists($this->successResponse, 'setSuccessStatus'));
        self::assertTrue(method_exists($this->successResponse, 'getSuccessStatus'));

        $fakeSuccessStatus = true;
        $this->successResponse->setSuccessStatus($fakeSuccessStatus);
        self::assertIsBool($this->successResponse->getSuccessStatus());
        self::assertEquals($fakeSuccessStatus, $this->successResponse->getSuccessStatus());
    }

    /**
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::render
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::getCode
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::getMessage
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::getResult
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::getSuccessStatus
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::setCode
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::setMessage
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::setResult
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::setSuccessStatus
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::__construct
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::setResponseValue
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::getResponseValue
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::setResponseKey
     * @covers \Liateam\ApiResponse\Responses\SuccessResponse::getResponseKey
     *
     * @return void
     * @uses   \Liateam\ApiResponse\Tests\Unit\SuccessResponseTest::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\SuccessResponseTest::test_can_render_response
     * @uses   \Liateam\ApiResponse\Tests\BaseTestCase::setUp
     */
    public function test_can_render_response(): void
    {
        $successResponse = $this->successResponse
            ->setCode(Response::HTTP_OK)
            ->setMessage($this->faker->text)
            ->setSuccessStatus(true)
            ->setResponseKey('data')
            ->setResponseValue([
                'name' => $this->faker->name,
                'email' => $this->faker->email
            ])
            ->render();

        self::assertInstanceOf(JsonResponse::class, $successResponse);
    }
}
