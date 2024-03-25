<?php

namespace Tests\BST;

use PHPUnit\Framework\TestCase;
use swkberlin\BST\FindModeInBST;
use swkberlin\BST\Node;

/**
 * https://leetcode.com/problems/find-mode-in-binary-search-tree/?envType=daily-question
 */
class FindModeInBSTTest extends TestCase
{
    /** @test  */
    public function itShouldReturnTheRootValueWhenNoChildrenForTheRoot()
    {
        $root = new Node(0);

        $result = (new FindModeInBST())->findMode($root);

        $this->assertEquals([0], $result);
    }

    /** @test  */
    public function itShouldReturnAllIsTheBSTWhenNoDuplicateNodeValues()
    {
        $leftNode = new Node(0,null,null);
        $rightNode = new Node(2,null, null);

        $result = (new FindModeInBST())->findMode(new Node(1, $leftNode, $rightNode));

        $this->assertEquals([0,1,2], $result);
    }

    /**
     * @dataProvider testCases
     * @test
     */
    public function itShouldReturnModesValueForBST($root, $expected)
    {
        $this->assertEquals(
            $expected,
            (new FindModeInBST())->findMode($root),
        );
    }

    protected function testCases(): array
    {
        $exm1 = function () {
            $node = new Node(2,null, null);
            $node = new Node(2, $node, null);
            return new Node(1,null,$node);
        };

        $exm2 = function () {
            $leftNode = new Node(10, null,null);
            $rightNode = new Node(10, null,null);
            return new Node(10, $leftNode,$rightNode);
        };

        $exm3 = function () {
            $node = new Node(2, null,null);
            $node = new Node(2, $node, null);
            return new Node(1, null, $node);
        };

        $exm4 = function () {
            $node = new Node(12,null,null);
            $node = new Node(12, $node, null);
            $node = new Node(11, null, $node);
            $root = new Node(10, null, $node);
            //add left nodes
            $node = new Node(7, null, null);
            $node = new Node(9, $node, null);
            $root->left = $node;
            return $root;
        };

        return [
            [$exm1(),[2]],
            [$exm2(),[10]],
            [$exm3(), [2]],
            [$exm4(), [12]],
        ];
    }
}