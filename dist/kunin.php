<?php
/*
Kunin
Parser tools and library for php

@Author: Andresito M. de Guzman
@License: MIT
@Copyright: 2017. Andresito de Guzman
@Repository: https://github.com/andresitodeguzman/kunin
*/

class kunin{

    private $url;
    public $site;
    public $site_title;
    public $site_meta_tags;

    /* 
    Constructor
    Initially set class
    @param: String $url - URL to be parsed
    @return: Void
    */
    function __construct($url){
        // Handles Parameter
        $this->url = $url;
        // Checks if Url is empty
        if(!$this->url) echo "Empty Url";
        // Creates DomDocument Object
        $this->site = new DomDocument('1.0', 'UTF-8');
        // Silence too much errors
        libxml_use_internal_errors(true);
        // Try Loading Site
        try {            
            $this->site->loadHTMLFile($this->url);            
        } catch(Exception $e){
            echo 'Caught Exception: '.$e->getMessage().'\n';
        }
        $this->extractMetaTags();
    }

    /*
    extractMetaTags
    extract and prepares Meta Tags for later use
    @params: none
    @return: Void
    */
    private function extractMetaTags(){
        $this->site_meta_tags = array();
        foreach($this->site->getElementsByTagName("meta") as $meta_tag){
            $name = $meta_tag->getAttribute('name');
            $content = $meta_tag->getAttribute('content');
            if(!@$meta_tag->getAttribute('property')){
                $property = '';
            } else {
                $property = $meta_tag->getAttribute('property');
            }
            $array = array("name"=>$name, "property"=>$property, "content"=>$content);
            array_push($this->site_meta_tags, $array);
        }
    }

    /*
    getTitle
    Returns the title detected (Dynamic Title will not be parsed)
    @param: none
    @return: String
    */
    public function getTitle(){
        // Get Titles
        $nodes = $this->site->getElementsByTagName("title");
        // Get Value of First Appeared Title
        $this->site_title = $nodes->item(0)->nodeValue;
        // Return Title
        return $this->site_title;
    }

    /*
    getLinks
    Return Links and their texts
    @param: none
    @return: Array(Array(String url, String text))
    */
    public function getLinks(){
        // Creates empty array
        $links = array();
        // Extracts urls
        foreach($this->site->getElementsByTagName('a') as $link){
            $links[] = array(
                "url" => $link->getAttribute('href'),
                "text" => $link->nodeValue
                );
        }
        // Return links
        return $links;
    }

    /*
    getImages
    Returns an array of parsed Image Urls
    @param: none
    @return: Array
    */
    public function getImages(){
        // Creates empty array
        $images = array();
        foreach($this->site->getElementsByTagName('img') as $image){
            // Pushes Image into array
            array_push($images, $image->getAttribute('src'));
        }
        // Returns Images Array
        return $images;
    }

    /*
    value
    Returns value of a meta tag
    @param: String $key - name of meta tag
    @return: String
    */
    public function value($key){
        // Checks if empty parameter
        if(!$key) return '';
        foreach($this->site_meta_tags as $meta_tag){
            // Check if key matches tag
            if($meta_tag['name']===$key){
                return $meta_tag['content'];
            }
            // Check if key matches property
            if($meta_tag['property']===$key){
                return $meta_tag['content'];
            }
        }
    }

    /*
    paragraphs
    Returns Paragraph
    @param: none
    @return Array
    */
    public function paragraphs(){
        // Create empty array
        $paragraphs = array();
        foreach($this->site->getElementsByTagName('p') as $paragraph){
            // Pushes Paragraph to Array
            array_push($paragraphs, $paragraph->nodeValue);
        }
        // Returns Array
        return $paragraphs;
    }

    /*
    OpenGraph
    Easily Access Basic OpenGraph Tags 
    @param: none
    @return: Array
    */
    public function openGraph(){
        // Create Empty Array
        $array = array();
        // Define All OpenGraph Tags
        $og_tags = array(
        'title','type','image','url','audio','description', 'determiner',
        'locale','locale_alternative','site_name','video','image:url',
        'image:secure_url','image:type','image:width','image:height',
        'video:secure_url','video:type','video:width','video:height',
        'audio:secure_url','audio:type');
        // Pushes opengraph tags to array
        foreach($og_tags as $tag){
            $array[$tag] = $this->value("og:".$tag);
        }
        // Return Array
        return $array;
    }

    /*
    twitter
    Easily extract Twitter meta tags (Updated July 2017)
    @param: none
    @return: Array
    */
    public function twitter(){
        // Create empty array
        $array = array();
        // Define Twitter Tags
        $twitter_tags = array('card','site','site:id','creator','creator:id',
        'description','title','image','image:alt','player','player:width',
        'player:height','player:stream','app:name:iphone','app:id:iphone',
        'app:url:iphone','app:name:ipad','app:id:ipad','app:url:ipad',
        'app:name:googleplay','app:id:googleplay','app:url:googleplay');
        // Pushes tags into array
        foreach($twitter_tags as $tag){
            $array[$tag] = $this->value("twitter:".$tag);
        }
        // Returns Array
        return $array;
    }

}
?>