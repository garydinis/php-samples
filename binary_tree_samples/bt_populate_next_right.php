<?php

/**
 * Definition for a Node.
 * class Node {
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->left = null;
 *         $this->right = null;
 *         $this->next = null;
 *     }
 * }
 */

class Solution {
    /**
     * @param Node $root
     * @return Node
     */
    public function connect($root) {
        if ($root == null) {
            return $root;
        }
        $leftNode = $root;
        while($leftNode->left != null) {
            $headNode = $leftNode;
            while($headNode != null) {
                $headNode->left->next = $headNode->right;
                if ($headNode->next != null) {
                    $headNode->right->next = $headNode->next->left;
                }
                $headNode = $headNode->next;
            }
            $leftNode = $leftNode->left;
        }
        return $root;
    }
}