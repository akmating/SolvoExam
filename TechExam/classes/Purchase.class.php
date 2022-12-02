<?php

class Purchase {
    private $items = array();

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    function get_items(){
        return $this->items;
    }
}
