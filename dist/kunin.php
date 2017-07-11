<?php
/*
Kunin
Parser tools and library for php

@Author: Andresito M. de Guzman
@License: MIT
@Copyright: 2017. Andresito de Guzman
*/

class kunin {

    private $url;
    private $raw_site_data;
    public $title;
    public $description;

    /* 
    Constructor
    Initially set class
    param: String $url - URL to be parsed
    return: Void
    */
    function __construct($url){
        // Handles Parameter
        $this->url = $url;
        // Checks for empty url
        if(!@$this->url) echo "Empty url";
        // Gets the contents in url
        $this->raw_site_data = file_get_contents($this->url);
        // Checks for empty data
        if(!@$this->raw_site_data) echo "Error getting url data";
    }

    /*
    getRawData
    Returns the raw data that was retreived from the url
    param: none
    return: String
    */
    public function getRawData(){
        // Returns Raw Data
        return $this->raw_site_data;
    }

    /*
    getTitle
    Returns the title detected (Dynamic Title will not be parsed)
    param: none
    return: String
    */
    public function getTitle(){
        // Checks if $raw_site_data is contains data
        if(isset($this->raw_site_data)){
            // Searches for site title using regular expression
            preg_match("/<title>(.*)<\/title>/i", $this->raw_site_data, $matches);
            // Handles Title
            $this->title= $matches[1];
            // Returns Title
            return $this->title;
        }
    }

}

$a = new kunin("https://github.com/andresitodeguzman");
$b = $a->getTitle();
echo($b);
?>