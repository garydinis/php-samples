<?php

/**
 *  inorder LEFT ROOT RIGHT
 *  time: O(n)
 *  
 *  if node.right exists
 *      go down the right
 *      check if left exists
 *          go all the way down left until null
 * 
 *  going up
 *      go to parent
 *      checking side
 *      return parent if side is left
 *      go up again if side is right
 */ 

class BinarySearchTree {

    public function findInorderSuccessor( $node ) {
        if ($node->right != null) {
            return getMostLeft($node->right);
        }
    }

    public function getMostLeft ($node) {
        if ($node.left == null) {
            return $node;
        } else {
            $this->getMostLeft($node.left);
        }
    }

    //if given root and p
    //O(n) time
    //O(1) space
    public function inorderSuccessor($root, $p) {
        if ($root == null) {
            return null;
        }
        $node = $root;
        $pre = null;
        while ($node != null) {
            if ($node->val > $p->val) {
                $pre = $node;
                $node = $node->left;
            } else {
                $node = $node->right;
            }
        }
        return $pre;
    }
}