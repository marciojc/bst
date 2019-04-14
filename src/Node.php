<?php
namespace Bst;

class Node
{
    public $root;
    public $left;
    public $right;

    public function __construct($key)
    {
         $this->data = $key;
         $this->left = null;
         $this->right = null;
    }

    public function __toString() {
        return "$this->data";
    }
}
