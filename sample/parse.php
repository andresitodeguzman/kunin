<?php
require("kunin.php");
if(!$_REQUEST['url']){
    $rsp = array("response"=>"error");
    echo json_encode($rsp);
    $do = 0;
} else {
    $do = 1;
}
if($do == 1){
    $url = $_REQUEST['url'];
    $obj = new kunin($url);
    $title = $obj->getTitle();
    $description = $obj->value("description");
    $themeColor = $obj->value("theme-color");
    $images = $obj->getImages();
    if(!$images[0]){
        $image = "";
    } else {
        if(!$images[1]){
            $image = $images[0];
        } else {
            $image = $images[1];
        }
    }
    if(!$image){
        $imgCard = "";
    } else {
        $imgCard = "<img class='responsive-img' src='".$image."'>";
    }

    $card = "
    <style>
        .This$themeColor{
            background-color: $themeColor !important;
        }
    </style>
    <div class='card This$themeColor'>
        $imgCard
        <div class='card-content'>
            <h5>$title</h5>
            <p>$description</p>
        </div>
    </div>
    ";
    $array = array("response"=>"Ok","content"=>"$card");
    echo json_encode($array);

}
?>