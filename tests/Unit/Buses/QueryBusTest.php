<?php

declare(strict_types=1);

namespace LaravelMediator\Tests\Unit\Buses;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Bus;
use LaravelMediator\Abstracts\Buses\Query;
use LaravelMediator\Buses\QueryBus;
use LaravelMediator\Tests\Unit\TestCase as AbstractTestCase;

class QueryBusTest extends AbstractTestCase
{
    public function test_dispatch_method_returns_a_collection_instance(): void
    {
        // Arrange
        $query = new class extends Query
        {
        };
        Bus::shouldReceive('dispatch')
            ->once()
            ->with($query)
            ->andReturn(new Collection());
        $queryBus = new QueryBus();
        // Act
        $actual = $queryBus->dispatch($query);
        // Assert
        $this->assertInstanceOf(Collection::class, $actual);
    }

    public function test_dispatch_method_returns_an_array(): void
    {
        // Arrange
        $query = new class extends Query
        {
        };
        Bus::shouldReceive('dispatch')
            ->once()
            ->with($query)
            ->andReturn([]);
        $queryBus = new QueryBus();
        // Act
        $actual = $queryBus->dispatch($query);
        // Assert
        $this->assertIsArray($actual);
    }

    public function test_dispatch_method_returns_false(): void
    {
        // Arrange
        $query = new class extends Query
        {
        };
        Bus::shouldReceive('dispatch')
            ->once()
            ->with($query)
            ->andReturnFalse();
        $queryBus = new QueryBus();
        // Act
        $actual = $queryBus->dispatch($query);
        // Assert
        $this->assertFalse($actual);
    }

    public function test_dispatch_method_returns_null(): void
    {
        // Arrange
        $query = new class extends Query
        {
        };
        Bus::shouldReceive('dispatch')
            ->once()
            ->with($query)
            ->andReturnNull();
        $queryBus = new QueryBus();
        // Act
        $actual = $queryBus->dispatch($query);
        // Assert
        $this->assertNull($actual);
    }

    public function test_dispatch_method_returns_true(): void
    {
        // Arrange
        $query = new class extends Query
        {
        };
        Bus::shouldReceive('dispatch')
            ->once()
            ->with($query)
            ->andReturnTrue();
        $queryBus = new QueryBus();
        // Act
        $actual = $queryBus->dispatch($query);
        // Assert
        $this->assertTrue($actual);
    }
}
