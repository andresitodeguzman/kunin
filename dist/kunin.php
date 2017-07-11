<?php
/*
Kunin
Parser tools and library for php
*/

class kunin {

    private $url;
    private $raw_site_data;
    public $site_title;
    public $site_description;

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
        if(!@$this->raw_site_data)  echo "Error getting url data";
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


}

$a = new kunin("http://andresitodeguzman.com");
$b = $a->geturl();
echo($b);

?>