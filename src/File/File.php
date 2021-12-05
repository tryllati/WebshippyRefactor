<?php

namespace webshippy\File;

/*Default File Class*/
class File implements iFile{
    
    protected $file_name;
    
    protected $file_path;
    
    protected $file_content;
    
    //.. extension, size..

    function __construct(string $file_name = ''){
        $this->file_name = $file_name;
        $this->file_path = '.';
    }
    
    public final function setFileName(string $file_name): void
    {
        $this->file_name = $file_name;
    }
    
    public final function getFileName(): string
    {
        return $this->file_name;
    }
    
    public final function setFilePath(string $path): void
    {
        $this->file_path = $this->replaceSlash($path);
    }
    
    public final function getFilePath(): string
    {
        return $this->file_path;
    }
    
    public final function getFullFileName(): string
    {
        return "$this->file_path/$this->file_name";
    }
    
    public function setFileContent($data): void 
    {
        $this->file_content = $data;
    }
    
    public final function getFileContent(): string
    {
        return $this->file_content;
    }
    
    public final function replaceSlash($path): string
    {
        return str_replace('\\', '/', $path);
    }
    
    //..
}