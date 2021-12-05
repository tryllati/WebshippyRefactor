<?php 

namespace webshippy;

class ArgumentValidation{

    private Argument $Argument;

    private $error = false;

    private $error_message = '';


    function __construct(Argument $Argument){
        $this->Argument = $Argument;
    }


    public function isArgument($required_argument_number = 0): bool {
        $isset_argument = $this->Argument->getArgument($required_argument_number);

        if(!$isset_argument)
        {
            $this->error = true;
            $this->error_message = 'Ambiguous number of parameters!';

            return false;
        }

        return true;
    }
    
    public function argumentIsJson($required_argument_number = 0): bool {
        if(!$this->isArgument($required_argument_number)){
            return false;
        }

        json_decode($this->Argument->getArgument($required_argument_number));

        if(json_last_error() !== JSON_ERROR_NONE){
            $this->error_message = 'Invalid json!';
            return false;
        }

        return true;
    }

    public function printErrorMessage(): string {
        return print $this->error_message;
    }


}