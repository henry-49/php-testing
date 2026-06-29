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
use PHPUnit\Framework\Attributes\DataProvider;

final class FunctionsTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public static function additionProvider(): array 
    {
        return [
           'Two positive integers' => [2, 3, 5],
            'Two negative integers' => [-2, -3, -5],
            'Positive and negative integer' => [3, -2, 1],
            'Adding zero to integer' => [3, 0, 3],
        ];
    }

    #[DataProvider('additionProvider')]
    public function testAddIntegers(int $a, int $b, int $expected): void 
    {
        $this->assertSame($expected, addIntegers($a, $b));
    }    

    // Test that adding two integers is commutative
    public function testAddingIsCommutative(): void 
    {
        $this->assertSame(addIntegers(3, 2), addIntegers(2, 3));
    }
}  