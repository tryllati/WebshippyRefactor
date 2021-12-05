<?php

use PHPUnit\Framework\TestCase;
use webshippy\File\CsvFile;

class CsvFileTest extends TestCase
{
    
    public function testGetAndSetTheFileName()
    {	
        $CsvFile = new CsvFile('language.php');
        
        $this->assertEquals($CsvFile->getFileName(), 'language.php');
        
        $CsvFile->setFileName('default.php');
        
        $this->assertEquals($CsvFile->getFileName(), 'default.php');
    }

    public function testGetAndSetFilePath()
    {	
        $CsvFile = new CsvFile();
        
        $CsvFile->setFilePath('/var/www/html/projects/homework');
        
        $this->assertEquals($CsvFile->getFilePath(), '/var/www/html/projects/homework');
    }

    public function testFileNameWithPath()
    {	
        $file = new File('language.php');
        
        $file->setFilePath('/var/www/html/projects/homework');
        
        $this->assertEquals($file->getFullFileName(), $file->getFilePath().DIRECTORY_SEPARATOR.$file->getFileName());
    }

}