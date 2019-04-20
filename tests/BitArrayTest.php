<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class BitArrayTest extends TestCase
{
    public function testBitArrayEmpty(): void
    {
        $tree = new Bst\BitArray();
        $this->assertEmpty($tree->data);
    }
}
