<?php

use PHPUnit\Framework\TestCase;
use webshippy\File\File;

class FileTest extends TestCase
{
    
    public function testGetAndSetTheFileName()
    {	
        $file = new File('language.php');
        
        $this->assertEquals($file->getFileName(), 'language.php');
        
        $file->setFileName('default.php');
        
        $this->assertEquals($file->getFileName(), 'default.php');
    }
    
    public function testGetAndSetFilePath()
    {	
        $file = new File();
        
        $file->setFilePath('/var/www/html/projects/homework');
        
        $this->assertEquals($file->getFilePath(), '/var/www/html/projects/homework');
    }

    public function testFileNameWithPath()
    {	
        $file = new File('language.php');
        
        $file->setFilePath('/var/www/html/projects/homework');
        
        $this->assertEquals($file->getFullFileName(), $file->getFilePath().'/'.$file->getFileName());
    }

}