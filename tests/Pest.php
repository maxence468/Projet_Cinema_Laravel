<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit
| test case class. By default, that class is "PHPUnit\Framework\TestCase".
| Of course, you may use your own helper classes here.
|
*/

uses(TestCase::class)
    ->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions.
| The "expect()" function gives you access to a set of "expectations" methods.
|
*/

// (You can leave this empty for now)

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code that you
| want to share between your test files. You can define those helper functions here.
|
*/
