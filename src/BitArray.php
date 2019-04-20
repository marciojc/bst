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
        if (empty($this->data)) {
            $this->data[] = $value;
        } else {
            $this->insertData($value, 0);
        }

        return $this;
    }

    private function insertData($value, $i)
    {
        if (empty($this->data[$i])) {
            $this->data[$i] = $value;
        } else if ($value < $this->data[$i]) {
            $this->insertData($value, 2 * $i + 1);
        } else if ($value > $this->data[$i]) {
            $this->insertData($value, 2 * $i + 2);
        }
    }
}
