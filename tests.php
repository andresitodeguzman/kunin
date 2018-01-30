<?php
/*
Tests
Ensures that everything works
*/

require_once __DIR__."/dist/kunin.php";

if (!class_exists('\PHPUnit\Framework\TestCase') &&
    class_exists('\PHPUnit_Framework_TestCase')) {
    class_alias('\PHPUnit_Framework_TestCase', '\PHPUnit\Framework\TestCase');
}

use PHPUnit\Framework\TestCase;

class test extends TestCase{

    public function testEquality(){
        $checkText = "Holy Child Montessori";
        $url = "https://hcmontessori.000webhostapp.com";
        $obj = new kunin($url);
        $result = $obj->getTitle();
        $this->assertEquals($checkText, $result);
    }

}

?>
