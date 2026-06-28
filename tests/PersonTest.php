<?php 
// composer require --dev phpunit/phpunit
// alias phpunit='vendor/bin/phpunit'

declare(strict_types=1); 

use PHPUnit\Framework\TestCase;

require  dirname(__DIR__ ). '/src/Person.php';


final class PersonTest extends TestCase
{
    public function testGetFullNameIsFirstNameAndLastName(): void 
    {
        $person = new Person;
        $person->setFirstName('John');
        $person->setLastName('Doe');
        $this->assertSame('John Doe', $person->getFullName());
    }

    public function testGetAgeReturnsAge(): void 
    {
        $person = new Person;
        $person->setAge(30);
        $this->assertSame(30, $person->getAge());
    }

}