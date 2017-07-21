<?php
class kunin{

    private $url;
    public $site;
    public $site_title;
    public $site_meta_tags;

    /* 
    Constructor
    Initially set class
    param: String $url - URL to be parsed
    return: Void
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
    extract Meta Tags
    */
    function extractMetaTags(){
        $this->site_meta_tags = array();
        foreach($this->site->getElementsByTagName("meta") as $meta_tag){
            $name = $meta_tag->getAttribute('name');
            $content = $meta_tag->getAttribute('content');
            $array = array("name"=>$name, "content"=>$content);
            array_push($this->site_meta_tags, $array);
        }
    }

    /*
    getTitle
    Returns the title detected (Dynamic Title will not be parsed)
    param: none
    return: String
    */
    public function getTitle(){
        $nodes = $this->site->getElementsByTagName("title");
        $this->site_title = $nodes->item(0)->nodeValue;
        return $this->site_title;
    }

    /*
    getLinks
    Return Links and their texts
    param: none
    return: Array(Array(String url, String text))
    */
    public function getLinks(){
        // Creates empty array
        $links = array();
        // Extracts urls
        foreach($this->site->getElementsByTagName('a') as $link){
            $links[] = array("url"=>$link->getAttribute('href'),"text"=>$link->nodeValue);
        }
        // Return links
        return $links;
    }

    /*
    getImages
    Returns an array of parsed Image Urls
    param: none
    return: Array
    */
    public function getImages(){
        // Creates empty array
        $images = array();
        foreach($this->site->getElementsByTagName('img') as $image){
            array_push($images, $image->getAttribute('src'));
        }
        return $images;
    }

    /*
    value
    Returns value of a meta tag
    param: String $key - name of meta tag
    return: String
    */
    public function value($key){
        if(!$key) return '';
        foreach($this->site_meta_tags as $meta_tag){
            if($meta_tag['name']==$key){
                return $meta_tag['content'];
            }
        }
    }


}
?>