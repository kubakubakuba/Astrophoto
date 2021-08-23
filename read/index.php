<html>
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200;400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../favicon.png">
        <title>
            Ročníková práce
        </title>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script src="https://kit.fontawesome.com/b2f60c20a5.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.8.335/pdf.min.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body onload="loadIFR()">

        <div id="particles-js">
            
        </div>
        <div id="content">
            <div id="pdf">
            <?php
                if(!isset($_GET['json'])) {
                    echo("<center><h1>Zadejte jméno souboru!</h1></center>");
                }
                else{
                    $jsonInfo = $_GET['json'];
                    $json = file_get_contents("./json/".$jsonInfo);
                    $jsonArray = json_decode($json, true);
                    if (!file_exists("./json/".$jsonInfo) || $jsonArray["image-collection"]["hide"] != false) {
                        echo("<center><h1>Soubor " . $jsonInfo . " neexistuje!</h1></center>");
                    }
                    else{
                        echo('
                            <center>
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>');
                                        for($i = 1; $i < count($jsonArray["image-collection"]["images"]); $i++){
                                            echo('
                                                <li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'"></li>
                                            ');
                                        }
                                        echo('
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active image-div">
                                            <img class="d-block w-90 caro-image" src="'.$jsonArray["image-collection"]["images"][0]["image-file"].'" alt="Slide 1">
                                            <div class="carousel-caption d-none d-md-block" id="msg">
                                                <h5>'.$jsonArray["image-collection"]["images"][0]["image-description"].' by '.$jsonArray["image-collection"]["images"][0]["image-author"].'</h5>
                                                <p>'.$jsonArray["image-collection"]["images"][0]["image-exif"]["number-of-lights"].' light frames, each '.$jsonArray["image-collection"]["images"][0]["image-exif"]["exposition-time"].' and ISO-'.$jsonArray["image-collection"]["images"][0]["image-exif"]["iso"].'. Taken on '.$jsonArray["image-collection"]["images"][0]["image-exif"]["camera"].'.</p>
                                            </div>
                                        </div>');
                                        for($i = 1; $i < count($jsonArray["image-collection"]["images"]); $i++){
                                            echo('
                                                <div class="carousel-item image-div">
                                                    <img class="d-block w-90 caro-image" src="'.$jsonArray["image-collection"]["images"][$i]["image-file"].'" alt="Slide '.$i.'">
                                                    <div class="carousel-caption d-none d-md-block" id="msg">
                                                        <h5>'.$jsonArray["image-collection"]["images"][$i]["image-description"].' by '.$jsonArray["image-collection"]["images"][$i]["image-author"].'</h5>
                                                        <p>'.$jsonArray["image-collection"]["images"][$i]["image-exif"]["number-of-lights"].' light frames, each '.$jsonArray["image-collection"]["images"][$i]["image-exif"]["exposition-time"].' and ISO-'.$jsonArray["image-collection"]["images"][$i]["image-exif"]["iso"].'. Taken on '.$jsonArray["image-collection"]["images"][$i]["image-exif"]["camera"].'.</p>
                                                    </div>
                                                </div>
                                            ');
                                        }
                                        echo('
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </center>
                            ');

                }
            }
            ?>
            </div>
        </div>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
        <script>particlesJS.load('particles-js', 'particles.json', function(){console.log('particles.js loaded')});</script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
