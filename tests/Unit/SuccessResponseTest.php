<?php

namespace Mojtabarks\ApiResponse\Tests\Unit;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Mojtabarks\ApiResponse\Contracts\ResponseContract;
use Mojtabarks\ApiResponse\Responses\SuccessResponse;
use Mojtabarks\ApiResponse\Tests\BaseTestCase;

class SuccessResponseTest extends BaseTestCase
{
    /**
     * @var SuccessResponse
     */
    public $successResponse;

    public function setUp(): void
    {
        $this->successResponse = new SuccessResponse();
        parent::setUp();
    }

    /**
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::__construct
     *
     * @return void
     *
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\SuccessResponseTest::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\SuccessResponseTest::test_class_uses_hasProperty_trait
     * @uses   \Mojtabarks\ApiResponse\Tests\BaseTestCase::setUp
     */
    public function test_class_uses_hasProperty_trait(): void
    {
        self::assertInstanceOf(ResponseContract::class, $this->successResponse);
    }

    /**
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::setCode
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::getCode
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::__construct
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setMessage
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setResponseKey
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setSuccessStatus
     *
     * @return void
     *
     * @uses   \Mojtabarks\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\SuccessResponseTest::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\SuccessResponseTest::test_can_set_code_in_success_response
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
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::setMessage
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::getMessage
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::__construct
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setCode
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setResponseKey
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setSuccessStatus
     *
     * @return void
     *
     * @uses   \Mojtabarks\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\SuccessResponseTest::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\SuccessResponseTest::test_can_set_message_in_success_response
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
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::getResponseKey
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::getResponseKey
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::getResponseValue
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::getResponseValue
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setCode
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setMessage
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setResponseKey
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setResponseValue
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setSuccessStatus
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::__construct
     *
     * @return void
     *
     * @uses   \Mojtabarks\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\SuccessResponseTest::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\SuccessResponseTest::test_can_set_data_in_success_response
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
            'name'  => $this->faker->name,
            'email' => $this->faker->email,
        ];

        $this->successResponse->setResponseValue($fakeData);
        self::assertIsArray($this->successResponse->getResponseValue());
        self::assertEquals($fakeData, $this->successResponse->getResponseValue());
    }

    /**
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::setSuccessStatus
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::getSuccessStatus
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::__construct
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setCode
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setMessage
     * @covers \Mojtabarks\ApiResponse\Traits\HasProperty::setResponseKey
     *
     * @return void
     *
     * @uses   \Mojtabarks\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\SuccessResponseTest::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\SuccessResponseTest::test_can_set_status_in_success_response
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
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::render
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::getCode
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::getMessage
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::getResult
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::getSuccessStatus
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::setCode
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::setMessage
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::setResult
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::setSuccessStatus
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::__construct
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::setResponseValue
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::getResponseValue
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::setResponseKey
     * @covers \Mojtabarks\ApiResponse\Responses\SuccessResponse::getResponseKey
     *
     * @return void
     *
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\SuccessResponseTest::setUp
     * @uses   \Mojtabarks\ApiResponse\Tests\Unit\SuccessResponseTest::test_can_render_response
     * @uses   \Mojtabarks\ApiResponse\Tests\BaseTestCase::setUp
     */
    public function test_can_render_response(): void
    {
        $successResponse = $this->successResponse
            ->setCode(Response::HTTP_OK)
            ->setMessage($this->faker->text)
            ->setSuccessStatus(true)
            ->setResponseKey('data')
            ->setResponseValue([
                'name'  => $this->faker->name,
                'email' => $this->faker->email,
            ])
            ->render();

        self::assertInstanceOf(JsonResponse::class, $successResponse);
    }
}
