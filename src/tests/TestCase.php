<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Указывает, следует ли запускать наполнитель по умолчанию перед каждым тестом.
     *
     * @var bool
     */
    protected $seed = true;
}