<?php 
// composer require --dev phpunit/phpunit
// alias phpunit='vendor/bin/phpunit'
// phpunit tests/PersonTest.php --colors
// phpunit tests/PersonTest.php --colors --stop-on-failure
// phpunit tests/PersonTest.php --colors --stop-on-failure --filter testGetFullName
// phpunit tests/PersonTest.php --colors --testdox
// phpunit tests/PersonTest.php  --bootstrap tests/bootstrap.php
// phpunit tests/PersonTest.php  --bootstrap vendor/autoload.php
// phpunit --dont-report-useless-tests
// phpunit --display-incomplete

declare(strict_types=1); 


use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use App\Person;

final class PersonTest extends TestCase
{
    public function testGetFullNameIsFirstNameAndLastName(): void 
    {
        $person = new Person;
        $person->setFirstName('John');
        $person->setLastName('Doe');
        $this->assertSame('John Doe', $person->getFullName());
    }

    #[Test]
    public function full_name_is_first_name_when_no_last_name(): void 
    {
        $person = new Person;
        $person->setFirstName('John');
        $this->assertSame('John', $person->getFullName());
    }

    public function testGetAgeReturnsAge(): void 
    {
        $person = new Person;
        $person->setAge(30);
        $this->assertSame(30, $person->getAge());
    }

}