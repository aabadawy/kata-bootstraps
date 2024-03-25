<?php

namespace swkberlin\BST;

class Node
{
    public function __construct(
        public mixed $val = 0,
        public ?self $left = null,
        public ?self $right = null
    )
    {

    }
}