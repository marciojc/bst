<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class BitArrayTest extends TestCase
{
    public function testBitArrayEmpty(): void
    {
        $ba = new Bst\BitArray();
        $this->assertEmpty($ba->data);
    }

    public function testBitArrayRoot(): void
    {
        $ba = new Bst\BitArray();
        $ba->insert(5);
        $this->assertEquals($ba->data, array(5));
    }

    public function testBitArrayRootLeft(): void
    {
        $ba = new Bst\BitArray();
        $ba->insert(5);
        $ba->insert(3);
        $this->assertEquals($ba->data, array(5, 3));
    }

    public function testBitArrayRootRight(): void
    {
        $ba = new Bst\BitArray();
        $ba->insert(5);
        $ba->insert(7);
        $this->assertEquals($ba->data, array( 0 => 5, 2 => 7));
    }

    public function testBitArray(): void
    {
        $ba = new Bst\BitArray();
        $ba->insert(5);
        $ba->insert(3);
        $ba->insert(7);
        $this->assertEquals($ba->data, array(5, 3, 7));
    }
}
