<?php
include("kunin.php");
// Declare all urls
$urlOne = "https://github.com/andresitodeguzman/kunin";
$urlTwo = "https://github.com/andresitodeguzman/smspy";

// Create object for each url
$objOne = new kunin($urlOne);
$objTwo = new kunin($urlTwo);

// Use them accordingly
echo "Site 1 Title: " . $objOne->getTitle(); // Prints the title for urlOne
echo "Site 2 Title: " . $objTwo->getTitle(); // Prints the title for urlTwo
?>