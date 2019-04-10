<?php

class Node {
    public $root;
    public $left;
    public $right;

    public function __construct($key) {
         $this->root = $key;
         $this->left = NULL;
         $this->right = NULL;
    }

    public function __toString() {
        echo sprintf ("%s</br>", $this->root);
        if ($this->left && $this->right) {
            echo "/\\</br>";
            echo $this->left->__toString();
            echo $this->right->__toString();
        }
        return;
    }
}

class BST {
    public $root;

    public function  __construct() {
        $this->root = NULL;
    }

    public function insert($key) {
        if ($this->root === NULL) {
            $this->root = new Node($key);

            return $this;
        }

        $current = $this->root;

        if ($key < $current->root) {
            $current->left = new Node($key);
        } else {
            $current->right = new Node($key);
        }

        return $this;
    }

    public function __toString() {
        return $this->root->__toString();
    }
}
