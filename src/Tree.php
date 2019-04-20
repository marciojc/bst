<?php
namespace Bst;

class Tree
{
    public $root;

    public function __construct()
    {
        $this->root = null;
    }

    /**
     * Insert a new item into the tree
     *
     * @param int $data
     */
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

    public function traverse($method = 'inorder') : void
    {
        $node = $this->root;

        if ($node === null) {
            return;
        }

        switch ($method) {
            case 'inorder':
                $this->inorder($node);
                break;

            case 'postorder':
                $this->postorder($node);
                break;

            case 'preorder':
                $this->preorder($node);
                break;

            default:
                break;
        }
    }

    /**
     * Search by item data
     *
     * @param int $data
     * @return Node or FALSE
     */
    public function search($data)
    {
        return $this->searchByKey($data, $this->root);
    }

    /**
     * Delete a new item from the tree
     *
     * @param int $data
     */
    public function delete($data)
    {
        $node = $this->root;

        if ($node !== null) {
            $this->deleteNode($node, $data);
        }

        return $this;
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

    private function inorder($node) : void
    {
        if ($node->left) {
            $this->inorder($node->left);
            echo " ";
        }

        echo $node;

        if ($node->right) {
            echo " ";
            $this->inorder($node->right);
        }
    }

    private function preorder($node) : void
    {
        echo $node;

        if ($node->left) {
            echo " ";
            $this->preorder($node->left);
        }

        if ($node->right) {
            echo " ";
            $this->preorder($node->right);
        }
    }

    private function postorder($node) : void
    {
        if ($node->left) {
            $this->postorder($node->left);
            echo " ";
        }

        if ($node->right) {
            $this->postorder($node->right);
            echo " ";
        }

        echo $node;
    }

    /**
     *
     * @param int $data
     * @param Node $node
     * @return FALSE or Node
     */
    private function searchByKey($data, &$node)
    {
        if ($node == null) {
            return false;
        }

        if ($node->data === $data) {
            return $node;
        } else if ($node->data > $data) {
            return $this->searchByKey($data, $node->left);
        } else {
            return $this->searchByKey($data, $node->right);
        }
    }

    private function deleteNode(&$node, $data)
    {
        if ($data < $node->data) {
            $node->left = $this->deleteNode($node->left, $data);
        } else if ($data > $node->data) {
            $node->right = $this->deleteNode($node->right, $data);
        } else {
            if ($node->left === null) {
                return $node->right;
            } else if ($node->right === null) {
                return $node->left;
            }

            $temp = $this->minValueNode($node->right);
            $node->data = $temp->data;
            $node->right = $this->deleteNode($node->right, $temp->data);
        }

        return $node;
    }

    private function minValueNode($node) : Node
    {
        $current = $node;

        while ($current->left !== null) {
            $current = $current->left;
        }

        return $current;
    }
}
