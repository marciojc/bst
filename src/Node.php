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

    public function __toString()
    {
        echo sprintf("%s</br>", $this->data);
        if ($this->left && $this->right) {
            echo "/\\</br>";
            echo $this->left->__toString();
            echo $this->right->__toString();
        }
        return;
    }
}
