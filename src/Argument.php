<?php

namespace webshippy;

class Argument{

    private Array $argument;
    private $argument_count;

    
    function __construct(Array $argv){
        $this->argument = $argv;
        $this->setArgumentCount();
    }

    public function getArgument($number){
        if( $this->issetArgumentNumber($number) ){
            return $this->argument[$number];
        }

        return false;
    }

    public function getJsonDecodedArgument($number): object{
        return json_decode($this->argument[$number]);
    }

    public function setArgument($argument): void {
        $this->argument = $argument;
        $this->setArgumentCount();
    }

    private function setArgumentCount(): void{
        $this->argument_count = count($this->argument);
    }

    public function issetArgumentNumber($number): bool{
        if($number >= 0 && ($number < $this->argument_count && $this->argument_count > 0) ){
            return true;
        }

        return false;
    }

}