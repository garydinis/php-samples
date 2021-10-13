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
     * @return Integer[][]
     */
    function levelOrder($root) {
        //root left right
        $result = [];
        if ($root == NULL) {
            return $result;
        }
        
        $stack[] = $root;
        while(!empty($stack)) {
            $size = count($stack);
            $level = [];
            for($i=0; $i < $size; $i++) {
                $curr_node = array_shift($stack);
                $level[] = $curr_node->val;
                if($curr_node->left != NULL) {
                    $stack[] = $curr_node->left;
                }
                if ($curr_node->right != NULL) {
                    $stack[] = $curr_node->right;
                }    
            }
            $result[] = $level; 
        }
        
        return $result;
    }
}