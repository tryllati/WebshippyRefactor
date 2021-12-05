<?php

namespace webshippy\File;

/*Default File Class*/
class CsvFile extends File{

    protected $headers = [];
    protected $rows = [];

    protected $error = null;
    protected $error_message = '';


    function __construct($file_name){
        parent::__construct($file_name);
    }

    
    public function resetHeaders(){
        $this->headers = [];
    }
    
    public function resetRows(){
        $this->rows = [];
    }

    public function getHeaders(): array {
        return $this->headers;
    }
    
    public function getRows(): array {
        return $this->rows;
    }

    public function readAndSplitHeader(){
        $this->read();

        $this->headers = $this->rows[0];
        unset($this->rows[0]);
    }

    public function read(){
        if(!$this->fileExist()){
            $error = 1;
            $this->error_message = 'A fájl nem található';
        }

        $this->readWithStrGetCsv();
    }

    public function readWithOriginal(){
        $this->resetHeaders();
        $this->resetRows();

        if(!$this->fileExist()){
            $error = 1;
            $this->error_message = 'A fájl nem található';
        }

        $row = 1;
        if (($handle = fopen($this->getFullFileName(), 'r')) !== false) {
            while (($data = fgetcsv($handle)) !== false) {
                if ($row == 1) {
                    $this->headers = $data;
                } else {
                    $o = [];
                    for ($i = 0; $i < count($this->headers); $i++) {
                        $o[$this->headers[$i]] = $data[$i];
                    }
                    $this->rows[] = $o;
                }
                $row++;
            }
            fclose($handle);
        }
    }

    public function readWithStrGetCsv(){
        $csvFile = file($this->getFullFileName());

        foreach ($csvFile as $line) {
            $this->rows[] = str_getcsv($line);
        }
    }

    public function fileExist(): bool {
        if(file_exists($this->getFullFileName())){
            return true;
        }
        return false;
    }

    
}