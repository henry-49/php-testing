<?php 
// composer require --dev phpunit/phpunit

declare(strict_types=1); 
namespace Tests;

use PHPUnit\Framework\TestCase;

final class ExampleTest extends TestCase
{
    public function testTwoValuesAreTheSame(): void 
    {
        $this->assertSame(1, 2);
    }
}  