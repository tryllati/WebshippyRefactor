<?php

namespace webshippy;

class Ordering{

    private $product_id;
    private $quantity;
    private $priority;
    private $created_at;

    function __construct($product_id, $quantity, $priority, $created_at){
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->priority = $priority;
        $this->created_at = $created_at;
    }


    public function getProductId(): string {
        return $this->product_id;
    }

    public function setProductId($product_id){
        $this->product_id = $product_id;
    }

    public function getQuantity(): string {
        return $this->quantity;
    }

    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }

    public function getPriority(): string {
        return $this->priority;
    }

    public function setPriority($priority){
        $this->priority = $priority;
    }

    public function getCreatedAt(): string {
        return $this->created_at;
    }

    public function setCreatedAt($created_at){
        $this->created_at = $created_at;
    }



}