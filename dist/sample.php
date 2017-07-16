<?php
$output = "";
if(!@$_POST['url']){
} else {
    include("kunin.php");
    $url = $_POST['url'];
    $obj = new kunin($url);
    $title = $obj->getTitle();
    $description = $obj->value("description");
    $themeColor = $obj->value("theme-color");
    $image = $obj->getImages();
    $img = $image[0];
}
?>
<html>
    <head>
        <title>Lint</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="theme-color" content="seagreen">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css">
        <script
          src="https://code.jquery.com/jquery-3.2.1.min.js"
          integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
          crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
        <style>
            .title{
                padding-left:20px;
            }
            .seagreen{
                background-color:seagreen !important;
            }
        </style>
    </head>
    <body class="grey lighten-4">
        <nav class="seagreen">
            <a class="title">Lint</a>
        </nav>        
        <div class="container">
        <br>
        <div class="card hoverable">
            <div class="card-content">
                <form method="POST">
                    <input type="text" name="url" placeholder="url">
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
        <br><br>
        <?php
            if(isset($title)){
                echo "
                <style>.cardPrev{
                    background-color: $themeColor !important;
                }</style>
                <div class='card cardPrev'>
                    <div class='card-img'>
                        $img
                    </div>
                    <div class='card-content'>
                        <h5 class=''>$title</h5><br>
                        $description<br>
                    </div>
                </div>
                ";
                print_r($image);
            }
        ?>
        </div>
    </body>
</html>