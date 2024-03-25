<?php

namespace Tests\Graph;

use PHPUnit\Framework\TestCase;
use swkberlin\Graph\KeysAndRooms;

class KeysAndRoomsTest extends TestCase
{
    protected KeysAndRooms $solutionClass;
    protected function setUp(): void
    {
        parent::setUp();

        $this->solutionClass = new KeysAndRooms();
    }

    /**
     * @dataProvider pathGraph
     * @test
     */
    public function itShouldReturnTrueWhenCanVisitAllRooms(...$rooms)
    {
        $this->assertTrue($this->solutionClass->canVisitAllRooms($rooms));
    }

    /**
     * @dataProvider hamiltonianPathCases
     * @test
     */
    public function itShouldReturnFalseWhenCantVisitAllRooms(...$rooms)
    {
        $this->assertFalse($this->solutionClass->canVisitAllRooms($rooms));
    }

    public static function pathGraph(): array
    {
        return [
            [[1],[2],[3],[4],[]],
            [[1],[0,1,2], [0,1,2,3],[0,1]]
        ];
    }

    public static function hamiltonianPathCases(): array
    {
        return [
            [[1],[2],[0,1],3,[1,2]],
            [[1,3],[3,0,1],[2],[0]]
        ];
    }
}