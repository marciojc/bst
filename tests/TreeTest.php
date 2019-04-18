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

    public function testTreeInorderTraverse(): void
    {
        $tree = new Bst\Tree();
        $tree->insert(5);
        $tree->insert(3);
        $tree->insert(7);
        $this->expectOutputString('3 5 7');
        $tree->traverse();
    }

    public function testTreePreorderTraverse(): void
    {
        $tree = new Bst\Tree();
        $tree->insert(5);
        $tree->insert(3);
        $tree->insert(7);
        $this->expectOutputString('5 3 7');
        $tree->traverse('preorder');
    }

    public function testTreePostorderTraverse(): void
    {
        $tree = new Bst\Tree();
        $tree->insert(5);
        $tree->insert(3);
        $tree->insert(7);
        $this->expectOutputString('3 7 5');
        $tree->traverse('postorder');
    }

    public function testTreeSearch(): void
    {
        $tree = new Bst\Tree();
        $tree->insert(5);
        $tree->insert(3);
        $tree->insert(7);
        $this->assertEquals($tree->search(5)->data, 5);
    }

    public function testTreeSearchFalse(): void
    {
        $tree = new Bst\Tree();
        $tree->insert(5);
        $tree->insert(3);
        $tree->insert(7);
        $this->assertEquals($tree->search(9), false);
    }

}

