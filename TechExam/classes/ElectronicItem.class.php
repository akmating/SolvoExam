<?php

class ElectronicItem {
    public $price;
    public $type;
    public $totalPrice;
    public $extras = array();

    public function __construct( string $type, float $price=0, $extras = [])
    {

        if($this->maxExtras($type, $extras)){
            echo "Invalid Extras Count<br />";
            return;
        }
        
        $extrasPrice =  $this->getExtrasTotalPrice($extras);

        $this->price = $price;
        $this->totalPrice = $price + $extrasPrice;
        $this->type = $type;
        $this->extras = $extras;
    }

    function maxExtras($type, $extras){
        $limit = extras_limit($type);

        if($limit === 'infinite'){
            return false;
        }
        return count($extras) > $limit;
    }

    function getExtrasTotalPrice($extras){
        $sum = 0;
        foreach($extras as $extra){
            $sum = $sum + $extra->price;
        }
  
        return $sum;
    }
}