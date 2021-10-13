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
    function inorderTraversal($root) {
        //left root right (stack)
        
        $list = [];
        $stack = [];
        //$current_node = new TreeNode();
        while(!empty($stack) || $root != null) {
            while ($root != null) {
                $stack[] = $root;
                $root = $root->left;
            }
            $root = array_pop($stack);
            $list[] = $root->val;
            $root = $root->right;
        }
        return $list;
    }  
}