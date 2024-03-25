<?php

namespace Tests\HashTable;

use PHPUnit\Framework\TestCase;
use swkberlin\HashTable\CountElementsWithMaximumFrequency;

class CountElementsWithMaximumFrequencyTest extends TestCase
{

    /**
     * @dataProvider testCases
     * @test
     */
    public function itShouldReturnTotalFrequencies($nums, $exp)
    {
        $solutionClass = new CountElementsWithMaximumFrequency();

        $this->assertEquals($exp,$solutionClass->maxFrequencyElements($nums));
    }

    protected function testCases(): array
    {
        return [
            [[1,1,1,2,2,2,3], 6],
            [[1,2,3,4,5], 5],
            [[1,1,2,2,3], 4],
            [[0], 1],
        ];
    }
}