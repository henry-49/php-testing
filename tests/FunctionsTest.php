<?php 
// phpunit --help
// composer require --dev phpunit/phpunit
// alias phpunit='vendor/bin/phpunit'
// phpunit tests/FunctionsTest.php --colors
// phpunit tests/FunctionsTest.php --colors --testdox
// phpunit tests/FunctionsTest.php  --bootstrap tests/bootstrap.php
// phpunit --generate-configuration 


declare(strict_types=1); 

namespace Tests;

use PHPUnit\Framework\TestCase;

final class FunctionsTest extends TestCase
{

    public function testAddTwoPositiveIntegers(): void 
    {
        $this->assertSame(5, addIntegers(2, 3));
    }

    public function testAddTwoNegativeIntegers(): void 
    {
        $this->assertSame(-5, addIntegers(-3, -2));
    }
    
    public function testAddPositiveAndNegativeInteger(): void 
    {
        $this->assertSame(1, addIntegers(3, -2));
    }

    public function testAddZeroToInteger(): void 
    {
        $this->assertSame(3, addIntegers(3, 0));
    }

    public function testAddingIsCommutative(): void 
    {
        $this->assertSame(addIntegers(3, 2), addIntegers(3, 2));
    }
}  