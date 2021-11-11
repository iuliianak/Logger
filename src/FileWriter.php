<?php
namespace Yulia\Logger;

class FileWriter implements WriterInterface
{
    public function read($filename)
    {
       return file_get_contents($filename);
    }
    public function write($text,$filename)
    {
        file_put_contents($filename,$text);
    }
}