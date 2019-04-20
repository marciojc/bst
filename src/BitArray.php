<?php
namespace Bst;

class BitArray
{
    public $data;

    public function __construct()
    {
        $this->data = array();
    }

    /**
     * Insert a new item into the BitArray
     *
     * @param int $data
     */
    public function insert($value)
    {
        $node = new Node($data);

        if (empty($this->data)) {
            $this->data[] = $value;
        } else {
            $this->insertData($node, 0);
        }

        return $this;
    }

    private function insertData($value, $i)
    {
        $n = 2 * $i;
        if (empty($this->data[$n])) {
            $this->data[$n] = $value;
        } else if ($value < $this->data[$n + 1]) {
            $this->insertData($value, $n + 1);
        } else if ($value > $this->data[$n + 2]) {
            $this->insertData($value, $n + 2);
        }
    }
}
