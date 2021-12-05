<?php 

use PHPUnit\Framework\TestCase;
use webshippy\Argument;
use webshippy\ArgumentValidation;

class ArgumentTest extends TestCase{

    public function testCreateArgumnt()
    {	

        //global $argv, $argc;

        $Argument = new Argument($argv);
        $ArgumentValidation = new ArgumentValidation($Argument);

        $this->assertFalse( $ArgumentValidation->argumentIsJson(1) );
        //$this->assertTrue( $ArgumentValidation->argumentIsJson(2) );
        
    }


}



