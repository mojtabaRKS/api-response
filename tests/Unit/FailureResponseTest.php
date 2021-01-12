<?php

namespace Liateam\ApiResponse\Tests\Unit;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Liateam\ApiResponse\Tests\BaseTestCase;
use Liateam\ApiResponse\Traits\HasProperty;
use Liateam\ApiResponse\Responses\FailureResponse;
use Liateam\ApiResponse\Contracts\ResponseContract;

class FailureResponseTest extends BaseTestCase
{
    /**
     * @var FailureResponse
     */
    public $failureResponse;

    public function setUp(): void
    {
        $this->failureResponse = new FailureResponse();
        parent::setUp();
    }

    /**
     * @covers \Liateam\ApiResponse\Traits\HasProperty
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::__construct
     * @return void
     *
     * @uses   \Liateam\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\FailureResponseTest::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\FailureResponseTest::test_class_uses_hasProperty_trait
     */
    public function test_class_uses_hasProperty_trait(): void
    {
        self::assertInstanceOf(ResponseContract::class, $this->failureResponse);
    }

    /**
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::setCode
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::getCode
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::__construct
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setMessage
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setResponseKey
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setSuccessStatus
     *
     * @return void
     *
     * @uses   \Liateam\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\FailureResponseTest::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\FailureResponseTest::test_can_set_code_in_failure_response
     */
    public function test_can_set_code_in_failure_response(): void
    {
        self::assertTrue(property_exists($this->failureResponse, 'code'));
        self::assertTrue(method_exists($this->failureResponse, 'setCode'));
        self::assertTrue(method_exists($this->failureResponse, 'setCode'));

        $fakeCode = Response::HTTP_OK;
        $this->failureResponse->setCode($fakeCode);
        self::assertIsInt($this->failureResponse->getCode());
        self::assertEquals($fakeCode, $this->failureResponse->getCode());
    }

    /**
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::setMessage
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::getMessage
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::__construct
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setCode
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setResponseKey
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setSuccessStatus
     *
     * @return void
     *
     * @uses   \Liateam\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\FailureResponseTest::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\FailureResponseTest::test_can_set_message_in_failure_response
     */
    public function test_can_set_message_in_failure_response(): void
    {
        self::assertTrue(property_exists($this->failureResponse, 'message'));
        self::assertTrue(method_exists($this->failureResponse, 'setMessage'));
        self::assertTrue(method_exists($this->failureResponse, 'getMessage'));

        $fakeMessage = $this->faker->text;
        $this->failureResponse->setMessage($fakeMessage);
        self::assertIsString($this->failureResponse->getMessage());
        self::assertEquals($fakeMessage, $this->failureResponse->getMessage());
    }

    /**
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::setResponseKey
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::getResponseKey
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::setResponseValue
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::getResponseValue
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::__construct
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setCode
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setMessage
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setSuccessStatus
     *
     * @return void
     *
     * @uses   \Liateam\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\FailureResponseTest::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\FailureResponseTest::test_can_set_error_in_failure_response
     */
    public function test_can_set_error_in_failure_response(): void
    {
        self::assertTrue(property_exists($this->failureResponse, 'responseKey'));
        self::assertTrue(method_exists($this->failureResponse, 'setResponseKey'));
        self::assertTrue(method_exists($this->failureResponse, 'getResponseKey'));
        self::assertTrue(property_exists($this->failureResponse, 'responseValue'));
        self::assertTrue(method_exists($this->failureResponse, 'getResponseValue'));
        self::assertTrue(method_exists($this->failureResponse, 'setResponseValue'));

        $failureResponse = $this->failureResponse->setResponseKey('error');
        self::assertEquals('error', $failureResponse->getResponseKey());


        $fakeError = [
            'error' => $this->faker->sentence,
        ];

        $this->failureResponse->setResponseValue($fakeError);
        self::assertIsArray($this->failureResponse->getResponseValue());
        self::assertEquals($fakeError, $this->failureResponse->getResponseValue());
    }

    /**
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::setSuccessStatus
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::getSuccessStatus
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::__construct
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setCode
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setMessage
     * @covers \Liateam\ApiResponse\Traits\HasProperty::setResponseKey
     *
     * @return void
     *
     * @uses   \Liateam\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\FailureResponseTest::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\FailureResponseTest::test_can_set_status_in_failure_response
     */
    public function test_can_set_status_in_failure_response(): void
    {
        self::assertTrue(property_exists($this->failureResponse, 'successStatus'));
        self::assertTrue(method_exists($this->failureResponse, 'setSuccessStatus'));
        self::assertTrue(method_exists($this->failureResponse, 'getSuccessStatus'));

        $fakeSuccessStatus = true;
        $this->failureResponse->setSuccessStatus($fakeSuccessStatus);
        self::assertIsBool($this->failureResponse->getSuccessStatus());
        self::assertEquals($fakeSuccessStatus, $this->failureResponse->getSuccessStatus());
    }

    /**
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::render
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::getCode
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::getMessage
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::getResult
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::getSuccessStatus
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::setCode
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::setMessage
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::setResult
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::setSuccessStatus
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::__construct
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::setResponseValue
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::getResponseValue
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::setResponseKey
     * @covers \Liateam\ApiResponse\Responses\FailureResponse::getResponseKey
     *
     * @return void
     *
     * @uses   \Liateam\ApiResponse\Tests\BaseTestCase::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\FailureResponseTest::setUp
     * @uses   \Liateam\ApiResponse\Tests\Unit\FailureResponseTest::test_can_render_failure_response
     */
    public function test_can_render_failure_response(): void
    {
        $failureResponse = $this->failureResponse
            ->setCode(Response::HTTP_OK)
            ->setMessage($this->faker->text)
            ->setSuccessStatus(true)
            ->setResponseKey('error')
            ->setResponseValue([
                'name' => $this->faker->name,
                'email' => $this->faker->email
            ])
            ->render();

        self::assertInstanceOf(JsonResponse::class, $failureResponse);
    }
}
