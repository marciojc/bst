<?php
namespace Bst;

class Tree
{
    public $root;

    public function __construct()
    {
        $this->root = null;
    }

    public function insert($data)
    {
        $node = new Node($data);

        if ($this->root === null) {
            $this->root = $node;
        } else {
            $this->insertNode($this->root, $node);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->root->__toString();
    }

    private function insertNode(&$root, $node)
    {
        if ($root === null) {
            $root = $node;
        } else {
            if ($node->data > $root->data) {
                $this->insertNode($root->right, $node);
            } else if ($node->data < $root->data) {
                $this->insertNode($root->left, $node);
            }
        }
    }

    public function traverse() : void {
        $this->inorder($this->root);
    }

    private function inorder($node) : void {
        if($node->left) {
            $this->inorder($node->left);
            echo " ";
        }

        echo $node;

        if($node->right) {
            echo " ";
            $this->inorder($node->right);
        }
    }

    private function preorder($node) : void {
        echo $node;

        if($node->left) {
            $this->inorder($node->left);
            echo " ";
        }

        if($node->right) {
            echo " ";
            $this->inorder($node->right);
        }
    }

    private function postorder($node) : void {
        if($node->left) {
            $this->inorder($node->left);
            echo " ";
        }

        if($node->right) {
            echo " ";
            $this->inorder($node->right);
        }

        echo $node;
    }
}
