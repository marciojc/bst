<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class TreeTest extends TestCase
{
    public function testTreeEmpty(): void
    {
        $tree = new Bst\Tree();
        $this->assertNull($tree->root);
    }

    public function testTreeRoot(): void
    {
        $tree = new Bst\Tree();
        $tree->insert(5);
        $this->assertEquals($tree->root->data, 5);
    }

    public function testHasLeftNode(): void
    {
        $tree = new Bst\Tree();
        $tree->insert(5);
        $tree->insert(3);
        $this->assertEquals(get_class($tree->root->left), 'Bst\Node');
    }

    public function testTreeLeftNode(): void
    {
        $tree = new Bst\Tree();
        $tree->insert(5);
        $tree->insert(3);
        $this->assertEquals($tree->root->left->data, 3);
    }

    public function testHasRightNode(): void
    {
        $tree = new Bst\Tree();
        $tree->insert(5);
        $tree->insert(7);
        $this->assertEquals(get_class($tree->root->right), 'Bst\Node');
    }

    public function testTreeRightNode(): void
    {
        $tree = new Bst\Tree();
        $tree->insert(5);
        $tree->insert(7);
        $this->assertEquals($tree->root->right->data, 7);
    }
}

