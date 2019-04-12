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
}
