<?php
Class TreeNode {
	Public $val = null;
	Public $left = null;
	Public $right = null;

	public function __construct($val = 0, $left = null, $right = null) {
		$this->val = $val;
		$this->left = $left;
		$this->right = $right;
	}
}

function invertTree(TreeNode $root) {
    if ($root == null) {
        return $root;
    }

    $node = new TreeNode();
    $node->left = $this->invertTree($root->left);
    $node->right = $this->invertTree($root->right);

    //swap
    $root->right = $node->left;
    $root->left = $node->right;

    return $root;
}