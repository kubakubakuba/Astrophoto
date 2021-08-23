<html>
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="icon" href="./favicon.png">
        <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200;400&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/b2f60c20a5.js" crossorigin="anonymous"></script>
        <title>
            Astrophoto
        </title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <div id="particles-js"></div>
        <div id="content">
        <center><h1>Publikované astrofotografie</h1></center>
            <div class="grid-container">
            <?php
            $dir = "./read/json/";
            $files = scandir($dir);
            for($i = 2; $i < count($files); $i++){
                $json = file_get_contents("./read/json/".$files[$i]);
                $jsonArray = json_decode($json, true);
                if($jsonArray["image-collection"]["hide"] === false){
                    echo('
                    <div class="col-'.($i-1).' item sub-grid card">
                        <a href="https://astrophoto.swpelc.eu/read?json='.$files[$i].'" class="image sub-item-1 card"><img src="'.$jsonArray["image-collection"]["cover-image"].'" alt="'.$jsonArray["image-collection"]["cover-description"].'">   
                            <p class="sub-item-2">'.$jsonArray["image-collection"]["collection-author"].'</p>
                            <!--<div class="icon-grid">
                                <i class="fas fa-book-open fa-lg"></i>
                                <i class="fas fa-bookmark fa-lg"></i>
                                <i class="fas fa-info-circle fa-lg" onclick="getInfo("'.$json.'")"></i>
                            </div>-->
                        </a>
                    </div>
                    ');
                }
            }
            ?>
            <script>
                function getInfo(json){
                    let obj = JSON.parse(json);
                    window.alert(obj.name);
                }
            </script>
            </div>
            <div class="footer">
                    <p>Další informace zde: <a href="./info" class="link">https://astrophoto.swpelc.eu/info</a></p>
            </div>
        </div>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
        <script>particlesJS.load('particles-js', './particles.json', function(){console.log('particles.js loaded')});</script>
    </body>
</html>
