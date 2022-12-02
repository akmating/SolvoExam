
<?php

class ElectronicItems {
    private $items = array();

    function add_items(ElectronicItem $electronicItem){
        array_push($this->items , $electronicItem);
    }

    function print_items(){
        $sum = 0;
        foreach($this->items as $index=>$item) {
            if($item->type){
                $sum = $sum + $item->totalPrice;
                echo "Type: ".$item->type." Price: $".$item->price." Extras Total Price: $".($item->totalPrice - $item->price)." Total Price: $".$item->totalPrice."<br />";
            }
        }

        echo "<br>TOTAL PRICE: $".$sum."<br />";
    }

    function sort_items(){
      usort($this->items, fn($a, $b) => $a->totalPrice - $b->totalPrice);
    }

    function process_items(){
        $this->sort_items();
        $this->print_items();
    }

    public function get_item_price($type){
        foreach($this->items as $item) {
            if($type === $item->type){

                echo "<br>The price of ".$type." is $".$item->totalPrice;
                return;
            }
        }
    }
}