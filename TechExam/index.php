<?php

include 'includes/autoloader.inc.php';

 const ELECTRONIC_ITEM_CONSOLE = 'console';
 const ELECTRONIC_ITEM_MICROWAVE = 'microwave';
 const ELECTRONIC_ITEM_TELEVISION = 'television';
 const ELECTRONIC_ITEM_CONTROLLER = 'controller';


$purchase = new Purchase([
    new ElectronicItem(ELECTRONIC_ITEM_TELEVISION,9.46 ,[new ElectronicItem(ELECTRONIC_ITEM_CONTROLLER,3.46),new ElectronicItem(ELECTRONIC_ITEM_CONTROLLER,3.46),new ElectronicItem(ELECTRONIC_ITEM_CONTROLLER,3.46),new ElectronicItem(ELECTRONIC_ITEM_CONTROLLER,3.46)]),
    new ElectronicItem(ELECTRONIC_ITEM_CONSOLE,15.46,[new ElectronicItem(ELECTRONIC_ITEM_CONTROLLER,3.46)],new ElectronicItem(ELECTRONIC_ITEM_CONTROLLER,3.46)),
    new ElectronicItem(ELECTRONIC_ITEM_MICROWAVE,5.46,[]),
    new ElectronicItem(ELECTRONIC_ITEM_TELEVISION,10.46,[new ElectronicItem(ELECTRONIC_ITEM_CONTROLLER,3.46)]),
]);


$electronicItems = new ElectronicItems;

foreach ( $purchase->get_items() as $item) {
    $electronicItems->add_items($item);
  }

$electronicItems->process_items();
$electronicItems->get_item_price(ELECTRONIC_ITEM_CONSOLE);

function extras_limit($type){
    $limits = array(ELECTRONIC_ITEM_TELEVISION => 'infinite',ELECTRONIC_ITEM_MICROWAVE => 0,ELECTRONIC_ITEM_CONSOLE => 4, ELECTRONIC_ITEM_CONTROLLER => 0);

    return $limits[$type];
}
?>


