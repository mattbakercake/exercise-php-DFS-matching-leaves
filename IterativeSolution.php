<?php

/**
 * Definition for a binary tree node.
 */
class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

/**
 * Solution
 */
class IterativeSolution
{
    public $root1Leaves = [];
    public $root2Leaves = [];

    /**
     * returns boolean describing whether leaves of binary tree match
     * @param TreeNode $root1
     * @param TreeNode $root2
     * @return Boolean
     */
    function matchingLeaves($root1, $root2)
    {
        $this->depthTraverseNodes($root1, 'root1Leaves');
        $this->depthTraverseNodes($root2, 'root2Leaves');

        return $this->root1Leaves === $this->root2Leaves;
    }

    /**
     * iterative depth first search (DFS) walks through binary tree branches and
     * stores the leaf value if end of the branch
     */
    function depthTraverseNodes(TreeNode $tnode, string $var)
    {
        $stack = [$tnode];
        $leaves = [];
        //loop while there are items in stack
        while (!empty($stack)) {
            $node = end($stack); //oldest item in stack
            array_pop($stack); //processing: remove from stack

            if ($node) {
                if (is_null($node->right) && is_null($node->left))
                {
                    array_push($leaves,$node->val); //store leaf if end of branch
                }
                //work left to right through branches - add to stack
                array_push($stack, $node->right);
                array_push($stack, $node->left);
            }
        }

        $this->$var = $leaves;
    }

}
