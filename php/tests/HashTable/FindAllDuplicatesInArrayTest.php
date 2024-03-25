<?php

namespace Tests\HashTable;

use PHPUnit\Framework\TestCase;
use swkberlin\HashTable\FindAllDuplicatesInArray;

class FindAllDuplicatesInArrayTest extends TestCase
{
    /** @test  */
    public function itShouldReturnEmptyArrayWhenHasNoDuplicates()
    {
        $class = (new FindAllDuplicatesInArray());

        $this->assertEmpty($class->findDuplicates([1,2,3,4,5,6]));
    }

    /**
     * @test
     * @dataProvider testCases
     */
    public function itShouldReturnDuplicates($nums, $expected)
    {
        $class = (new FindAllDuplicatesInArray());

        $this->assertEquals(
            $result = $class->findDuplicates($nums),
            $expected,
            sprintf('failed asserting [%s] equal to [%s]', implode(',', $result), implode(',', $expected))
        );
    }

    protected static function testCases(): array
    {
        return [
            [[1,2,3,4,5,6,1], [1]],
            [[], []],
            [[1,2,3,4,5,5,1,2], [5,1,2]]
        ];
    }
}