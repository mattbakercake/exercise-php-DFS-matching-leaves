<?php

/**
 * Definition for a binary tree node.
 */
  class TreeNode {
      public $val = null;
      public $left = null;
      public $right = null;
      function __construct($val = 0, $left = null, $right = null) {
          $this->val = $val;
          $this->left = $left;
          $this->right = $right;
      }
  }
 
/**
 * Solution
 */
class RecursiveSolution {

    public $root1Leaves=[];
    public $root2Leaves=[];

    /**
     * returns boolean describing whether leaves of binary tree match
     * @param TreeNode $root1
     * @param TreeNode $root2
     * @return Boolean
     */
    public function matchingLeaves($root1, $root2) {
        $this->depthTraverseNodes($root1,'root1Leaves');
        $this->depthTraverseNodes($root2,'root2Leaves');

        return $this->root1Leaves === $this->root2Leaves;
    }

    /**
     * recursive function walks through binary tree nodes and
     * stores the leaf value if end of the branch
     */
    public function depthTraverseNodes(TreeNode $node, string $var) {

        if ($node->left instanceof TreeNode && !is_null($node->left->val)) {
            $this->depthTraverseNodes($node->left, $var);
        }

        if ($node->right instanceof TreeNode && !is_null($node->right->val)) {
            $this->depthTraverseNodes($node->right, $var);
        }

        if (is_null($node->left) && is_null($node->right)) {
            array_push($this->$var,$node->val);
        }

    }
    
}