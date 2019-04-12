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
}

