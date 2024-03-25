<?php

namespace swkberlin\BST;

class FindModeInBST
{
    protected array $modes = [];

    protected int $maxFreq = 0;

    protected int $currentFreq = 0;

    protected ?int $prevVal = null;

    /**
     * @param Node $root
     * @return int[]
     */
    public function findMode(Node $root): array
    {
        if ($root->left == null && $root->right == null) {
            return [$root->val];
        }

        $this->dfs($root);

        print_r($this->modes);
        return $this->modes;
    }

    protected function dfs(?Node $node)
    {
        if ($node == null) {
            return;
        }

        $this->dfs($node->left);

        if ($this->prevVal !== null && $node->val === $this->prevVal) {
            $this->currentFreq ++;
        } else {
            $this->prevVal = $node->val;
        }

        if ($this->currentFreq > $this->maxFreq) {
            $this->maxFreq = $this->currentFreq;
            $this->modes = [$node->val];
        } elseif($this->currentFreq == $this->maxFreq) {
            $this->modes[] = $node->val;
        }

        $this->dfs($node->right);
    }
}