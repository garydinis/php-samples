<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param Integer[] $inorder
     * @param Integer[] $postorder
     * @return TreeNode
     */
    function buildTree($inorder, $postorder) {
        //inorder(left root right)
        //postorder(right left root)
        $n = count($inorder);
        if ($n == 0) {
            return null;
        }
        return $this->helper(0, $n, 0, $n, $inorder, $postorder);
    }
    
    public function helper($i1, $i2, $p1, $p2, $inorder, $postorder) {
        if ($i1 >= $i2 || $p1 >= $p2) {
            return null;
        }
        $root = new TreeNode($postorder[$p2-1]);
        $it = array_search($postorder[$p2-1], $inorder);               
        $diff = $it - $i1;
        $root->left = $this->helper($i1, $i1 + $diff, $p1, $p1 + $diff, $inorder, $postorder);
        $root->right = $this->helper($i1 + $diff + 1, $i2, $p1 + $diff, $p2-1, $inorder, $postorder);
        
        return $root;
    }
}