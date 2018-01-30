# Kunin
Parser tools and library for PHP 😅😅😅

[![BCH compliance](https://bettercodehub.com/edge/badge/andresitodeguzman/kunin?branch=master)](https://bettercodehub.com/)
[![Build Status](https://travis-ci.org/andresitodeguzman/kunin.svg?branch=master)](https://travis-ci.org/andresitodeguzman/kunin)

## What is This?
Currently there is no straightforward solution to actually parse webpages ala-Facebook. Various functions and crazy libraries can be cumbersome for many. Project kunin may be unnecessary but it aims to be that one-solution for all. Kunin is a library that is one call away, no need to frustrate your self with setting up long functions. Write cleaner codes! Yay! 😍😍😍😚😚😚♥♥♥ 

## Basic Usage
Import the library
```php
require("dist/kunin.php");
```
Create an object for each url to be processed
```php
// Declare url
$url = "https://github.com/andresitodeguzman/kunin";
// Create an object
$obj = new kunin($url);
```
Use the library
```php
// Example function
$title = $obj->getTitle();
echo $title; //Prints the title of the page    
```

Use multiple urls
```php
// Declare all urls
$urlOne = "https://github.com/andresitodeguzman/kunin";
$urlTwo = "https://github.com/andresitodeguzman/smspy";

// Create object for each url
$objOne = new kunin($urlOne);
$objTwo = new kunin($urlTwo);

// Use them accordingly
echo "Site 1 Title: " . $objOne->getTitle(); // Prints the title for urlOne
echo "Site 2 Title: " . $objTwo->getTitle(); // Prints the title for urlTwo
```

## Important Reminder
You really need a fast connection to immediately process all of the urls quickly. It is recommended that you use ajax to provide a seamless way to parse urls without making them wait for the whole proccess to finish. Also, use a caching mechanism to prevent excess load in your system and make the process faster. Check on the cache first, then have this as a fallback when it is not yet cached or it has already expired.

Sites that uses https require that your openssl extension to be turned on. You may do so by enabling it in your ```php.ini```. This is important as majority of the web is now transitioning towards https.

## Now what?
Doing this is not an easy task. One solution can be better and more efficient than others. As needed, this would be improved in the future. It may be an internal tool for now, it may at lease serve some purpose for others. Check out https://github.com/andresitodeguzman/mahalaga.

## Docs?
This project is really meant for internal projects that requires to extract details from a webpage. Documentations would be made available in the future. The source code is already filled with comments so you don't have to actually need docs. Searching through the whole source code can be a pain though.

## Wanna Help?
This is open source so you can actually help me bring this thing to life. Issues will also be addressed. Yay. But this is an internal tool. You may use this but without warranty.
