<?php 
// composer require --dev phpunit/phpunit
// alias phpunit='vendor/bin/phpunit'

declare(strict_types=1); 


use App\Queue;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\Depends;
use PHPUnit\Framework\TestCase;

final class QueueTest extends TestCase
{
    
    public function testNewQueueIsEmpty(): Queue 
    {
        $queue = new Queue;
        $this->assertSame(0, $queue->getSize());
        return $queue;
    }
  
    #[Depends('testNewQueueIsEmpty')]
    public function testPushAddsItemToQueue(Queue $queue): Queue 
    {
        $queue->push('item1');
        $this->assertSame(1, $queue->getSize());
        return $queue;
    }

    #[Test]
    #[Depends('testPushAddsItemToQueue')]
    public function popRemovesAndReturnsLastItem(Queue $queue): void 
    {
        $this->assertSame('item1', $queue->pop());
        $this->assertSame(0, $queue->getSize());
    }

    public function testPopThrowsExceptionWhenQueueIsEmpty(): void 
    {
        $this->expectException(\UnderflowException::class);
        $queue = new Queue;
        $queue->pop();
    }
}