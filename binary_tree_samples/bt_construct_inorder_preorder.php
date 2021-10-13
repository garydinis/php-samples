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
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    private $hashMap = [];
    function buildTree($preorder, $inorder) {
        //inorder LEFT ROOT RIGHT
        //preorder ROOT LEFT RIGHT
        $n = count($inorder);
        if ($n == 0) {
            return null;
        }
        for ($i = 0; $i < $n; $i++) {
            $this->hashMap[$inorder[$i]] = $i;    
        }
        return $this->helper(0, $n - 1, 0, $n - 1, $preorder, $inorder);
    }
    
    function helper($inorderLeft, $inorderRight, $preorderLeft, $preorderRight, $preorder, $inorder) {
        if ($inorderLeft > $inorderRight || $preorderLeft > $preorderRight) {
            return null;
        }
        
        $rootVal = $preorder[$preorderLeft];
        $index = $this->hashMap[$rootVal];
        $root = new TreeNode($rootVal);
               
        $root->left = $this->helper(
            $inorderLeft, 
            $index - 1, 
            $preorderLeft + 1, 
            $preorderLeft + $index - $inorderLeft, 
            $preorder, 
            $inorder);
        $root->right = $this->helper(
            $index + 1,
            $inorderRight,
            $preorderLeft + $index - $inorderLeft + 1,
            $preorderRight,
            $preorder,
            $inorder);
        
        return $root;
    }
}