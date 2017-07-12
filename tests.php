<?php
/*
Tests
Ensures that everything works
*/

require_once __DIR__."\dist\kunin.php";

use PHPUnit\Framework\TestCase;

class test extends TestCase{

    public function testEquality(){
        $checkText = "Andresito de Guzman";
        $url = "http://andresitodeguzman.com";
        $obj = new kunin($url);
        $result = $obj->getTitle();
        $this->assertEquals($checkText, $result);
    }

}

?>