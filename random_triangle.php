<?php 

$width = 350;
$height = 350;

$padding = 50;
//$padding = rand( 10, 100);

$font_size = 14;
$path_font = "./extension/mfstandard/design/standard/fonts/roboto/roboto-bold-webfont.ttf";

$image = imagecreatetruecolor($width, $height);

$background = imagecolorallocate($image, 255, 255, 255);
$color_line = imagecolorallocate($image, 0, 0, 0);
$color2 = imagecolorallocate($image, 125, 125, 125);


imagefill($image, 0, 0, $background);
imagesetthickness($image, 4);

$base = 100;
$position_height = 100;
$triangle_height = 100;
$position_triangle_height = 100;
$x_center = $width/2;





// Triangle 1 
/*
imageline ( $image , 50 , 50 , 50 , 300 , $color_line );
imageline ( $image , 50 , 50 , 300 , 300 , $color_line );
imageline ( $image , 50 , 300 , 300 , 300 , $color_line );
*/


// Text
/*
imagettftext($image, $font_size, 0, $width/2 , 45, $color_line, $path_font, 'A');
imagettftext($image, $font_size, 0, $width - 45 , $height/2, $color_line, $path_font, 'B');
imagettftext($image, $font_size, 0, $width/2 + 5 , $height/2 - 5, $color_line, $path_font, 'C');
*/


// Tiangle 2 
$x1 = $padding;
$x2 = $width - $padding;
$x3 = $width / 2;
$y1 = $padding;
$y2 = $height - $padding;
$y3 = $height / 2;
$allPoints = array( array($x1, $y1), array($x1, $y2), array($x2, $y1), array($x2, $y2), array($x3, $y3) );


do{
	$rKeys = array_rand($allPoints,3);
	$points = array( $allPoints[$rKeys[0]][0], $allPoints[$rKeys[0]][1], $allPoints[$rKeys[1]][0], $allPoints[$rKeys[1]][1], $allPoints[$rKeys[2]][0], $allPoints[$rKeys[2]][1] );

}
while ( $allPoints[$rKeys[0]][0] != $allPoints[$rKeys[1]][0] && $allPoints[$rKeys[0]][0] != $allPoints[$rKeys[2]][0] );

$point1 = $allPoints[$rKeys[0]];
$point2 = $allPoints[$rKeys[1]];
$point3 = $allPoints[$rKeys[2]];

imagettftext($image, 12, 0, $point1[0]-10 , $point1[1]-10, $color_line, $path_font, 'A');
imagettftext($image, 12, 0, $point2[0] , $point2[1], $color_line, $path_font, 'B');
imagettftext($image, 12, 0, $point3[0] , $point3[1], $color_line, $path_font, 'C');

imagettftext($image, 12, 0, 0, 10, $color_line, $path_font, print_r($rKeys,1));


/*
$text = $allPoints[$rKeys[0]][0] . ' - ' . $allPoints[$rKeys[0]][1] . ' , ' . $allPoints[$rKeys[1]][0] . ' - ' . $allPoints[$rKeys[1]][1] . ' , ' . $allPoints[$rKeys[2]][0] . ' - ' . $allPoints[$rKeys[2]][1];

$text2 = $x1 . ' - ' . $x2 . ' - ' . $x3 . ' // ' . $y1 . ' - ' . $y2 . ' - ' . $y3 ;


imagettftext($image, 12, 0, 10 , 15, $color_line, $path_font, $text);
imagettftext($image, 12, 0, 10 , $height-15, $color_line, $path_font, $text2);
*/


/*
var_dump($allPoints);
var_dump($text);
*/


imagepolygon($image, $points, 3, $color2);


header("Content-type: image/png");
imagepng($image);
imagedestroy($image);

eZExecution::cleanup();
eZExecution::CleanExit();
