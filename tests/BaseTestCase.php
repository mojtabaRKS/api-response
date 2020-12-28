<?php

namespace Tests;

use Faker\Factory;
use PHPUnit\Framework\TestCase;

class BaseTestCase extends TestCase
{
    /**
     * @var Faker $faker
     */
    public $faker;

    public function setUp(): void
    {
        parent::setUp();
        $this->faker = Factory::create();
    }

}
