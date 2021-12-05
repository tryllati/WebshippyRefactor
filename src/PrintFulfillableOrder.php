<?php

namespace webshippy;

class PrintFulfillableOrder {

    const PADS = 20;

    
    public function printHeaderData(Array $headers): void {
        foreach ($headers as $title) {
            echo str_pad($title, self::PADS);
        }

        $this->addEndOfLine();
        $this->printVisualLineUnderHeaderData($headers);
    }

    public function printVisualLineUnderHeaderData(Array $headers): void {
        foreach ($headers as $line) {
            echo str_repeat('=', self::PADS);
        }

        $this->addEndOfLine();
    }

    public function addEndOfLine(): void {
        print PHP_EOL;
    }
    
    function printOrders(Object $stock, Array $headers, Array $orders): void{
        foreach ($orders as $item) {
            if ($stock->{$item->getProductId()} >= $item->getQuantity()) {

                foreach ($headers as $header) {
                    if ($header == 'priority') {
                        if ($item->getPriority() == 1) {
                            $text = 'low';
                        } else {
                            if ($item->getPriority() == 2) {
                                $text = 'medium';
                            } else {
                                $text = 'high';
                            }
                        }
                        echo str_pad($text, self::PADS);
                    } else {
                        echo str_pad($item->getValueOfHeader($header), self::PADS);
                    }
                }
                $this->addEndOfLine();
            }
        }
    }

}