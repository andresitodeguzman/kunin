# Kunin

## Introduction
This is a library for PHP that you can use to extract important information from a webpage.

## Initialization
```php
// Require the File
require("kunin.php");

// Create an object for one url
$url = "https://github.com/andresitodeguzman";
$obj = new kunin($url);
```

## Sample Code Usage
```php
// Require file
require("kunin.php");

// Declare URL and Create Object
$url = "https://github.com/andresitodeguzman";
$obj = new kunin($url);

// Create Preset Values in case values are empty
$title = "Unknown Title";
$description = "No description provided";

// Get Title and Check if set
$t = $obj->getTitle();
if(isset($t)){
    $title = t;
}

// Get Description and Check if set
$d = $obj->value("description");
if(isset($d)){
    $description = $d;
}

// Prepare by creating an array
$array = array(
    "title"=>"$title",
    "description"=>"$description"
);

// Encode array into json and echo
echo json_encode($array);
```

### Get the Title
```php
// getTitle()
$title = $obj->getTitle();
```
### Get a Value of a Certain Meta-Tag Property
```php
// value(String $keyword)
$value = $obj->value("description"); // Returns description of site
```

### Get Images
Returns an array of images from the site
```php
// getImages()
$images = $obj->getImages();
```

### Get Raw Meta Tags
Returns an array of meta-tags in a key-value
```php
//getTags()
$tags = $obj->getTags();
```

### Get Raw Page
Gets raw source code of a webpage.
```php
// getRawData()
$raw_data = $obj->getRawData();
```