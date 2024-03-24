<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use swkberlin\MergeStringsAlternately;

class MergeStringsAlternatelyTest extends TestCase
{
    /**
     * @test
     * @dataProvider testCases
     */
    public function itShouldMergeTwoStrings($str1, $str2, $expected)
    {
        $mergerClass = (new MergeStringsAlternately());

        $this->assertEquals($expected, $mergerClass->mergeAlternately($str1,$str2));
    }

    protected function testCases(): array
    {
        // $str1, $str2, $expected
        return [
            'itShouldMergeTwoStringsWithSameLen' => ['abc', 'pqr', 'apbqcr'],
            'itShouldMergeStringsAndAppendStr2AdditionalToTheEnd' => ['abc', 'pqrfg', 'apbqcrfg'], //append additional strings of $str2
            'itShouldMergeStringsAndAppendStr1AdditionalToTheEnd' => ['abcdef', 'pqr', 'apbqcrdef'], //append additional strings of $str1
        ];
    }
}