<?php 
// composer require --dev phpunit/phpunit
// alias phpunit='vendor/bin/phpunit'
// phpunit tests/QueueTest.php --colors
// phpunit --filter testPushAddsItemToQueue

declare(strict_types=1); 


use App\Queue;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class QueueTest extends TestCase
{
    // Declare a property to hold the Queue instance
    private Queue $queue;
    
    // This method is called before each test
    protected function setUp(): void 
    {
        $this->queue = new Queue;
    }

    // Clean up after each test if necessary
    protected function tearDown(): void 
    {
        unset($this->queue);
    }
    
    public function testNewQueueIsEmpty(): void  
    {
        
        $this->assertSame(0, $this->queue->getSize());
    }
  
    public function testPushAddsItemToQueue(): void
    {
        $this->queue->push('item1');
        $this->assertSame(1, $this->queue->getSize());
    }

    #[Test]
    public function popRemovesAndReturnsLastItem(): void 
    {
        $this->queue->push('item1');
        $this->assertSame('item1', $this->queue->pop());
        $this->assertSame(0, $this->queue->getSize());
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue(): void 
    {
        $this->queue->push('item1');
        $this->queue->push('item2');

        $this->assertSame('item1', $this->queue->pop());
    }

    public function testPopThrowsExceptionWhenQueueIsEmpty(): void 
    {
        $this->expectException(\UnderflowException::class);
        $this->expectExceptionMessage('Queue is empty');
        
        // This is a test to ensure that popping from an empty queue throws an UnderflowException
        $this->queue->pop();
    }
}