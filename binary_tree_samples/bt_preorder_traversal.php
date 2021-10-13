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
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversal($root) {
        return $this->dfs($root, []);
    }
    
    function dfs ($root, $output) {
        if ($root == NULL) {
            return $output;
        }
        
        $output[] = $root->val;
        $output = $this->dfs($root->left, $output);
        $output = $this->dfs($root->right, $output);
        return $output;
    }
}