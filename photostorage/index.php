<?php


$db = 'localhost';
$db_name = 'kobeorcc_photostorage';
//$db_user = 'kobeorcc';
//$db_password = 'DTV#@9ij^lwXQ5Fr';
$db_user = 'root';
$db_password = '';

$pdo = new PDO("mysql:host=$db;dbname=$db_name", $db_user, $db_password);

//include_once("config.php");

if(!empty($_FILES['photos'])){
    //запуск обработчика
    insert_date($_FILES['photos']);
}



//переменные дл€ шаблона
$photos = get_data();

?>

    <!--‘ункционал-->

<?php

function get_data(){
    global $pdo;
    $sth = $pdo->prepare('SELECT id,url,preview_url,name
    FROM photos
    ');
    $sth->execute();
    $result = $sth->fetchAll();
        return $result;
}

function insert_date($array){
    global $pdo;
    $photos = doImges($array);
    //запись в бл
    foreach($photos as $photo){
        $request = $pdo->prepare("insert into photos VALUES(?,?,?,?,?,?)");
        $request->bindValue(1, null, PDO::PARAM_INT);
        $request->bindParam(2,$photo['name']);
        $request->bindParam(3,$photo['orig_url']);
        $request->bindParam(4,$photo['url']);
        $request->bindParam(5,$photo['preview_url']);
        $request->bindParam(6,$photo['date_add']);
        $request->execute();
    }
    //редирект на галерею
    Header("Location: index.php");
}


function doImges($array){
    $path_small = 'img/preview';
    $path_original = 'img/original';
    $path_normal = 'img';

    $array = makearray($array);

    for($i=0;$i<count($array);$i++){
        $name = makename($array[$i]['type']);
        $small = resize($array[$i]['tmp_name'],100,100);
        $normal = resize($array[$i]['tmp_name']);
        imagejpeg($small,$path_small . '/' . $name);
        imagejpeg($normal, $path_normal . '/' . $name);
        move_uploaded_file($array[$i]['tmp_name'],$path_original . '/' . $name);

        $result[$i]['name'] = $name;
        $result[$i]['orig_url'] = $path_original . '/' . $name;
        $result[$i]['url']      = $path_normal . '/' . $name;
        $result[$i]['preview_url']  = $path_small . '/' . $name;
        $result[$i]['date_add'] = date('Y-m-d H:i:s');

    }
        return $result;
}

function resize($img,$w = null,$h = null){
    $size = getimagesize($img);
    $ow   = $size[0];
    $oh   = $size[1];
    $type = $size[2];

    switch($type)
    {
        case "1": $source = imagecreatefromgif($img); break;
        case "2": $source = imagecreatefromjpeg($img);break;
        case "3": $source = imagecreatefrompng($img); break;
        default:  $source = imagecreatefromjpeg($img);break;
    }

    if(empty($w) && empty($h)){
        if($ow>1000 || $oh>1000){
            $d=$ow/$oh;

            if($d>0){
                $w = 1000;
                $h = ($oh * $w)/$ow;
            }elseif($d<0){
                $h = 1000;
                $w = ($ow * h)/ $ow;
            }elseif($d == 0){
                $h = 1000;
                $w = 1000;
            }
        }else{
            $w=$ow;
            $h=$oh;
        }
    }
    $wrap = imagecreatetruecolor($w,$h);

    imagecopyresampled($wrap,$source,0,0,0,0,$w,$h,$ow,$oh);

    return $wrap;
}

function makearray($array){

    for($i=0;$i<count($array['tmp_name']); $i++){
        $result[$i]['tmp_name'] = $array['tmp_name'][$i];
        $result[$i]['name'] = $array['name'][$i];
        $result[$i]['type'] = $array['type'][$i];
    }
    return $result;
}

function makename($type){
    switch ($type){
        case 'image/jpeg':
            $end = '.jpg';
            break;
        case 'image/png':
            $end = '.png';
            break;
        default:
            $end = '.jpg';
    }

    $name = rand(00000000,99999999);
    $result = $name.$end;

    return $result;

}
?>


<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
        <link rel="stylesheet" href="css/bootstrap-image-gallery.min.css">
        <script>
//            $('#download_button').on('click'){
//                alert '1';
//            }
        </script>
    </head>
    <body>
        <div id="blueimp-gallery" class="blueimp-gallery">
            <!-- The container for the modal slides -->
            <div class="slides"></div>
            <!-- Controls for the borderless lightbox -->
            <h3 class="title"></h3>
            <a class="prev">Л</a>
            <a class="next">Ы</a>
            <a class="close">?</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
            <!-- The modal dialog, which will be used to wrap the lightbox content -->
            <div class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body next"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left prev">
                                <i class="glyphicon glyphicon-chevron-left"></i>
                                Previous
                            </button>
                            <button type="button" class="btn btn-primary next">
                                Next
                                <i class="glyphicon glyphicon-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--html start-->
        <div class="container">
            <br/>
            <br/>
            <br/>
            <br/>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xs-5">
                        <input class="btn btn-default" type="file" name="photos[]" multiple/>
                    </div>
                    <div class="col-xs-5 col-md-offset-2">
                        <input class="btn btn-lg btn-default" type="submit" />
                    </div>
                </div>
            </form>
            <br/>
            <br/>
            <br/>
            <br/>
            <div class="row">
                <div class="col-md-5 col-md-offset-3">
                    <div id="links">
                        <?php if(!empty($photos)):?>
                        <?php foreach($photos as $photo):?>
                        <a href="<?=$photo['url']?>" title="<?=$photo['name']?>" data-gallery>
                            <img src="<?=$photo['preview_url']?>" alt="">
                        </a>
                        <?php endforeach;?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
        <!--html end-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
        <script src="js/bootstrap-image-gallery.min.js"></script>
    </body>
</html>