# Kunin
Parser tools and library for PHP 😅😅😅

## ToDo
- [ ] Parse everything in the head (OpenGraph, Twitter & other meta-tags)
- [ ] Detect site main content

## What's with This?
Currently there is no straightforward solution to actually parse webpages ala-Facebook. Various functions and crazy libraries can be cumbersome for many. Project kunin may be unnecessary but it aims to be that one-solution for all. A library that is one call away.

## Basic Usage
Import the library
```php
    require("dist/kunin.php");
```
Create an object for each url to be processed
```php
    // Set the url
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

## Important Reminder
You really need a fast connection to immediately process all of the urls quickly. It is recommended that you use ajax to provide a seamless way to parse urls without making them wait for the whole proccess to finish. Also, use a caching mechanism to prevent excess load in your system and make the process faster. Check on the cache first, then have this as a fallback when it is not yet cached or it expired.

Sites that uses https require that your openssl extension to be turned on. You may do so by enabling it on your ```php.ini```. This is important as majority of the web is now transitioning towards https.

## Now what?
Doing this is not an easy task. One solution can be better and more efficient than others. As needed, this would be improved in the future. It may be an internal tool for now, it may at lease serve some purpose for others.

## Docs?
This project is really meant for internal projects that requires to extract details from a webpage. Documentations would be made available in the future. The source code is already filled with comments so you don't have to actually need docs. Searching through the whole source code can be a pain though.

## Wanna Help?
This is open source so you can actually help me bring this thing to life. Issues will also be addressed. Yay. But this is an internal tool. You may use this but without warranty.