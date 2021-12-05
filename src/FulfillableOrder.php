<?php

namespace webshippy;

use webshippy\Ordering;

class FulfillableOrder {

    private $orders = [];

    public function addOrdering($ordering){
        if(is_object($ordering)){
            array_push($this->orders, $ordering);
        }
    }

    public function setOrders($orders){
        foreach($orders as $ordering){
            $this->addOrdering(new Ordering($ordering['product_id'], $ordering['quantity'], $ordering['priority'], $ordering['created_at']));
        }
    }

    public function settingFulFillablOrders(){
        usort($this->orders, function ($a, $b) {
            $pc = -1 * ($a->getPriority() <=> $b->getPriority());
            return $pc == 0 ? $a->getCreatedAt() <=> $b->getCreatedAt() : $pc;
        });
    }

    public function getOrders(){
        foreach($this->orders as $order){
            var_dump($order);    
        }
    }

}