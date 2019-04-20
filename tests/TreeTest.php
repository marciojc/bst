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

    public function testTreeDetele(): void
    {
        $tree = new Bst\Tree();
        $tree->insert(50);
        $tree->insert(30);
        $tree->insert(20);
        $tree->insert(40);
        $tree->insert(70);
        $tree->insert(60);
        $tree->insert(80);
        $tree->delete(50);
        $this->expectOutputString('20 30 40 60 70 80');
        $tree->traverse();
    }
}
