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
    function postorderTraversal($root) {
        //left right root
        return $this->dfs($root, []);
    }
    
    function dfs($root, $list) {
        if ($root == NULL) {
            return $list;
        }
        $list = $this->dfs($root->left, $list);
        $list = $this->dfs($root->right, $list);
        $list[] = $root->val;
        return $list;
    }
}