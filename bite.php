<?php

$width = 350;
$height = 750;

$font_size_text = 50;
$font_size_pourcent = 26;
$font_size_libelle = 32;
$path_font = "./extension/mfstandard/design/standard/fonts/roboto/roboto-light-webfont.ttf";
$path_font_pourcent = "./extension/mfstandard/design/standard/fonts/roboto/roboto-bold-webfont.ttf";


$image = imagecreatetruecolor($width, $height);

$background_color = imagecolorallocate($image, 237, 237, 237);
$color_ball = imagecolorallocate($image, 226, 179, 152);
$color_dick = imagecolorallocate($image, 201, 162, 152);
$color_line = imagecolorallocate($image, 158, 111, 97);


imagefill($image, 0, 0, $background_color);

//Affichage Cercle avec son fond=
$thickness = 18;


imagefilledellipse($image, $width - 100, $height - 100, 150 , 150, $color_ball);
 
imagefilledellipse($image, 100, $height - 100, 150 , 150, $color_ball);


for ($i=150; $i < 600; $i++) { 
	imagefilledellipse($image, $width - 180, $height - $i, 150 , 150, $color_dick);
}

for ($i=178; $i < 182; $i++) { 
	imageline ( $image , $width - $i , 100 , $width - $i , 80 , $color_line );
}


header("Content-type: image/png");
imagepng($image);
imagedestroy($image);

eZExecution::cleanup();
eZExecution::CleanExit();



function cercle( & $image, $x_center, $y_center, $diametre, $color, $epaisseur = 1, $color_fond = null){

    

}

function triangle(& $image, $width_image,$base, $triangle_height, $position_triangle_height, $position_height,$color ){

    //si base = 20 et position_triangle_height = -10 on obtient un triangle rectangle à gauche 
    //si base = 20 et position_triangle_height = 0 on obtient un triangle isocèle
    //si base = 20 et position_triangle_height = 10 on obtient un triangle rectengle à droite

    $x_center = $width_image/2;
    $points = array(
                    $x_center - ($base/2), $position_height + $triangle_height,
                    $x_center + ($base/2), $position_height + $triangle_height,
                    $x_center + $position_triangle_height, $position_height
                    );

    imagefilledpolygon($image, $points, 3, $color);

}

function text_center_x(& $image, $width_image, $position_height, $text, $font_size, $size_text, $color, $path_font){
    $width_text = $size_text['width'];
    $height_text = $size_text['height'];
    $x_position = ($width_image/2) - ($width_text/2);
    $y_position = $position_height + $height_text;
    $coordonnees = imagettftext($image, $font_size, 0, ceil($x_position) , $y_position, $color, $path_font, $text);

}

function size_text($width,$height,$font_size,$color,$path_font,$text){
    $image_calcul = imagecreatetruecolor($width, $height);
    $coordonnees = imagettftext($image_calcul, $font_size, 0, 100 , 100, $color, $path_font, $text);
    $size['width'] = $coordonnees[2] - $coordonnees[0];
    $size['height'] = $coordonnees[1] - $coordonnees[7];
    imagedestroy($image_calcul);
    
    return $size;
}
