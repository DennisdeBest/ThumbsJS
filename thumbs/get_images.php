<?php

session_start();

$maindir = 'img/';
$dir = $maindir.$_SESSION['dir'];
$thumbWidth = $_SESSION['width'];
$miniDir = $dir.'_thumbs_'.$thumbWidth.'/';
$res = scandir($dir);


//ignore system links
foreach($res as $item){
    if($item != "." && $item != ".."){
        $returnArray[] = $miniDir.$item;
        $imageArray[] = $item;
    }
}

$res=$returnArray;

$_SESSION['log']="";
//$_SESSION['log'].=$dir.$thumbWidth."<strong>".$miniDir."</strong><br/>";

if ( !file_exists($miniDir) ) {
    $oldmask = umask(0);  // helpful when used in linux server
    mkdir ($miniDir, 0777);
}
if ( !file_exists($dir."/") ) {
    $oldmask = umask(0);  // helpful when used in linux server
    mkdir ($dir."/", 0777);
}


function makeThumbnails($src,$srcDir, $dest, $desired_width) {

    /* read the source image */
    $info = getimagesize($srcDir.$src);
    $extension = image_type_to_extension($info[2]);

    $imageCreateType = "ImageCreateFromJPEG";
    $imageType = "imagejpeg";

    //$_SESSION['log'].= $extension;
    //$_SESSION['log'].= $info;

    if($extension == ".gif"){
        $imageCreateType = "ImageCreateFromGIF";
        $imageType = "imagegif";
    }elseif($extension == ".png"){
        $imageCreateType = "ImageCreateFromPNG";
        $imageType = "imagepng";
    }


    $source_image = $imageCreateType($srcDir.$src);
    $width = imagesx($source_image);
    $height = imagesy($source_image);

    $dest = $dest.$src;
    /* find the "desired height" of this thumbnail, relative to the desired width  */
    $desired_height = floor($height * ($desired_width / $width));

    /* create a new, "virtual" image */
    $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

    /* copy source image at a resized size */
    imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

    //$_SESSION['log'].= $dest."<br/>".$srcDir.$src."<br/>";
    /* create the physical thumbnail image to its destination */
    $imageType($virtual_image, $dest);
}
foreach($imageArray as $originalImg){
    if(!file_exists($miniDir.$originalImg)) {
        makeThumbnails($originalImg, $dir."/", $miniDir, $thumbWidth);
    }
}

echo json_encode($res);

?>