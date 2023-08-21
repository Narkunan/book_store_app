<?php

namespace App\Model\authordash;

require_once "../../../vendor/autoload.php";

use App\Model\Connection;

abstract class authordashAbstract
{
    use Connection;
    public \PDO $connection;
    public String $authorname;
    public int $authorid;
    
    public function __construct()
    {
        $this->connection=$this->getConnection();
    }

    public function getAuthorName():string
    {
        return $this->authorname;
    }

    public function setAuthorName($authorname):void
    {
       $this->authorname=$authorname;
    }

    public function getAuthorId():string
    {
        return $this->authorid;
    }

    public function setAuthorId($authorid):void
    {
       $this->authorid=$authorid;
    }

}