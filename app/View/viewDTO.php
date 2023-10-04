<?php
namespace App\View;
class ViewDTO
{
    public string $directory;
    public string $filename;
    public array $data;
    public function __construct(string $directory,string $filename ,array $data)
    {
         $this->directory = $directory;
         $this->filename = $filename;
         $this->data = $data;
    }
}