<?php

namespace Liateam\ApiResponse\Tests;

use Faker\Factory;
use PHPUnit\Framework\TestCase;

class BaseTestCase extends TestCase
{
    /**
     * @var Factory $faker
     */
    public $faker;

    public function setUp(): void
    {
        parent::setUp();
        $this->faker = Factory::create();
    }

}
